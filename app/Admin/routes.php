<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    
    $router->resource('statuses', StatusController::class);
    $router->resource('tai_statuses', TaiStatusController::class);
    $router->resource('branches', BranchController::class);
    $router->resource('teams', TeamStatusController::class);
    $router->resource('appointers', AppointerStatusController::class);
    $router->resource('closers', CloserStatusController::class);
    $router->resource('defenders', DefenderStatusController::class);
    $router->resource('plans', PlanStatusController::class);
       $router->resource('ops', OpStatusController::class);
 $router->resource('first-followers', FirstFollowerController::class);
 $router->resource('second-followers', SecondFollowerController::class);
       
    $router->resource('transportations', TransportationController::class);
    $router->resource('interms', IntermController::class);
    $router->resource('wastes', WasteController::class);
    $router->post('wastes/csv/import', 'WwasteController@importCsv');
    $router->resource('introducers', IntroducerController::class);
    $router->resource('companies', CompanyController::class);
    $router->get('summary_parents/excel', 'SummaryParentController@excel');
    $router->get('summary_parents/excel2', 'SummaryParentController@excel2');
    $router->resource('summary_parents', SummaryParentController::class);
    $router->resource('summary_children', SummaryChildController::class);
     $router->resource('packings', PackingController::class);
     $router->get('invoice', 'InvoiceController@index2');
     $router->post('invoice/excel', 'InvoiceController@excel');
    $router->get('csvs/excel/{id}', 'CsvController@excel');
    $router->get('csvs/excel2/{id}', 'CsvController@excel2');
    $router->get('csvs/excel3/{id}', 'CsvController@excel3');
    $router->resource('csvs', CsvController::class);
    $router->post('csvs/csv/import', 'CsvController@importCsv');

    $router->get('csv2s/excel/{id}', 'Csv2Controller@excel');
    $router->resource('csv2s', Csv2Controller::class);
    $router->post('csv2s/csv/import', 'Csv2Controller@importCsv');

    $router->get('csv3s/excel/{id}', 'Csv3Controller@excel');
    $router->resource('csv3s', Csv3Controller::class);
    $router->post('csv3s/csv/import', 'Csv3Controller@importCsv');
    $router->get('csv4s/excel/{id}', 'Csv4Controller@excel');
    $router->resource('csv4s', Csv4Controller::class);
    $router->post('csv4s/csv/import', 'Csv4Controller@importCsv');

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('emissions', EmissionController::class);
     
$router->resource('ips', IpController::class);
});
