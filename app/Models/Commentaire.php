<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','fiche_suivie_id','contenu'];


     public function user()
    {
        return $this->belongsTo(User::class);
    }

}
