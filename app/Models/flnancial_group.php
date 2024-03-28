<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class flnancial_group extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guard = 'flnancial_group';

    protected $fillable = [
        'f_name', 'l_name', 'email', 'phone', 'address', 'Orgnization_type', 'password',
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

    public function ingoFinancialGrup()
    {
        return $this->hasOne(ingo_financial_grup::class, 'Organization_id');
    }

    public function investingTracks()
    {
        return $this->hasMany(investing_track_Organization::class, 'Organization_id'); 
    }
}
