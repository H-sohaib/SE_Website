<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pfe extends Model
{
    use HasFactory;

    protected $table = 'pfes';

    protected $fillable = [
        'name',
        'image_path',
        'types',
        'description',
        'pdf_path'
    ];
}
