<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donation extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'quantite', 'user_id','localisation','type_aliment', 'date_limite','attribue', 'image', 'statut'];

    // Relation pour specifier qu'un don appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    // Relation many-to-many avec les bénéficiaires (via la table 'demandes')
    public function beneficiaries()
    {
        return $this->belongsToMany(User::class, 'demandes', 'donation_id', 'user_id')
                    ->withPivot('type_aliment', 'quantite', 'localisation')
                    ->withTimestamps();
    }
}
