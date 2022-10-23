<?php
namespace App\Models;
// use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model{
    protected $table = 'orders';
    public $timestamps = false;


    public function products()
    {
        return $this->belongsToMany(Product::class,'order_detail','product_id','order_id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
