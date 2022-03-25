<?php 

namespace App\Supports;


use Jenssegers\Blade\Blade;
use Slim\Psr7\Factory\ResponseFactory;

class View {

    private $response;
    private $factory;

    public function __construct()
    {
        $this->factory = new ResponseFactory;
        $this->response = $this->factory->createResponse(200,"Success");
    }

    public function render(string $template = "",array $data = []){

        $cache = storage_path("/cache");
        $views = base_path("/views");

        $blade = (new Blade($views,$cache))->make($template,$data);

        $this->response->getBody()->write($blade->render());

        return $this->response;
    }

}
