<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(ColorFormRequest $request)
    {
        $validated_data = $request->validated();
        Color::create($validated_data);
        return redirect()->route('colors.index')->with('message', 'Color added succsessfully !');
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, Color $color)
    {
        $validated_data = $request->validated();
        if ($color) {
            $validated_data['status'] = $request->status == true ? '1' : '0';
            $color->update($validated_data);
        }
        return redirect()->route('colors.index')->with('message', 'Color Updated succsessfully !');
    }

    public function destroy(Color $color)
    {
        if ($color) {
            $color->delete();
            return redirect()->route('colors.index')->with('message', 'Color deleted succsessfully !');
        } else {
            return redirect()->route('colors.index')->with('message', 'No Such Color Found !');
        }
    }
}
