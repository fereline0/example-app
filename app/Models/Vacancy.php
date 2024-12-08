<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'city_id',
        'work_type_id',
        'salary',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_vacancy');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'vacancy_user');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
