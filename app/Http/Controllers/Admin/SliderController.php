<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;
use App\Http\Requests\SliderUpdateRequest;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validated_data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/sliders/', $filename);
            $validated_data['image'] = "uploads/sliders/$filename";
        }

        Slider::create([
            'title'       => $validated_data['title'],
            'description' => $validated_data['description'],
            'image'       => $validated_data['image'],
            'status'      => $request->status == True ? '1' : '0',
        ]);

        return redirect()->route('sliders.index')->with('message', 'Slider Added Successfully !');
    }


    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        $validated_data = $request->validated();

        if ($request->hasFile('image')) {
            $path = $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/sliders/', $filename);
            $validated_data['image'] = "uploads/sliders/$filename";
        }

        $validated_data['status'] = $request->status == True ? '1' : '0';
        $slider->update([
            'title'       => $validated_data['title'],
            'description' => $validated_data['description'],
            'image'       => $validated_data['image'] ?? $slider->image,
            'status'      => $validated_data['status'],
        ]);
        return redirect()->route('sliders.index')->with('message', 'Slider Updated Successfully !');
    }


    public function destroy(Slider $slider)
    {
        if ($slider) {
            $path = $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $slider->delete();
            return redirect()->route('sliders.index')->with('message', 'Slider Deleted Successfully !');
        } else {
            return redirect()->route('sliders.index')->with('message', 'No Such Slider ID Found !');
        }
    }
}
