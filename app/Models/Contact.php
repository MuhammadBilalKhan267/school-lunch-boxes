<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    // Define the fields that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    // Optionally, you can define relationships here if needed
}

