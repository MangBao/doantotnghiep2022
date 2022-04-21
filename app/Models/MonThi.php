<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonThi extends Model
{
    use HasFactory;
    protected $table = 'monthi';
    protected $fillable = [
        'monthi_id', 'tenmonthi', 'bomon_id', 'created_at', 'updated_at',
    ];
}
