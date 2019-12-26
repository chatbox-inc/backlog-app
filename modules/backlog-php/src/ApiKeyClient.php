<?php


namespace Chatbox\BacklogPhp;


class ApiKeyClient extends Client
{


    /**
     * ApiKeyClient constructor.
     */
    public function __construct($domain,$token)
    {
        $client = new \GuzzleHttp\Client([
            "base_uri" => $domain,
            "query" => [
                "apiKey" => $token
            ]
        ]);
        return parent::__construct($client);
    }
}
