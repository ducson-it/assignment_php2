<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class User extends Model{
    protected $table = 'user';
    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function statusCustomer()
    {
        return $this->belongsTo(StatusCustomer::class, 'status', 'id');
    }
}