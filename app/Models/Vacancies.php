<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vacancies extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'title',
        'description',
        'qualifications',
        'salary_intro',
        'salary_final',
        'quantity',
        'localization',
        'model',
        'time',
        'hiring_type',
        'level',
        'situation'
    ];

    public function company()
    {
        return $this->belongsTo(Companys::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function applications()
    {
        return $this->hasMany(Applications::class, 'vacancy_id');
    }

}
