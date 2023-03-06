<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.setting.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $settings = Setting::first();
        if ($settings) {
            if ($request->hasFile('image')) {
                if (File::exists('uploads/settings/' . $settings->image)) {
                    File::delete('uploads/settings/' . $settings->image);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/settings/', $filename);
                $image = 'uploads/settings/' . $filename;
            } else {
                $image = '';
            }

            if ($request->hasFile('favicon')) {
                if (File::exists('uploads/settings/' . $settings->favicon)) {
                    File::delete('uploads/settings/' . $settings->favicon);
                }
                $file = $request->file('favicon');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/settings/', $filename);
                $favicon = 'uploads/settings/' . $filename;
            } else {
                $favicon = '';
            }
            $settings->update([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'image' => $image,
                'favicon' => $favicon,
                'page_title' => $request->page_title,
                'meta_keyword' => $request->meta_keyword ?? '',
                'meta_description' => $request->meta_description ?? '',
                'address' => $request->address,
                'phone' => $request->phone,
                'phone2' => $request->phone2 ?? '',
                'email' => $request->email,
                'email2' => $request->email2 ?? '',
                'facebook' => $request->facebook ?? '',
                'twitter' => $request->twitter ?? '',
                'instagram' => $request->instagram ?? '',
                'youtube' => $request->twitter ?? '',
            ]);
            return redirect('/admin/settings')->with('message', 'Website Settings Updated Successfully');
        } else {

            if ($request->hasFile('image')) {
                $file = $request->image;
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/settings/', $filename);
                $image = 'uploads/settings/' . $filename;
            }

            if ($request->hasFile('favicon')) {
                $favicon_file = $request->favicon;
                $favicon_ext = $favicon_file->getClientOriginalExtension();
                $favicon_filename = time() . '.' . $favicon_ext;
                $favicon_file->move('uploads/settings/', $favicon_filename);
                $favicon = 'uploads/settings/' . $favicon_filename;
            }

            Setting::create([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'image' => $image,
                'favicon' => $favicon,
                'page_title' => $request->page_title,
                'meta_keyword' => $request->meta_keyword ?? '',
                'meta_description' => $request->meta_description ?? '',
                'address' => $request->address,
                'phone' => $request->phone,
                'phone2' => $request->phone2 ?? '',
                'email' => $request->email,
                'email2' => $request->email2 ?? '',
                'facebook' => $request->facebook ?? '',
                'twitter' => $request->twitter ?? '',
                'instagram' => $request->instagram ?? '',
                'youtube' => $request->twitter ?? '',
            ]);
            return redirect('/admin/settings')->with('message', 'Website Settings Added Successfully');
        }
    }
}
