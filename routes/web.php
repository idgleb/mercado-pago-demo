<?php

use Illuminate\Support\Facades\Route;
use MercadoPago\Client\Preference\PreferenceClient;

Route::get('/success', function () {
    return '✅ Pago exitoso';
});

Route::get('/failure', function () {
    return '❌ El pago fue rechazado';
});

Route::get('/pending', function () {
    return '⏳ El pago está pendiente';
});


Route::get('/', function () {
    return view('welcome');
});

Route::post('/pagar', function () {

    try {

        $client = new PreferenceClient();

        $preference = $client->create([
            "items" => [
                [
                    "title" => "Producto de ejemplo",
                    "quantity" => 1,
                    "unit_price" => 100
                ]
            ],
            "back_urls" => [
                "success" => url('https://17d5-190-210-19-221.ngrok-free.app/success'),
                "failure" => url('https://17d5-190-210-19-221.ngrok-free.app/failure'),
                "pending" => url('https://17d5-190-210-19-221.ngrok-free.app/pending')
            ],
            "auto_return" => "approved"
        ]);

        return redirect($preference->init_point);

    } catch (MPApiException $e) {
        $response = $e->getApiResponse()->getBody()->getContents();
        return response()->json([
            'status' => $e->getApiResponse()->getStatusCode(),
            'response' => json_decode($response, true)
        ]);
    }


});
