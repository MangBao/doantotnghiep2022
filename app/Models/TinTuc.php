<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = 'tintuc';
    protected $fillable = [
        'id', 'title', 'content1', 'image1', 'content2', 'image2', 'content3', 'image3', 'created_at', 'updated_at'
    ];
}
