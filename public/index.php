<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 */

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// Memuat file autoload yang disediakan oleh Composer
require __DIR__.'/../vendor/autoload.php';

// Membuat aplikasi Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Mendapatkan instance HTTP kernel
$kernel = $app->make(Kernel::class);

// Menangani permintaan HTTP yang masuk dan mengembalikan respons
$response = $kernel->handle(
    $request = Request::capture()
);

// Mengirimkan respons ke browser
$response->send();

// Menyelesaikan permintaan setelah respons dikirim
$kernel->terminate($request, $response);
