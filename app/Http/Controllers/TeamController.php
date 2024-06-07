<?php

namespace App\Http\Controllers;

use App\DTO\Team\CreateTeamDTO;
use App\DTO\Team\UpdateTeamDTO;
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
        return Inertia::render('Teams/Create',
        [
            'status' => session('status')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = $this->teams->new(CreateTeamDTO::makeFromRequest($request));

        if(!$team){
            return redirect()->back();
        }

        return redirect()->intended(route('teams.index',['message' => 'Team created successfully']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = $this->teams->findOne($id);
        return Inertia::render('Teams/Show',
        [
            'team' => $team,
            'status' => session('status')
        ]);
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
        $team = $this->teams->update(UpdateTeamDTO::makeFromRequest($request, $id));

        if(!$team){
            return redirect()->back();
        }

        return redirect()->intended(route('teams.index',['message' => 'Team updated successfully']));
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
