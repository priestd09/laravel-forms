<?php namespace NpmWeb\FormBuilder;

class HtmlServiceProvider 
	extends \NpmWeb\ClientValidationGenerator\Laravel\HtmlServiceProvider
{

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

		// @see https://coderwall.com/p/svocrg
		// This one actually works without these params, but putting it
		// here in case duplicated in the future. If you put the
		// ServiceProvider in a subdir, you have to specify a
		// non-default path
		$this->package('npmweb/laravel-forms', null, __DIR__.'/../../');
	}

	protected function createFormBuilder($app) {
		// use this package's FormBuilder, not the default one
		return new FormBuilder( $app['html'], $app['url'], $app['session.store']->getToken());
	}

}
