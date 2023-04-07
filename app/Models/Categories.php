<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon'
    ];

    public function vacancies()
    {
        return $this->hasMany(Vacancies::class, 'category_id');
    }


}
