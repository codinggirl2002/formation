<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role'
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
    ];

    public function isDonateur(){
        return $this->role === 'donor';
    }

    public function isBeneficiaire(){
        return $this->role === 'beneficiary';
    }

    //pour specifier qu'un utilisateur peut effectuer plusieurs donations
    public function donations()
    {
       return $this->hasMany(Donation::class);
    }

    //pour specifier qu'un utilisateur peut faire la demande de plusieurs dons.
    /*public function donation()
    {
       return $this->belongsToMany(Donation::class);
    }*/

    // Les demandes de dons faites par l'utilisateur (bénéficiaire)
    public function donationRequests()
    {
        return $this->belongsToMany(Donation::class, 'demandes', 'user_id', 'donation_id')
                    ->withPivot('type_aliment', 'date', 'quantite', 'localisation')
                    ->withTimestamps();
    }
}
