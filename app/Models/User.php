<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'city',
        'zip_code',
        'role',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public static function approveByAdmin()
    {
       return $user_status = Auth::user()->status;
    }

    public static function approveByTeacher(){
        $user_approve = explode(",", Auth::user()->approve); 

        return count($user_approve);
    }

    public static function userApprovCount(){
        $user_approve = explode(",", Auth::user()->approve); 

        return count($user_approve);
    }

    public function settings()
    {
        return $this->hasMany(Setting::class, 'user_id');
    }
}
