<?php namespace EliuFlorez\Twitter;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath( __DIR__ . '/../config/twitter.php');
        $this->publishes([$source => config_path('twitter.php')]);
        $this->mergeConfigFrom($source, 'twitter');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactory($this->app);
        $this->registerManager($this->app);
    }

    /**
     * Register the factory class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerFactory(Application $app)
    {
        $app->singleton('twitter.factory', function () {
            return new Factories\TwitterFactory();
        });

        $app->alias('twitter.factory', 'EliuFlorez\Twitter\Factories\TwitterFactory');
    }

    /**
     * Register the manager class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerManager(Application $app)
    {
        $app->singleton('twitter', function ($app) {
            $config = $app['config'];
            $factory = $app['twitter.factory'];

            return new TwitterManager($config, $factory);
        });

        $app->alias('twitter', 'EliuFlorez\Twitter\TwitterManager');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'twitter',
            'twitter.factory'
        ];
    }
}
