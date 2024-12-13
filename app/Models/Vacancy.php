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
        'work_schedule_id',
        'experience_id',
        'education_id',
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

    public function workSchedule()
    {
        return $this->belongsTo(WorkSchedule::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'vacancy_user');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function formattedSalary()
    {
        return rtrim(rtrim(number_format($this->salary, 2), '0'), '.');
    }
}
