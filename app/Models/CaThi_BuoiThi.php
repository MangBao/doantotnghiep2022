<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaThi_BuoiThi extends Model
{
    use HasFactory;
    protected $table = 'cathi_buoithi';
    protected $fillable = [
        'buoithi_id', 'cathi_id', 'created_at', 'updated_at'
    ];
}
