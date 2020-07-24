<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function experience()
    {
        return $this->hasOne(Expreience::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'person_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }



    /** One to Many
     * A user can have many posts
     * a post can have many comments
     * a project can have many tasks
     * A user can have many jobs
     * A user can have many achievements
     */
}