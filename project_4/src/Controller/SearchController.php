<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SearchController extends Controller 
{
    public function default(Request $request, Response $response)
    {
        $albums = json_decode(file_get_contents(__DIR__ . '/../../data/albums.json', true));
        return $this->render($response, 'default.html', ['albums' => $albums]);
    }

    public function search(Request $request, Response $response)
    {
        $albums = json_decode(file_get_contents(__DIR__ . '/../../data/albums.json'), true);

        $query = $request->getQueryParam('q');
        
        if ($query) {
            $albums = array_values(array_filter($albums, function($album) use ($query) {
                return stripos($album['title'], $query) !== false || stripos($album['artist'], $query) !== false;
            }));
        }

        return $this->render($response, 'search.html', [
            'albums' => $albums,
            'query' => $query
        ]);
    }

    public function form(Request $request, Response $response)
    {
        $albums = json_decode(file_get_contents(__DIR__ . '/../../data/albums.json'), true);

        $query = $request->getParam('q');
        
        if ($query) {
            $albums = array_values(array_filter($albums, function($album) use ($query) {
                return stripos($album['title'], $query) !== false || stripos($album['artist'], $query) !== false;
            }));
        } 

        return $this->render($response, 'form.html', [
            'albums' => $albums,
            'query' => $query
        ]);
    }
}