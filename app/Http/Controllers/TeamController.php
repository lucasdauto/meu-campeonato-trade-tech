<?php

namespace App\Http\Controllers;

use App\Services\TeamsService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{

    public function __construct(protected TeamsService $teams){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teams = $this->teams->getAll($request->filter);
        return Inertia::render('Teams/Index',
        [
            'teams' => $teams,
            'status' => session('status')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Teams/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = $this->teams->findOne($id);
        return Inertia::render('Teams/Show', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = $this->teams->findOne($id);
        return Inertia::render('Teams/Edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->teams->delete($id);
        return redirect()->intended(route('teams.index',['message' => 'Team deleted successfully']));
    }
}
