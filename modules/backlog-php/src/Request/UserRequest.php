<?php
namespace Chatbox\BacklogPhp\Request;

use GuzzleHttp\Psr7\Request;

/**
 * @see https://developer.nulab.com/ja/docs/backlog/#backlog-api-%E3%81%A8%E3%81%AF
 */
class UserRequest
{
    /**
     * @return Request
     */
    public function users():Request
    {
        return new Request("get","/api/v2/users",[],null);
    }



}
