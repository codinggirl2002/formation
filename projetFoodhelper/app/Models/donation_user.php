<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donation_user extends Model
{
    use HasFactory;
    protected $fillable = ['quantite', 'user_id','donation_id','localisation','type_aliment', 'date'];

}
