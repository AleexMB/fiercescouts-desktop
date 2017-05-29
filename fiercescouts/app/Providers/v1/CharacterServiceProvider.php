<?php

namespace fiercescouts\Providers\v1;

use Illuminate\Support\ServiceProvider;
use fiercescouts\Services\v1;

use Illuminate\Support\Facades\Validator;

class CharacterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('characterGender', function($attribute, $value, $parameters, $validator) {
            return $value == 'F' || $value == "M";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CharacterService::class, function($app) {
            return new CharacterService();
        });
    }
}
