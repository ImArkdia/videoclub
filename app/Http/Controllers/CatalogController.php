<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Redirect;

class CatalogController extends Controller
{

    public function getIndex(){
        $arrayPeliculas = Movie::all();
        return view('catalog.index', ['arrayPeliculas' => $arrayPeliculas]);
    }

    public function getShow($id){
        try{
            $arrayPeliculas = Movie::findOrFail($id);
            return view('catalog.show', array('pelicula' => $arrayPeliculas, 'id' => $id));
        }catch(\Exception $e){
            return $e;
        }
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function postCreate(Request $pelicula){
        $movie = new Movie;
        $movie->title = $pelicula->input('title');
        $movie->year = $pelicula->input('year');
        $movie->director = $pelicula->input('director');
        $movie->poster = $pelicula->input('poster');
        $movie->synopsis = $pelicula->input('synopsis');
        $movie->rented = false;
        $movie->save();
        
        return Redirect::to('/catalog');
    }

    public function getEdit($id){
        try{
            $arrayPeliculas = Movie::findOrFail($id);
            return view('catalog.edit', array('pelicula' => $arrayPeliculas, 'id' => $id));
        }catch(\Exception $e){
            return $e;
        }
    }

    public function putEdit(Request $pelicula){
        try {
            $movie = Movie::findOrFail($pelicula->input('id'));
            $movie->title = $pelicula->input('title');
            $movie->year = $pelicula->input('year');
            $movie->director = $pelicula->input('director');
            $movie->poster = $pelicula->input('poster');
            $movie->synopsis = $pelicula->input('synopsis');
            $movie->save();
    
            $p = Movie::findOrFail($pelicula->input('id'));
            return Redirect::to('/catalog/show/'.$pelicula->input('id'));
        } catch (\Exception $th) {
            return view('catalog.edit', array(('id') => $pelicula->input('id'), 'editado' => false));
        }
    }

    public function getAlquilar($id){
        try {
            $movie = Movie::findOrFail($id);
            $movie->rented = true;
            $movie->save();
            return Redirect::to('/catalog/show/'.$id);
        } catch (\Exception $th) {
            return Redirect::to('/catalog/show/'.$id);
        }
    }

    public function getDevolver($id){
        try {
            $movie = Movie::findOrFail($id);
            $movie->rented = false;
            $movie->save();
            return Redirect::to('/catalog/show/'.$id);
        } catch (\Exception $th) {
            return Redirect::to('/catalog/show/'.$id);
        }
    }
}
