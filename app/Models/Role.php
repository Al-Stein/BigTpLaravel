<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'idRole';
    protected $fillable = [
        'nom',
    ];

    public function User(){
        return $this->hasMany(User::class, 'idRole', 'idRole');
    }
    use HasFactory;
}
