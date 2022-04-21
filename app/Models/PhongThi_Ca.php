<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongThi_Ca extends Model
{
    use HasFactory;
    protected $table = 'phongthi_ca';
    protected $fillable = [
        'id', 'phongthi_id', 'cathi_id', 'ngaythi', 'monthi_id', 'created_at', 'updated_at',
    ];
}
