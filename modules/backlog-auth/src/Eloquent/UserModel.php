<?php
namespace Chatbox\BacklogApp\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class UserModel extends Model
{
    protected $table = "blg_user";

    public function findBySpaceKey($spaceKey){
        return $this->where("space_key",$spaceKey)->first();
    }

    public function storeFromRest(array $payload){
        $this->blg_id = Arr::get($payload,"");
        $this->user_id = Arr::get($payload,"");
        $this->name = Arr::get($payload,"");
        $this->role_type = Arr::get($payload,"");
        $this->lang = Arr::get($payload,"");
        $this->email = Arr::get($payload,"");
        $this->payload = json_encode($payload);
    }


}
