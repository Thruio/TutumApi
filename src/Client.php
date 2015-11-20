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

    public function __construct($username, $apiKey)
    {
        $this->username = $username;
        $this->apiKey = $apiKey;

        $config = [
            // Define request defaults
          'base_url' => $this->baseUrl,
          'defaults' => [
            'headers' => [
              'Authorization' => 'ApiKey ' . $this->username . ':' . $this->apiKey,
              'Accepts' => 'application/json'
            ],
            // I hate guzzle. TODO: Make this detect retarded windows machines.
            'verify' => false
          ]
        ];
        $this->client = new GuzzleHttp\Client($config);
        
    }

    public static function configure($username, $apiKey)
    {
        self::$instance = new Client($username, $apiKey);
    }

    /**
     * @return Client
     * @throws \Exception
     */
    public static function getInstance()
    {
        if (self::$instance instanceof Client) {
            return self::$instance;
        } else {
            throw new \Exception("Must run Client::configure() first!");
        }
    }

    public function makeRequest($type, $method, $options = [])
    {

        $request = $this->client->createRequest($type, $method, $options);
        try {
            $res = $this->client->send($request);
        }catch(GuzzleHttp\Exception\ClientException $ce){
            \Kint::dump($ce->getResponse()->getBody()->getContents());
            throw $ce;
        }
        if ($res->getHeader('content-type') == 'application/json') {
            $json = json_decode($res->getBody()->getContents());
        } else {
            throw new \Exception("Server did not send JSON. Response was \"{$res->getBody()->getContents()}\"");
        }

        return $json;
    }

    public function stacks()
    {
        return new Services\Stack($this);
    }

    public function services()
    {
        return new Services\Service($this);
    }

    public function containers()
    {
        return new Services\Container($this);
    }

    public function nodes()
    {
        return new Services\Node($this);
    }
}
