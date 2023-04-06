<?php

use Teckindo\TrackerApps\App\Router;
use Teckindo\TrackerApps\Middleware\AuthMiddleware;
use Teckindo\TrackerApps\Controller\{
    ApiController, StatusController,
    AuthController, LoginController, HomeController, KendaraanController,
    ReportController, DivisiController, HistoryController, UserController, 
    MenuController, OperatorController, ProfileController, RoleController, TransaksiController
};


//Router untuk Home
Router::add('GET', '/', LoginController::class, 'index');
Router::add('GET', '/home', HomeController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/home/scanner', HomeController::class, 'scanner', [AuthMiddleware::class]);
Router::add('GET', '/home/([0-9a-zA-z\+_\-]*)', HomeController::class, 'scanning', [AuthMiddleware::class]);
Router::add('POST', '/home', HomeController::class, 'scanningPost', [AuthMiddleware::class]);

//Router unutk status
Router::add('GET', '/status', StatusController::class, 'kendaraan', [AuthMiddleware::class]);
Router::add('GET', '/status/sopir', StatusController::class, 'sopir', [AuthMiddleware::class]);
Router::add('GET', '/status/kenek', StatusController::class, 'kenek', [AuthMiddleware::class]);

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
Router::add('POST', '/report/cari', ReportController::class, 'cari', [AuthMiddleware::class]);

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

//Router untuk operator
Router::add('GET', '/operator', OperatorController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/operator/add', OperatorController::class, 'add', [AuthMiddleware::class]);
Router::add('POST', '/operator', OperatorController::class, 'save', [AuthMiddleware::class]);
Router::add('GET', '/operator/edit/([0-9a-zA-z\+_\-]*)', OperatorController::class, 'edit', [AuthMiddleware::class]);
Router::add('PUT', '/operator', OperatorController::class, 'update', [AuthMiddleware::class]);
Router::add('DELETE', '/operator', OperatorController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/operator/download', OperatorController::class, 'download', [AuthMiddleware::class]);
Router::add('GET', '/operator/import', OperatorController::class, 'import', [AuthMiddleware::class]);
Router::add('POST', '/operator/import', OperatorController::class, 'importData', [AuthMiddleware::class]);

//Router untuk user
Router::add('GET', '/user', UserController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/user/add', UserController::class, 'add', [AuthMiddleware::class]);
Router::add('POST', '/user', UserController::class, 'save', [AuthMiddleware::class]);
Router::add('GET', '/user/edit/([0-9a-zA-z\+_\-]*)', UserController::class, 'edit', [AuthMiddleware::class]);
Router::add('PUT', '/user', UserController::class, 'update', [AuthMiddleware::class]);
Router::add('DELETE', '/user', UserController::class, 'delete', [AuthMiddleware::class]);

//Router untuk menu
Router::add('GET', '/controller', MenuController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/controller/add', MenuController::class, 'add', [AuthMiddleware::class]);
Router::add('POST', '/controller', MenuController::class, 'save', [AuthMiddleware::class]);
Router::add('GET', '/controller/edit/([0-9a-zA-z\+_\-]*)', MenuController::class, 'edit', [AuthMiddleware::class]);
Router::add('PUT', '/controller', MenuController::class, 'update', [AuthMiddleware::class]);
Router::add('DELETE', '/controller', MenuController::class, 'delete', [AuthMiddleware::class]);

//Router untuk Divisi
Router::add('GET', '/divisi', DivisiController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/divisi/add', DivisiController::class, 'add', [AuthMiddleware::class]);
Router::add('POST', '/divisi', DivisiController::class, 'save', [AuthMiddleware::class]);
Router::add('GET', '/divisi/edit/([0-9a-zA-z\+_\-]*)', DivisiController::class, 'edit', [AuthMiddleware::class]);
Router::add('PUT', '/divisi', DivisiController::class, 'update', [AuthMiddleware::class]);
Router::add('DELETE', '/divisi', DivisiController::class, 'delete', [AuthMiddleware::class]);

//Router untuk Role
Router::add('GET', '/role', RoleController::class, 'index', [AuthMiddleware::class]);
Router::add('POST', '/role/getEdit', RoleController::class, 'getEdit', [AuthMiddleware::class]);
Router::add('POST', '/role', RoleController::class, 'save', [AuthMiddleware::class]);
Router::add('PUT', '/role', RoleController::class, 'update', [AuthMiddleware::class]);
Router::add('DELETE', '/role', RoleController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/role/akses/([0-9a-zA-z\+_\-/]*)', RoleController::class, 'akses', [AuthMiddleware::class]);
Router::add('PUT', '/role/akses', RoleController::class, 'updateAkses', [AuthMiddleware::class]);

//Router untuk History
Router::add('GET', '/history', HistoryController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/history/edit/([0-9a-zA-z\+_\-/]*)', HistoryController::class, 'edit', [AuthMiddleware::class]);
Router::add('PUT', '/history', HistoryController::class, 'update', [AuthMiddleware::class]);

//Router unutk Profile
Router::add('GET', '/profile', ProfileController::class, 'index', [AuthMiddleware::class]);
Router::add('PUT', '/profile', ProfileController::class, 'update', [AuthMiddleware::class]);

//Testing API Firman Indonesia
Router::add('GET', '/api/kendaraan', ApiController::class, 'getKendaraan', [AuthMiddleware::class]);
Router::add('GET', '/api/driver', ApiController::class, 'getDriver', [AuthMiddleware::class]);
Router::add('GET', '/api/codriver', ApiController::class, 'getCodriver', [AuthMiddleware::class]);
Router::add('GET', '/api/perjalanandriver', ApiController::class, 'getPerjalanan', [AuthMiddleware::class]);
Router::add('POST', '/api/perjalanandriver', ApiController::class, 'getPerjalananDetail', [AuthMiddleware::class]);
Router::add('POST', '/api/perjalanandriver', ApiController::class, 'getPerjalananDetail', [AuthMiddleware::class]);
Router::add('GET', '/api/barangkeluar', ApiController::class, 'getBarangKeluar', [AuthMiddleware::class]);
Router::add('POST', '/api/suratjalan', ApiController::class, 'getSuratJalan', [AuthMiddleware::class]);
Router::add('POST', '/api/cekrencanakirim', ApiController::class, 'getRencanaKirim', [AuthMiddleware::class]);
Router::add('POST', '/api/getPerjalanan', ApiController::class, 'getPerjalananById', [AuthMiddleware::class]);
Router::add('POST', '/api/getDetailPerjalanan', ApiController::class, 'getDetailPerjalanan', [AuthMiddleware::class]);



//Route untuk proses login
Router::add('POST', '/login', LoginController::class, 'login');
Router::add('GET', '/logout', LoginController::class, 'logout');
Router::add('GET', '/blocked', AuthController::class, 'blocked');
