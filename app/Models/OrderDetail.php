<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManageProduct;

class OrderDetail extends Model
{
    use HasFactory;
    protected $appends = ['product_name', 'price_sale'];
    // protected $appends1 = ['product_total'];
    protected $fillable =[
        'order_id',
        'quantyti',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo(ManageProduct::class,'product_id','id');
    }

    public function getProductNameAttribute(){
        return $this->product->name;
    }
    public function getPriceSaleAttribute(){
        return $this->product->sale;
    }
}
