<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'skill_vacancy');
    }

    public function resumes()
    {
        return $this->belongsToMany(Resume::class, 'resume_skill');
    }
}
