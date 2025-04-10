<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Models\Nature;
use App\Http\Requests\SalleRequest;
use Illuminate\Http\Request;
use App\Services\SalleServices;

class SalleController extends Controller
{

    protected $SalleService;
    public function __construct(SalleServices $SalleService){
        $this->SalleService = $SalleService;
    }

    public function index(Request $request)
    {
        // Get Latest Data
        $query = $this->SalleService->getlatest();

        // Search Part
        if( $request->has('search')){
            $query = $this->SalleService->serching($query, $request->search);
        }
        
        // Filter By Category
        if( $request->has('nature_id')){
            $query = $this->SalleService->filterById($query, $request->nature_id);
        }

        // Get All Data Paginate
        $allSalles = $this->SalleService->getPagination($query, 4);

        // Get All Natures
        $allNatures = $this->SalleService->getAllNatures();

        // Redirection
        return view('salles.index', compact('allSalles', 'allNatures'));
    }


    public function create()
    {
        // Get All Natures
        $allNatures = $this->SalleService->getAllNatures();

        // Redirection
        return view('salles.create', compact('allNatures'));
    }


    public function store(SalleRequest $request)
    {
        // Store Data into DB
        $this->SalleService->createSalle($request->validated());

        // Redirection
        return redirect()->route('salles.index')->with('success', 'The Salle Was Created Successfuly');
    }


    public function show(string $salle)
    {
        // Get Exact Salle
        $exactSalle = $this->SalleService->getExactSalle($salle);

        // Redirection
        return view('salles.details', compact('exactSalle'));
    }


    public function edit(string $salle)
    {
        // Get Exact Salle
        $exactSalle = $this->SalleService->getExactSalle($salle);

        // Get All Natures
        $allNatures = $this->SalleService->getAllNatures();

        // Redirection
        return view('salles.edit', compact('exactSalle', 'allNatures'));
    }


    public function update(SalleRequest $request, string $salle)
    {
        // Update Data
        $this->SalleService->updateSalle( $request->validated(), $salle);

        // Redirection
        return redirect()->route('salles.index')->with('success', 'The Salle Was Updated Successfuly');
    }


    public function destroy(string $salle)
    {
        // Update Data
        $this->SalleService->deleteSalle($salle);

        // Redirection
        return redirect()->route('salles.index')->with('success', 'The Salle Was Deleted Successfuly');
    }
}
