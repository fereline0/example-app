<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function detail_information()
    {
        return $this->hasOne(UserDetailInformation::class)->withDefault();
    }

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function createdReviews()
    {
        return $this->hasMany(Review::class, 'author_id');
    }

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'vacancy_user');
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }

    public function get_gender_display_attribute()
    {
        return match ($this->detail_information->gender) {
            'male' => __('Мужской'),
            'female' => __('Женский'),
            default => __('Не указан'),
        };
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
