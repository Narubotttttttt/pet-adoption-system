<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'breed',
        'color',
        'gender',
        'type',
        'age',
        'medical_history',
        'temperament',
        'photo_path',
        'status',
    ];

    public function adoptionApplications()
    {
        return $this->hasMany(AdoptionApplication::class);
    }
}
