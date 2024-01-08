<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $table = 'software';

    protected $fillable = [
        'name',
        'system_operative',
        'stock',
        'license',
        'sku',
        'price',
        'status',
        'created_by',
        'updated_by'
    ];
}
