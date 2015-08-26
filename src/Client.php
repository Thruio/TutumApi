<?php
namespace Thru\TutumApi;

use GuzzleHttp;

class Client
{
    static private $instance;

    private $baseUrl = "https://dashboard.tutum.co";

    /** @var GuzzleHttp\Client */
    private $client;

    private $username;
    private $apiKey;

    public function __construct($username, $apiKey){
        $this->username = $username;
        $this->apiKey = $apiKey;

        $config = [
            // Define request defaults
          'base_url' => $this->baseUrl,
          'defaults' => [
            'headers' => [
              'Authorization' => 'ApiKey ' . $this->username . ':' . $this->apiKey,
              'Accepts' => 'application/json'
            ]
          ]
        ];
//\Kint::dump($config['defaults']['headers']);
        $this->client = new GuzzleHttp\Client($config);
        
    }

    static public function configure($username, $apiKey){
        self::$instance = new Client($username, $apiKey);
    }

    /**
     * @return Client
     * @throws \Exception
     */
    static public function getInstance(){
        if(self::$instance instanceof Client) {
            return self::$instance;
        }else{
            throw new \Exception("Must run Client::configure() first!");
        }
    }

    public function makeRequest($type, $method, $options = []){

        $request = $this->client->createRequest($type, $method, $options);
        \Kint::dump($request);
        $res = $this->client->send($request);
        \Kint::dump($res);


        if($res->getHeader('content-type') == 'application/json'){
            $json = json_decode($res->getBody()->getContents());
        }else{
            throw new \Exception("Server did not send JSON.");
        }

        return $json;
    }

    public function stacks(){
        return new Services\Stack($this);
    }

    public function services(){
        return new Services\Service($this);
    }

    public function containers(){
        return new Services\Container($this);
    }

    public function nodes(){
        return new Services\Node($this);
    }
}