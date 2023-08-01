<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table='business_types';
    protected $fillable = [
        'name','line_of_business'
    ];
    use HasFactory;
}
