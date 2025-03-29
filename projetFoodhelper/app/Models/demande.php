<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demande extends Model
{
    use HasFactory;
    protected $fillable = ['quantite', 'user_id','donation_id','localisation','type_aliment', 'date'];

    // Relation avec la table donations (chaque demande appartient à un don)
    public function donation()
    {
        return $this->belongsTo(Donation::class, 'donation_id');
    }

    // Relation avec la table users (chaque demande appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
