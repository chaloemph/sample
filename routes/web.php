<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//fullcalender
Route::get('/fullcalendar','FullCalendarController@index');
Route::get('/fullcalendar/{type}/{type_id}','FullCalendarController@fillter')->name('fullcalendar.fillter');
Route::post('/fullcalendar/create','FullCalendarController@create');
Route::post('/fullcalendar/update','FullCalendarController@update');
Route::post('/fullcalendar/delete','FullCalendarController@destroy');


Route::get('/mail/{id}', 'MailController@index')->name('mail');
Route::get('/mail/{id}/success', 'MailController@success')->name('mail.success');


Route::get('/', function () {
    return view('index');
    // return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::resource('/payment', 'PaymentController');
Route::get('/payment/checking/status', 'PaymentController@checking')->name('payment.checking.status');
Route::post('/payment/checking/status', 'PaymentController@checkingstatus')->name('payment.checking.status.boooking');

Route::get('/payment/checking/howto', 'PaymentController@howto')->name('payment.checking.howto');


Route::post('/booking', 'BookingController@store')->name('storebooking');

Route::get('/ships/go/{id}', 'BookingController@shipgobooking')->name('shipgobooking');
Route::put('/ships/go/{id}', 'BookingController@shipgobookingstore')->name('shipgobookingstore');
Route::get('/ships/back/{id}', 'BookingController@shipbackbooking')->name('shipbackbookingstore');
Route::put('/ships/back/{id}', 'BookingController@shipbackbookingstore')->name('shipbackbooking');

Route::get('/vehicles/go/{id}', 'BookingController@vehiclegobooking')->name('vehiclegobooking');
Route::put('/vehicles/go/{id}', 'BookingController@vehiclegobookingstore')->name('vehiclegobookingstore');
Route::get('/vehicles/back/{id}', 'BookingController@vehiclebackbooking')->name('vehiclebackbooking');
Route::put('/vehicles/back/{id}', 'BookingController@vehiclebackbookingstore')->name('vehiclebackbookingstore');

Route::get('/trips/{id}', 'BookingController@tripbooking')->name('tripbooking');
Route::put('/trips/{id}', 'BookingController@tripbookingstore')->name('tripbookingstore');

Route::get('/personal/{id}', 'BookingController@personalbooking')->name('personalbooking');
Route::put('/personal/{id}', 'BookingController@personalbookingstore')->name('personalbookingstore');

Route::get('/insurance/{id}', 'BookingController@insurancebooking')->name('insurancebooking');
Route::put('/insurance/{id}', 'BookingController@insurancebookingstore')->name('insurancebookingstore');

Route::get('/timeline/{id}', 'BookingController@timelinebooking')->name('timelinebooking');

Route::get('/skip_selectship/{id}', 'BookingController@skip_selectship')->name('skipselectship');
Route::get('/skip_selectvehicle/{id}', 'BookingController@skip_selectvehicle')->name('skipselectvehicle');
Route::get('/skip_selecttrip/{id}', 'BookingController@skip_selecttrip')->name('skipselecttrip');
Route::get('/skip_selectinsurance/{id}', 'BookingController@skip_selectinsurance')->name('skipselectinsurance');

Route::get('/typepayment/{id}', 'BookingController@typepayment')->name('typepayment');
Route::put('/typepayment/{id}', 'BookingController@typepaymentbookingstore')->name('typepaymentbookingstore');

Route::get('pdf/{id}', 'PDFController@index')->name('invoice');
Route::get('pdf/{id}/success', 'PDFController@success')->name('invoice-success');

Route::get('mobilebanking/{id}', 'MobileBankingController@index')->name('mobilebanking.index');

Route::get('blog/{id}', 'BlogController@show')->name('blog.show');
Route::get('service/{id}', 'BlogserviceController@show')->name('service.show');
Route::get('schedule/{id}', 'ScheduleserviceController@show')->name('schedule.show');

Route::get('paysolutions/success', function () {
    return view('paysolutions-success');
});


Route::prefix('dashboard')->group(function () {
    Route::group(['middleware' => ['auth']], function () {

        Route::get('/', 'dashboard\DashboardController@index')->name('dashboard');

        Route::resources([
            'users' => 'dashboard\UserController',
            'schedules' => 'dashboard\ScheduleController',
            'shipschedules' => 'dashboard\ScheduleShipController',
            'vehicleschedules' => 'dashboard\ScheduleVehicleController',
            'bookings' => 'dashboard\BookingController',
            'trips' => 'dashboard\TripController',
            'ships' => 'dashboard\ShipController',
            'vehicles' => 'dashboard\VehicleController',
            'blogs' => 'dashboard\BlogController',
            'blogservices' => 'dashboard\BlogserviceController',
            'scheduleservices' => 'dashboard\ScheduleserviceController',
            'points' => 'dashboard\PointController'

            // 'calendars_vehicles' => 'dashboard\CalendarVehicleController',
            ],
            ['as' => 'dashboard']
        );

        Route::get('payments/{payment}/canclepayment', 'dashboard\PaymentController@canclepayment')->name('dashboard.payments.canclepayment');
        Route::get('bookings/{booking}/canclebooking', 'dashboard\BookingController@canclebooking')->name('dashboard.bookings.canclebooking');
        Route::get('bookings/{booking}/confirmbooking', 'dashboard\BookingController@confirmbooking')->name('dashboard.bookings.confirmbooking');
        Route::get('bookings/note/save/{id}', 'dashboard\BookingController@notesave')->name('dashboard.bookings.note.save');
        Route::get('mobilebankingbookings', 'dashboard\BookingController@indexmobilebanking')->name('dashboard.bookings.index.mobilebanking');

        Route::get('schedules/ships/change/status', 'dashboard\ScheduleController@changeshipstatus')->name('dashboard.changeshipstatus');
        Route::get('schedules/vehicles/change/status', 'dashboard\ScheduleController@changevehiclestatus')->name('dashboard.changevehiclestatus');
        Route::get('schedules/trips/change/status', 'dashboard\ScheduleController@changetripstatus')->name('dashboard.changetripstatus');

        Route::get('schedules/trips/change/price', 'dashboard\ScheduleController@changetripprice')->name('dashboard.changetripprice');
    });
});


Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');








