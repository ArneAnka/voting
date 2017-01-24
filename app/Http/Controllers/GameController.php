<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
	public function all(Request $request){
    	$query = $request->get('q');
    	
    	$games = $query 
    	? Game::serach($query)->get()
    	: Game::all();

    	return view('m.list', compact('games'));
	}

    public function snes(Request $request){
    	$console = 'SNES';

    	$query = $request->get('q');
    	
    	$games = $query 
    	? Game::serach($query)->console($console)->get()
    	: Game::console($console)->get();

    	return view('m.list', compact('games', 'console'));
    }

    public function nes(Request $request){
    	$console = 'NES';

    	$query = $request->get('q');
    	
    	$games = $query 
    	? Game::serach($query)->console($console)->get()
    	: Game::console($console)->get();

    	return view('m.list', compact('games', 'console'));
    }

    public function redirect(){
        return redirect()->route('all');
    }
}
