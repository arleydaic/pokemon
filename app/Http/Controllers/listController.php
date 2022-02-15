<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class listController extends Controller
{
    public function index()
    {
     
        /* Función que consulta un API, el resultado se carga en un array tipo json y se muestra en 
        la vista, teniendo en cuenta que máximo son 100 pokemones*/

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://pokeapi.co/api/v2/pokemon',
            'timeout'  => 2.0,
        ]);    

        $response = $client->request('GET');

        $posts=(($response->getBody()->getContents()));

        return view('posts.index', compact('posts'));
    }    
        
}
