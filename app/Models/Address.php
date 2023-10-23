<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['address_1', 'address_2', 'region', 'city', 'tel_1', 'tel_2 ', 'user_id'];
}
