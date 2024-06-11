<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredUsers extends Model
{
    use HasFactory;
    protected $table = 'registeredusers';
    protected $fillable = [
        'firstname', 
        'lastname', 
        'email', 
        'password'
    ];
}
