<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class searchController extends Controller
{
    /* Función que consulta un API, el resultado se carga en un array tipo json y se realiza
       la búsqueda de la posición nombre o url según la selección del usuario*/

    public function index()
    {
        
        $name = $_POST['name'];
        $url  = $_POST['url'];
        
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://pokeapi.co/api/v2/pokemon',
            'timeout'  => 2.0,
        ]);    

        $response = $client->request('GET');

        $posts=($response->getBody()->getContents());

        $jsonpost = json_decode($posts);

        $result = array_search($name,$jsonpost->results);

        $dataname = '';

        $dataurl  = '';

        $datasend = [];

        $strend  = array('result'=>array(),'id'=>'arleydainsignaresc@gmail.com');

        if (!empty($name) && empty($url))
        {    
            $searchname = array_search($name, array_column($jsonpost->results, 'name'));
            $dataname    = $jsonpost->results[$searchname];
            $datasend    = $dataname;
        }

        if (empty($name) && !empty($url))
        {
            $searchurl  = array_search($name, array_column($jsonpost->results, 'url'));
            $dataurl     = $jsonpost->results[$searchurl];
            $datasend    = array_push($datasend, $dataurl);
        }
        
        $strend['result'] = $datasend;

        $this->enviar($strend);

    }    

    /* Enviar resultado a un Endpoint como un array de dos posiciones. 
       La primera tiene un array con la data y la segunda un id con el Email. */
    public function enviar($data)
    {

        //create a new cURL resource
        $ch = curl_init('https://en4do2rbb9qvdcn.m.pipedream.net');

        $payload = json_encode(array("user" => $data));
        
        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        
        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        
        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        //execute the POST request
        $result = curl_exec($ch);
        
        //close cURL resource
        curl_close($ch);

        //var_dump($result);

        $pos = strpos($result, 'Success');

        if ($pos==true)
            echo "Data Send";
        else
            echo "Data don't send";

    }
}