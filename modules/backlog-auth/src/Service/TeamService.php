<?php
namespace Chatbox\BacklogApp\Service;

use Chatbox\BacklogPhp\Client;
use Chatbox\BacklogPhp\Request\TeamRequest;

class TeamService
{
    protected $client;

    /**
     * TeamService constructor.
     * @param $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function registerTeam(Client $client){
        $request = new TeamRequest();
        $response = $client->request($request->space());
        $contents = $response->getBody()->getContents();
        $contents = json_decode($contents,true);

    }

    public function updateTeam(Client $client){
        $request = new TeamRequest();
        $response = $client->request($request->space());
        $contents = $response->getBody()->getContents();
        $contents = json_decode($contents,true);

    }

}
