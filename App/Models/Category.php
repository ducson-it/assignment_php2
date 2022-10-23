<?php
namespace App\Models;
// use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $table = 'categories';
    public $timestamps = false;
    
    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }
}

