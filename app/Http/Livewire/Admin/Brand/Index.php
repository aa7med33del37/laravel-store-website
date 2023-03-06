<?php

namespace App\Http\Livewire\Admin\Brand;
use App\Models\Brands;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $brands = Brands::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index', compact('brands'));
    }
}
