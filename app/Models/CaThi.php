<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaThi extends Model
{
    use HasFactory;

    protected $table = 'cathi';
    protected $fillable = [
        'cathi_id', 'giobatdau', 'gioketthuc', 'created_at', 'updated_at',
    ];
}
