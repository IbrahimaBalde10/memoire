<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sujet;

class Filiere extends Model
{
    use HasFactory;

public function sujets()
{
    return $this->belongsToMany(Sujet::class, 'filiere_sujet', 'filiere_id', 'sujet_id');
}
}
