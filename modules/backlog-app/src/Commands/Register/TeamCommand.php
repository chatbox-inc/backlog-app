<?php
namespace Chatbox\BacklogApp\Commands\Register;

use Chatbox\BacklogApp\Eloquent\SpaceModel;
use Chatbox\BacklogPhp\ApiKeyClient;
use Chatbox\BacklogPhp\Client;
use Chatbox\BacklogPhp\Request\TeamRequest;
use Chatbox\BacklogPhp\Request\UserRequest;
use Illuminate\Console\Command;

class TeamCommand extends Command
{
    protected $signature = "blgapp:register:team {domain} {token}";

    public function handle(){

        $domain = $this->argument("domain");
        $token = $this->argument("token");

        $domain_url = "https://{$domain}";

        $client = new ApiKeyClient($domain_url,$token);

        $this->handleSpaceInfo($client,$domain_url);
    }

    protected function handleSpaceInfo(Client $client,$domain_url){
        $request = new TeamRequest();
        $response = $client->request($request->space());
        $contents = $response->getBody()->getContents();
        $contents = json_decode($contents,true);

        $spaceKey = $contents["spaceKey"];
        $model = (new SpaceModel())->findBySpaceKey($spaceKey)?:new SpaceModel();
        $model->storeFromRest($contents,$domain_url);
        $model->save();
    }

    protected function handleUsers(Client $client,$domain_url){
        $request = new UserRequest();
        $response = $client->request($request->users());
        $contents = $response->getBody()->getContents();
        $contents = json_decode($contents,true);

        foreach ($contents as $user) {
            
        }
        
        $spaceKey = $contents["spaceKey"];
        $model = (new SpaceModel())->findBySpaceKey($spaceKey)?:new SpaceModel();
        $model->storeFromRest($contents,$domain_url);
        $model->save();
    }





}
