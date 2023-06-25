<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'semestre_id',
        'module_num',
        'module_name'
    ];

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }
}
