<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table='sections';
    protected $fillable = [
        'name','template_id'
    ];
    use HasFactory;

    public function customField()
    {
        return $this->hasMany(\App\CustomField::class, 'section_id', 'id');
    }
}
