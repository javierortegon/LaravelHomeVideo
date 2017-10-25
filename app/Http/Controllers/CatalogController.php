<?php

namespace App\Http\Controllers;
use App\Movie;
use DB;

use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function getIndex(){
		$movies = Movie::all();
        return view ('catalog.index')->with('arrayPeliculas', $movies);
    }

    public function getShow($id){
		$movies = Movie::findOrFail($id);
        return view ('catalog.show')->with('pelicula', $movies);
    }

    public function getCreate(){
        return view ('catalog.create');
    }

    public function getEdit($id){
        $movies = Movie::findOrFail($id);
        return view ('catalog.edit')->with('pelicula', $movies);
    }
    
}
