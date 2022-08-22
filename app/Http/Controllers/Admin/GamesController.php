<?php

namespace App\Http\Controllers\Admin;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 20;
        $games = Game::paginate($perPage);
        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:100',
            'image'     => 'required|url',
            'price'   => 'required|integer|max:5000',
        ]);
        $data = $request->all() + ['user_id' => Auth::id()];
        // salvataggio
        $game = Game::create($data);

        // redirect
        return redirect()->route('admin.games.show', ['game' => $game]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        if ($game->user_id === Auth::id()) {
            return view('admin.games.show', [
                'game' => $game,
            ]);
        } else {
            $perPage = 20;
            $games = Game::paginate($perPage);
            return view('admin.games.index', compact('games'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        if ($game->user_id === Auth::id()) {
            return view('admin.games.edit', [
                'game' => $game
            ]);
        } else {
            $perPage = 20;
            $games = Game::paginate($perPage);
            return view('admin.games.index', compact('games'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title'     => 'required|string|max:100',
            'image'     => 'required|url',
            'price'   => 'required|integer|max:5000',
        ]);
        $data = $request->all();
        // salvataggio
        $game->update($data);

        // redirect
        return redirect()->route('admin.games.show', ['game' => $game]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if ($game->user_id === Auth::id()) {
            $game->delete();
            return redirect()->route('admin.games.index');
        } else {
            $perPage = 20;
            $games = Game::paginate($perPage);
            return view('admin.games.index', compact('games'));
        }
    }
}
