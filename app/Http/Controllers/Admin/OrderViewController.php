<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Order;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMaillable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class OrderViewController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($q) use ($request){
                    return $q->whereDate('created_at', $request->date);
                    }, function ($q) use ($todayDate){
                        return $q->whereDate('created_at', $todayDate);
                    })
                    ->when($request->status != null, function($q) use($request) {
                        return $q->where('status_message', $request->status);
                    })
                    ->get();
        return view('admin.order.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            return view('admin.order.show', compact('order'));
        } else {
            return redirect('admin/orders')->with('error', 'Order ID Not Found');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status,
            ]);
            return redirect('admin/orders/' . $orderId)->with('success_message', 'Order Status Updated');
        } else {
            return redirect()->back()->with('error', 'Order ID Not Found');
        }
    }

    public function viewInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-' . $order->id . '-' . $todayDate . '.pdf');
    }

    public function mailInvoice(int $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            Mail::to("$order->email")->send(new InvoiceMail($order));
            return redirect('admin/orders/' . $order->id)->with('success_message', 'Invoice Mail has been sent to ' . $order->email);
        }catch(\Exception $e) {
            return redirect('admin/orders/' . $order->id)->with('error_message', 'Something went wrong !');
        }
    }
}
