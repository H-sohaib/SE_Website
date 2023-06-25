<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'semestre_id',
        'module_id',
        'matiere_name'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
