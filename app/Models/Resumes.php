<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Resumes extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'description',
        'localization',
        'phone',
        'experience',
        'formations',
        'qualifications',
        'skills',
        'languages',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
