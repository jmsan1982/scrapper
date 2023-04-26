<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;


class ScrapperController extends Controller
{
    public function busqueda(Request $request){
        $busqueda = $request->input('buscar');

        //obtengo los resultados de la busqueda anterior y los guardo en session
        $busquedaAnterior = session('contador', []);

        //objeto de goutte
        $client = new Client();
        //busqueda en google
        $crawler = $client->request('GET', 'https://www.bing.com/search?q=' . $busqueda);

        //extraigo los primeros 5 dominios de la busqueda de bing
        $results = $crawler->filter('#b_results > li > h2 > a')->slice(0, 5);
        $dominios = $results->each(function ($nodo){
            return parse_url($nodo->attr('href'), PHP_URL_HOST);
        });

        //conteo de cantidad de resultados por dominio
        $domainCounts = array_count_values($dominios);

        //sumo resultados de la nueva busqueda con la que habia
        foreach ($busquedaAnterior as $dominio => $count){
            if (isset($domainCounts[$dominio])){
                $domainCounts[$dominio] += $count;
            }else{
                $domainCounts[$dominio] = $count;
            }
        }

        //ordeno de mayor a menor la cantidad de dominios contados
        arsort($domainCounts);

        //guardo el resultado ne session
        session(['contador' => $domainCounts]);
        return view('resultados', [
            'domainCounts' => $domainCounts,
        ]);
    }
}
