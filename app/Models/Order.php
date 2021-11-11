<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'name', 
        'lmane', 
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'country',
        'total_price'
    ];
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
