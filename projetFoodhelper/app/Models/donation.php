<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donation extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'quantite', 'user_id','localisation','type_aliment', 'date_limite','attribue', 'image'];

    // Relation pour specifier qu'un don appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
