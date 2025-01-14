<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city_id',
        'work_schedule_id',
        'work_type_id',
        'experience_id',
        'detail_experience',
        'background_id',
        'salary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function workSchedule()
    {
        return $this->belongsTo(WorkSchedule::class);
    }

    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function background()
    {
        return $this->belongsTo(Background::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'resume_skill');
    }
}
