<?php
namespace Chatbox\BacklogPhp\Request;

use GuzzleHttp\Psr7\Request;

/**
 * @see https://developer.nulab.com/ja/docs/backlog/#backlog-api-%E3%81%A8%E3%81%AF
 */
class OauthRequest
{
    /**
     * @return Request
     */
    public function oauth($client_id):Request
    {
        $url = "/OAuth2AccessRequest.action?";
        $url .= "response_type=code&";
        $url .= "client_id={$client_id}";
//        $url .= "redirect_uri={$redirect_uri}&";
//        $url .= "state={$redirect_uri}&";
        return new Request("get","//OAuth2AccessRequest.action",[],null);
    }



}
