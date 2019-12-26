<?php
namespace Chatbox\BacklogPhp;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

class Client
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function setAuth(){

    }

    public function request(Request $request){
        $response = $this->client->send($request);
        return $response;
    }







}
