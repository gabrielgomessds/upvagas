<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companys extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'about',
        'name',
        'logo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancies::class, 'company_id');
    }
}
