<?php
namespace Chatbox\BacklogAuth;

use Illuminate\Support\ServiceProvider;

use Chatbox\BacklogAuth\Commands;

class BacklogAuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\LoginCommand::class
            ]);
        }
    }

}
