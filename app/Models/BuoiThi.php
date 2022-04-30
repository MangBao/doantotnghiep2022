<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuoiThi extends Model
{
    use HasFactory;
    protected $table = 'buoithi';
    protected $fillable = [
        'id', 'phongthi_id', 'cathi_id', 'ngaythi', 'monthi_id',
    ];
}
