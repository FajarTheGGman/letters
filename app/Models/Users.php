<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    public $fillable = [
        'firstname',
        'lastname',
        'email',
        'password'
    ];
    protected $table = 'users';
}
