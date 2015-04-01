<?php namespace Satooon\JsonSchemaValidator;

use Illuminate\Support\ServiceProvider;

class JsonSchemaValidatorServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('satooon/json-schema-validator');

		\Lang::addNamespace('json-schema-validator', __DIR__.'/../lang');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['config']->package('satooon/json-schema-validator', __DIR__.'/../config');

		$this->app->bind('jsonSchemaValidator',function(){
			return new JsonSchemaValidator;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}
}
