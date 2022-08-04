<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OrderDetail;

class ManageBill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "manage_bills";
    protected $fillable = [
        'user_id',
        'id_ban',
        'total',
        'status',
        'total_price',
    ];

    public function getTotalPriceAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }
    
    public function order_details(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
}
