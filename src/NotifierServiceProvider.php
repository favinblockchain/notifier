<?php

namespace Favinblockchain\Notifier;

use Favinblockchain\Notifier\Repositories\NotifierRepository;
use Favinblockchain\Notifier\Core\SMSNotifier;
use Favinblockchain\Notifier\Facades\Notifier;
use Illuminate\Support\ServiceProvider;
use Favinblockchain\Notifier\Facades\NotifierToolsFacade;

class NotifierServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notifier::shouldProxyTo(SMSNotifier::class);
        NotifierToolsFacade::shouldProxyTo(NotifierRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
     public function boot()
     {
         $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

         $this->publishes([
             __DIR__.'/config/notifier.php' =>config_path('notifier.php')
         ], 'notifier');
     }
}
