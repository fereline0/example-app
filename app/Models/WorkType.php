<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}
