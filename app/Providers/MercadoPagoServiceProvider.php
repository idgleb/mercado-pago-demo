<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoServiceProvider extends ServiceProvider
{
    public function register()
    {
        MercadoPagoConfig::setAccessToken(env('MP_ACCESS_TOKEN'));
    }

    public function boot()
    {
        //
    }
}
