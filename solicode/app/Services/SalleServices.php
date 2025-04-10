<?php

namespace App\Services;
use App\Models\Salle;
use App\Models\Nature;

class SalleServices {

    // createSalle
    public function createSalle(array $data){
        return Salle::create($data);
    }

    // updateSalle
    public function updateSalle(array $data, $salle){
        $exactSalle = Salle::findOrFail($salle);
        return $exactSalle->update($data);

    }

    // deleteSalle
    public function deleteSalle($salle){
        $exactSalle = Salle::findOrFail($salle);
        return $exactSalle->delete();

    }

    // getExactSalle
    public function getExactSalle($salle){
        return Salle::findOrFail($salle);
    }

    // getPagination
    public function getPagination($query, $number){
        return $query->paginate($number);
    }

    // getlatest
    public function getlatest(){
        return Salle::latest();
    }

    // serching
    public function serching($query, $searchTearm){
        return $query->where('name', 'like', '%' . $searchTearm . '%');
    } 

    // serching
    public function filterById($query, $searchTearm){
        return $query->where('nature_id', 'like', '%' . $searchTearm . '%');
    } 

    // getAllNatures
    public function getAllNatures(){
        return Nature::all();
    }

}
