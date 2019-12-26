<?php
namespace Chatbox\BacklogApp;

use Illuminate\Support\ServiceProvider;

use Chatbox\BacklogApp\Commands;


class BacklogAppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\Register\TeamCommand::class
            ]);
        }
    }

}
