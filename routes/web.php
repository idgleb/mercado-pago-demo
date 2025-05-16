<?php

use Illuminate\Support\Facades\Route;
use MercadoPago\Client\Preference\PreferenceClient;

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
                "success" => url('https://localhost:8081/success'),
                "failure" => url('https://localhost:8081/failure'),
                "pending" => url('https://localhost:8081/pending')
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


Route::get('/success', function () {
    return '✅ Pago exitoso';
})->name('success');

Route::get('/failure', function () {
    return '❌ El pago fue rechazado';
})->name('failure');

Route::get('/pending', function () {
    return '⏳ El pago está pendiente';
})->name('pending');
