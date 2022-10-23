<?php
namespace App\Models;
// use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Status;
use App\Models\Order;

class Product extends Model{
    protected $table = 'products';
    
    public $timestamps = false;

    /**
     * Get the categories that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }

    public function Orders()
    {
        return $this->belongsToMany(Order::class,'order_detail','product_id','order_id');
    }
}
