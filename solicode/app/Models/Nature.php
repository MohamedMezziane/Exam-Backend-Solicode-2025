<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Salle;

class Nature extends Model
{
    // Protected Fillable
    protected $fillable = [ 'name' ];

    // RelationShips
    public function Salle(){
        return $this->hasMany(Salle::class);
    }
}
