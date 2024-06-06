<?php

namespace App\Http\Controllers;

use App\DTO\Match\CreateMatchDTO;
use App\DTO\Match\UpdateMatchDTO;
use App\Services\MatchService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MatchController extends Controller
{
    public function __construct(protected MatchService $matches){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $matches = $this->matches->getAll($request->filter);
        return Inertia::render('Matches/Index',
        [
            'matches' => $matches,
            'status' => session('status')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Matches/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matches = $this->matches->new(CreateMatchDTO::makeFromRequest($request));

        if(!$matches){
            return redirect()->back();
        }

        return redirect()->intended(route('matches.index',['message' => 'Match created successfully']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matches = $this->matches->findOne($id);
        return Inertia::render('Matches/Show',[
            'matches' => $matches
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matches = $this->matches->findOne($id);
        return Inertia::render('Matches/Edit',[
            'matches' => $matches
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matches = $this->matches->update( UpdateMatchDTO::makeFromRequest($request,$id));

        if(!$matches){
            return redirect()->back();
        }

        return redirect()->intended(route('matches.index',['message' => 'Match updated successfully']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->matches->delete($id);
        return redirect()->intended(route('matches.index',['message' => 'Match deleted successfully']));
    }

    public function simulateMatch()
    {
        //
    }
}
