<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id', 'product_id', 'product_color_id', 'quantity', 'price',
    ];

    public function product()
    {
        return $this->beLongsTo(Product::class, 'product_id', 'id');
    }

    public function productColor()
    {
        return $this->beLongsTo(ProductColor::class, 'product_color_id', 'id');
    }
}
