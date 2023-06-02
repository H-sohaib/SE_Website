<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PfeExemple extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
        'filter_type',
        'description',
        'pdf_path'
    ];
}
