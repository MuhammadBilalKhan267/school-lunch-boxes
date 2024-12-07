<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the fields that are mass assignable
    protected $fillable = [
        'name', 'email', 'phone', 'lunchbox',
    ];
}
