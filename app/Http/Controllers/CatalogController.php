<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

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
        }catch(Exception $e){
            return $e;
        }
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function postCreate($pelicula){
        $pelicula['rented'] = false;
        array_push($arrayPeliculas, $pelicula);
        return view('catalog.edit', array('insertado' => true));
    }

    public function getEdit($id){
        try{
            $arrayPeliculas = Movie::findOrFail($id);
            return view('catalog.edit', array('pelicula' => $arrayPeliculas, 'id' => $id));
        }catch(Exception $e){
            return $e;
        }
    }

    public function putEdit(Request $request){
        /*
        $arrayPeliculas[$pelicula['id']]['title'] = $pelicula['title'];
        $arrayPeliculas[$pelicula['id']]['year'] = $pelicula['year'];
        $arrayPeliculas[$pelicula['id']]['synopsis'] = $pelicula['synopsis'];
        $arrayPeliculas[$pelicula['id']]['director'] = $pelicula['director'];
        $arrayPeliculas[$pelicula['id']]['poster'] = $pelicula['poster'];*/
        /*
        return view('catalog.edit', array('editado' => true, 'pelicula' => $pelicula, 'id' => $pelicula->input('id')));*/
    }
}
