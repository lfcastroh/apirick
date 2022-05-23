<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Http;
use App\Models\personaje;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function guardarPersonaje(){

        //Se obtiene la infomacion desde el api de Rick y Morty y se guarda en la base de datos

        $reAPI = Http::get('https://rickandmortyapi.com/api/character/3');
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
