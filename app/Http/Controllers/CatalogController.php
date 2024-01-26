<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CatalogController extends Controller
{

    public function getIndex(){
        require 'array_peliculas.php';
        return view('catalog.index', ['arrayPeliculas' => $arrayPeliculas]);
    }

    public function getShow($id){
        require 'array_peliculas.php';
        return view('catalog.show', array('pelicula' => $arrayPeliculas[$id], 'id' => $id));
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function postCreate($pelicula){
        require 'array_peliculas.php';
        $pelicula['rented'] = false;
        array_push($arrayPeliculas, $pelicula);
        return view('catalog.edit', array('insertado' => true));
    }

    public function getEdit($id){
        require 'array_peliculas.php';
        return view('catalog.edit', array('id' => $id, 'pelicula' => $arrayPeliculas[$id]));
    }

    public function putEdit(Request $request){
        require 'array_peliculas.php';
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
