<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='post';
    protected $primaryKey='idPost';
    protected $fillable=['titre', 'contenu','idTheme','id'];
    use HasFactory;
}
