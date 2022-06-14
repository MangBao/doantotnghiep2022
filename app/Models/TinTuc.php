<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = 'tintuc';
    protected $fillable = [
        'id', 'user_id', 'title', 'heading1', 'content1', 'image1', 'heading2', 'content2', 'image2', 'heading3', 'content3', 'image3', 'files', 'created_at', 'updated_at'
    ];
}
