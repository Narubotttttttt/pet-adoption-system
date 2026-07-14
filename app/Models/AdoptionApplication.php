<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'message',
        'status',
        'scheduled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
