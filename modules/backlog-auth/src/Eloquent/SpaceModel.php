<?php
namespace Chatbox\BacklogApp\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class SpaceModel extends Model
{
    protected $table = "blg_space";

    public function findBySpaceKey($spaceKey){
        return $this->where("space_key",$spaceKey)->first();
    }

    public function storeFromRest(array $payload){
        $this->space_key = Arr::get($payload,"spaceKey");
        $this->owner_id = Arr::get($payload,"ownerId");
        $this->name = Arr::get($payload,"name");
        $this->lang = Arr::get($payload,"lang");
        $this->payload = json_encode($payload);
    }

    public function setDoamin($domainUrl){
        $this->domain = $domainUrl;
    }


}
