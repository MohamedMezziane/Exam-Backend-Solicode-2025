<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Nature;


class Salle extends Model
{

    // Protected Fillable
    protected $fillable = [ 'name', 'espace', 'nature_id' ];

    // RelationShips
    public function Nature(){
        return $this->belongsTo(Nature::class);
    }

}
