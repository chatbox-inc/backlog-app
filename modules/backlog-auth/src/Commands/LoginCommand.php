<?php
namespace Chatbox\BacklogAuth\Commands;

use Chatbox\BacklogApp\Eloquent\SpaceModel;
use Chatbox\BacklogPhp\ApiKeyClient;
use Chatbox\BacklogPhp\Client;
use Chatbox\BacklogPhp\Request\OauthRequest;
use Chatbox\BacklogPhp\Request\TeamRequest;
use Chatbox\BacklogPhp\Request\UserRequest;
use Illuminate\Console\Command;

class LoginCommand extends Command
{
    protected $signature = "blgauth:login {domain}";

    public function handle(){
        $domain = $this->argument("domain");

        $guzzle = new \GuzzleHttp\Client([
            "base_url" => "https://{$domain}"
        ]);
        $client = new Client($guzzle);

        $oauth = new OauthRequest();
        $response = $client->request($oauth->oauth(""));
        $headers = $response->getHeaders();

        dd($headers);

        $this->line("hello");
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
