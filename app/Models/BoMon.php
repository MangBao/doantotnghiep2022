<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoMon extends Model
{
    use HasFactory;
    protected $table = 'bomon';
    protected $fillable = ['bomon_id', 'tenbomon', 'khoa_id', 'created_at', 'updated_at', 'khoa_id'];
}
