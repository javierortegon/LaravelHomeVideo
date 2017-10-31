<?php

namespace App\Http\Controllers;
use App\Movie;
use DB;
use Notification;

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

    public function postCreate(Request $request){
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        $notificacion = new Notification;
        $notificacion::success('La película se ha guardado correctamente');
        return redirect('/catalog');
    }

    public function putEdit($id, Request $request){
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        $notificacion = new Notification;
        $notificacion::success('La película se modifico correctamente');
        return redirect('/catalog/show/'.$id);
    }

    public function putRent($id, Request $request){
        $movie = Movie::find($id);
        $movie->rented = true;
        $movie->save();
        $notificacion = new Notification;
        $notificacion::info('La película se rento correctamente');
        return redirect('/catalog/show/'.$id);
    }

    public function putReturn($id, Request $request){
        $movie = Movie::find($id);
        $movie->rented = false;
        $movie->save();
        $notificacion = new Notification;
        $notificacion::success('La película se entrego correctamente');
        return redirect('/catalog/show/'.$id);
    } 

    public function deleteMovie($id, Request $request){
        $movie = Movie::find($id);
        $movie->delete();
        $notificacion = new Notification;
        $notificacion::success('La película se elimino correctamente');
        return redirect('/catalog');
    }

}
