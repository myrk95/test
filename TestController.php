<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;

class TestController
{
    #[Route("/test", name: "test")]
    public function test(): Response
    {
        // Configura la URL base de la API de Stack Exchange y tu clave de acceso
        $base_url = "https://api.stackexchange.com/2.3/";

        // Crea un cliente Guzzle para hacer solicitudes HTTP
        $client = new \GuzzleHttp\Client(["base_uri" => $base_url]);

        // Parámetros de la solicitud para obtener una lista de preguntas
        $params = [
            "site" => "stackoverflow", // Sitio de Stack Exchange que deseas consultar (en este caso, Stack Overflow)
            "order" => "desc", // Ordenar las preguntas en orden descendente
            "sort" => "activity", // Ordenar por actividad
            "tagged" => ",", // Filtro para incluir el tagged
            "todate" => "1698796800	", // Filtro para to date
            "fromdate" => "1693785600	", // Filtro para incluir el from date

        ];

        // Realiza la solicitud para obtener una lista de preguntas
        $response = $client->request("GET", "questions", [
            "query" => $params,
          
        ]);  

        // Decodifica la respuesta JSON
        $data = json_decode($response->getBody());
        
        return new Response(
            '<html><body>Test</body></html>'
        );
        
    }
}
