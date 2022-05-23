<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\Models\personaje;

class Personajes extends Controller
{
    //Se obtiene la infomacion desde el api de Rick y Morty y se guarda en la base de datos

    public function guardarPersonaje(){

        $reAPI = Http::get('https://rickandmortyapi.com/api/character/1');
        $reAPI->json();
        $id = $reAPI['id'];
        $nombre = $reAPI['name'];
        $estado = $reAPI['status'];
        $especie = $reAPI['species'];
        $genero = $reAPI['gender'];

        $savePersonaje = new personaje;

        $savePersonaje->id = $reAPI['id'];
        $savePersonaje->nombre = $reAPI['name'];
        $savePersonaje->estado = $reAPI['status'];
        $savePersonaje->especie = $reAPI['species'];
        $savePersonaje->genero = $reAPI['gender'];

        $savePersonaje->save();

        return $reAPI;   
    }
}