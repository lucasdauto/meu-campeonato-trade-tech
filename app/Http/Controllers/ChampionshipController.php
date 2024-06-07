<?php

namespace App\Http\Controllers;

use App\DTO\Championship\CreateChampionshipDTO;
use App\DTO\Championship\UpdateChampionshipDTO;
use App\Services\ChampionshipService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChampionshipController extends Controller
{
    public function __construct(protected ChampionshipService $championship)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $championships = $this->championship->getAll($request->filter);
        return Inertia::render(
            'Championships/Index',
            [
                'championships' => $championships
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Championships/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $championship = $this->championship->new(CreateChampionshipDTO::makeFromRequest($request));

        if (!$championship) {
            return redirect()->back();
        }

        return redirect()->intended(route('championships.index', ['message' => 'Championship created successfully']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $championship = $this->championship->findOne($id);
        return Inertia::render(
            'Championships/Show',
            [
                'championship' => $championship
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $championship = $this->championship->findOne($id);
        return Inertia::render('Championships/Edit', [
            'championship' => $championship
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $championship = $this->championship->update(UpdateChampionshipDTO::makeFromRequest($request, $id));

        if (!$championship) {
            return redirect()->back();
        }

        return redirect()->intended(route('championships.index', ['message' => 'Championship updated successfully']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->championship->delete($id);
        return redirect()->intended(route('championships.index', ['message' => 'Championship deleted successfully']));
    }
}
