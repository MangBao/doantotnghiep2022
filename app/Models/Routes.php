<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    protected $table = 'routes';
    protected $fillable = [
        'id', 'route_name', 'route_title', 'created_at', 'updated_at'
    ];
}
