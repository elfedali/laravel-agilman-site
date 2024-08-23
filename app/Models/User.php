<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    public const USER_GENDER_MALE = "male";
    public const USER_GENDER_FEMALE = "female";

    public const USER_ROLE_USER = "user";
    public const USER_ROLE_ADMIN = "admin";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // has many projects
    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id');
    }
    // has many projects
    public function projects_member()
    {
        return $this->belongsToMany(Project::class, 'project_user');
    }


    // has many sprints
    public function sprints()
    {
        return $this->hasMany(Sprint::class);
    }

    // has many tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
