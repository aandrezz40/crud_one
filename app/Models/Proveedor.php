<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = ['name', 'direction', 'phone', 'email', 'contact', 'description'];
}