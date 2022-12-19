<?php

use Teckindo\TrackerApps\App\Router;
use Teckindo\TrackerApps\Middleware\AuthMiddleware;
use Teckindo\TrackerApps\Controller\{
    AuthController, LoginController, HomeController,
    KendaraanController,
    TransaksiController, ReportController
};


//Router untuk Home
Router::add('GET', '/', LoginController::class, 'index');
Router::add('GET', '/home', HomeController::class, 'index', [AuthMiddleware::class]);

//Router untuk Transaksi
Router::add('GET', '/transaksi/scanin', TransaksiController::class, 'scannerIn', [AuthMiddleware::class]);
Router::add('GET', '/transaksi/scanin/([0-9a-zA-z\+_\-]*)', TransaksiController::class, 'scanningINAndroid', [AuthMiddleware::class]); //pake Android Scanner
Router::add('POST', '/transaksi/scanin', TransaksiController::class, 'scanningInWeb', [AuthMiddleware::class]);
Router::add('GET', '/transaksi/scanout', TransaksiController::class, 'scannerOut', [AuthMiddleware::class]);
Router::add('GET', '/transaksi/scanout/([0-9a-zA-z\+_\-]*)', TransaksiController::class, 'scanningOUTAndroid', [AuthMiddleware::class]); //pake Android Scanner
Router::add('POST', '/transaksi/scanout', TransaksiController::class, 'scanningOutWeb', [AuthMiddleware::class]);
Router::add('POST', '/transaksi', TransaksiController::class, 'save', [AuthMiddleware::class]);

//Router unutk transaksi
Router::add('GET', '/report', ReportController::class, 'index', [AuthMiddleware::class]);
Router::add('POST', '/report', ReportController::class, 'search', [AuthMiddleware::class]);

//Router untuk kendaraan 
Router::add('GET', '/kendaraan', KendaraanController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/kendaraan/add', KendaraanController::class, 'add', [AuthMiddleware::class]);
Router::add('POST', '/kendaraan/getQRCode', KendaraanController::class, 'getQRCode', [AuthMiddleware::class]);
Router::add('GET', '/kendaraan/edit/([0-9a-zA-z\+_\-]*)', KendaraanController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/kendaraan/detail', KendaraanController::class, 'detail', [AuthMiddleware::class]);
Router::add('GET', '/kendaraan/print/([0-9a-zA-z\+_\-]*)', KendaraanController::class, 'print', [AuthMiddleware::class]);
Router::add('POST', '/kendaraan', KendaraanController::class, 'save', [AuthMiddleware::class]);
Router::add('PUT', '/kendaraan', KendaraanController::class, 'update', [AuthMiddleware::class]);
Router::add('DELETE', '/kendaraan', KendaraanController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/kendaraan/download', KendaraanController::class, 'download', [AuthMiddleware::class]);
Router::add('GET', '/kendaraan/import', KendaraanController::class, 'import', [AuthMiddleware::class]);
Router::add('POST', '/kendaraan/import', KendaraanController::class, 'importData', [AuthMiddleware::class]);



//Route untuk proses login
Router::add('POST', '/login', LoginController::class, 'login');
Router::add('GET', '/logout', LoginController::class, 'logout');
Router::add('GET', '/blocked', AuthController::class, 'blocked');
