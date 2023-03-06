<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brands extends Model
{
    use HasFactory;
    protected $tabel = 'brands';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'status',
    ];

    public function category()
    {
        return $this->beLongsTo(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->beLongsTo(Product::class, 'brand', 'name');
    }
}
