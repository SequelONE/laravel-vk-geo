<?php

namespace Sequelone\VkGeo;

use ATehnix\VkClient\Client;
use Sequelone\VkGeo\Commands\ImportCitiesCommand;
use Sequelone\VkGeo\Commands\ImportCountryCommand;
use Sequelone\VkGeo\Commands\ImportRegionsCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Class VkGeoServiceProvider.
 */
class VkGeoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../publish/config/vk-geo.php' => config_path('vk-geo.php')], 'config');
        $this->publishes([__DIR__.'/../publish/database/' => database_path('migrations')], 'database');
		$this->publishes([__DIR__.'/../publish/resource/vkaccesstoken.blade.php' => config_path('vkaccesstoken.blade.php')], 'resource');
		$this->publishes([__DIR__.'/../publish/controller/VkAccessTokenController.php' => app_path('Http/Controllers/VkAccessTokenController.php')]);

        $this->bootCommands();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            $client = new Client(config('vk-geo.version', '5.130'));
            $client->setDefaultToken(config('vk-geo.token', 'some-token'));

            return $client;
        });
    }

    /**
     * Booting console commands.
     *
     * @return void
     */
    private function bootCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ImportCountryCommand::class,
                ImportRegionsCommand::class,
                ImportCitiesCommand::class,
            ]);
        }
    }
}
