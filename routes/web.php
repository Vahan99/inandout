<?php

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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    \Carbon\Carbon::setLocale(\App::getLocale());

    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
        Route::get('/', 'Admin\IndexController@show')->name('admin.index');
        Route::group(['prefix' => 'tour'], function () {
            Route::get('index', 'Admin\TourController@show')->name('tour.show');
            Route::get('create', 'Admin\TourController@create')->name('tour.create');
            Route::post('add', 'Admin\TourController@add')->name('tour.add');
            Route::get('update/{id}', 'Admin\TourController@update')->name('tour.update');
            Route::post('edit/{id}', 'Admin\TourController@edit')->name('tour.edit');
            Route::get('delete/{id}', 'Admin\TourController@delete')->name('tour.delete');
            Route::get('deleteImage/{id}','Admin\TourController@deleteImage')->name('tour.deleteImage');
            Route::get('set-main-image/{tour_id}/{id}','Admin\TourController@setMainImage')->name('tour.setMainImage');
            Route::get('delete-data/{id}', 'Admin\TourController@deleteData')->name('tour.delete-data');
            Route::get('create-update-data/{id}', 'Admin\TourController@createUpdateData')->name('tour.create-update-data');
            Route::post('create-update-data-save/{id}', 'Admin\TourController@createUpdateDataSave')->name('tour.create-update-data-save');
            // TourType routes 
            Route::get('create_type_tour', 'Admin\TourController@createTourType')->name('tour.createTourType');
            Route::post('add_type_tour', 'Admin\TourController@addTourType')->name('tour.addTourType');
            Route::get('tour-types', 'Admin\TourController@allTourTypes')->name('tour.all-tour-types');
            Route::get('delete-tour-type/{id}', 'Admin\TourController@deleteTourType')->name('tour.delete-tour-type');
            Route::get('update-tour-type/{id}', 'Admin\TourController@updateTourType')->name('tour.update-tour-type');
            Route::post('update-tour-type-post/{id}', 'Admin\TourController@updateTourTypePost')->name('tour.update-tour-type-post');
            Route::get('create-update-tour-days/{id}', 'Admin\TourController@createUpdateTourDays')->name('tour.create-tour-days');
            Route::get('update-tour-days/{id}','Admin\TourController@updateTourDays')->name('tour.update-days');
            Route::get('delete-tour-days/{id}','Admin\TourController@deleteTourDays')->name('tour.delete-days');

            // ajax route
            Route::post('ge-children-tour-types', 'Admin\TourController@getChildrenTourTypes')->name('get_children_tour_types');

            Route::get('tour-days/{tour_id}', 'Admin\TourController@showTourDays')->name('tour-days.show');
            Route::get('tour-days/form/{tour_id}', 'Admin\TourController@tourDaysForm')->name('tour-days.form');
            Route::get('tour-days/update_form/{tour_day_id}', 'Admin\TourController@tourDaysUpdateForm')->name('tour-days.update-form');
            Route::post('tour-days/create/{tour_id}', 'Admin\TourController@addTourDay')->name('tour-days.create');
            Route::post('tour-days/update/{tour_day_id}', 'Admin\TourController@updateTourDay')->name('tour-days.update');
            Route::get('tour-days/delete/{tour_day_id}', 'Admin\TourController@deleteTourDay')->name('tour-days.delete');
        });
        Route::group(['prefix' => 'restaurant'], function () {
            Route::get('index', 'Admin\RestaurantController@show')->name('restaurant.show');
            Route::get('create', 'Admin\RestaurantController@create')->name('restaurant.create');
            Route::post('add', 'Admin\RestaurantController@add')->name('restaurant.add');
            Route::get('update/{id}', 'Admin\RestaurantController@update')->name('restaurant.update');
            Route::post('edit/{id}', 'Admin\RestaurantController@edit')->name('restaurant.edit');
            Route::get('delete/{id}', 'Admin\RestaurantController@delete')->name('restaurant.delete');
            Route::get('deleteImage/{id}','Admin\RestaurantController@deleteImage')->name('restaurant.deleteImage');
            Route::get('set-main-image/{restaurant_id}/{id}','Admin\RestaurantController@setMainImage')->name('restaurant.setMainImage');
        });
        Route::group(['prefix' => 'team'], function () {
            Route::get('index', 'Admin\TeamsController@show')->name('team.show');
            Route::get('create', 'Admin\TeamsController@create')->name('team.create');
            Route::post('add', 'Admin\TeamsController@add')->name('team.add');
            Route::get('update/{id}', 'Admin\TeamsController@update')->name('team.update');
            Route::post('edit/{id}', 'Admin\TeamsController@edit')->name('team.edit');
            Route::get('delete/{id}', 'Admin\TeamsController@delete')->name('team.delete');
            Route::get('deleteImage/{id}','Admin\TeamsController@deleteImage')->name('team.deleteImage');
            Route::get('set-main-image/{team_id}/{id}','Admin\TeamsController@setMainImage')->name('team.setMainImage');
        });
        Route::group(['prefix' => 'vacancy'], function () {
            Route::get('index', 'Admin\VacancyController@show')->name('vacancy.show');
            Route::get('create', 'Admin\VacancyController@create')->name('vacancy.create');
            Route::post('add', 'Admin\VacancyController@add')->name('vacancy.add');
            Route::get('update/{id}', 'Admin\VacancyController@update')->name('vacancy.update');
            Route::post('edit/{id}', 'Admin\VacancyController@edit')->name('vacancy.edit');
            Route::get('delete/{id}', 'Admin\VacancyController@delete')->name('vacancy.delete');
        });
        Route::group(['prefix' => 'news'], function () {
            Route::get('index', 'Admin\NewsController@show')->name('news.show');
            Route::get('create', 'Admin\NewsController@create')->name('news.create');
            Route::post('add', 'Admin\NewsController@add')->name('news.add');
            Route::get('update/{id}', 'Admin\NewsController@update')->name('news.update');
            Route::post('edit/{id}', 'Admin\NewsController@edit')->name('news.edit');
            Route::get('delete/{id}', 'Admin\NewsController@delete')->name('news.delete');
            Route::get('deleteImage/{id}','Admin\NewsController@deleteImage')->name('news.deleteImage');
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('update', 'Admin\SettingController@update')->name('setting.update');
            Route::post('edit', 'Admin\SettingController@edit')->name('setting.edit');
        });
        Route::group(['prefix' => 'gallery'], function () {
            Route::get('update', 'Admin\GalleryController@update')->name('gallery.update');
            Route::post('edit', 'Admin\GalleryController@edit')->name('gallery.edit');
        });
        Route::group(['prefix' => 'driver'], function () {
            Route::get('index', 'Admin\CarDriverController@show')->name('driver.show');
            Route::get('create', 'Admin\CarDriverController@create')->name('driver.create');
            Route::post('add', 'Admin\CarDriverController@add')->name('driver.add');
            Route::get('update/{id}', 'Admin\CarDriverController@update')->name('driver.update');
            Route::post('edit/{id}', 'Admin\CarDriverController@edit')->name('driver.edit');
            Route::get('delete/{id}', 'Admin\CarDriverController@delete')->name('driver.delete');
            Route::get('delete-slider-image/{id}','Admin\CarDriverController@deleteSliderImage')->name('driver.delete-slider-image');

            Route::get('delete-data/{id}', 'Admin\CarDriverController@deleteData')->name('driver.delete-data');
            Route::get('create-update-data/{id}', 'Admin\CarDriverController@createUpdateData')->name('driver.create-update-data');
            Route::post('create-update-data-save/{id}', 'Admin\CarDriverController@createUpdateDataSave')->name('driver.create-update-data-save');
            //amenities
            Route::get('delete-amenities/{id}', 'Admin\CarDriverController@deleteAmenities')->name('driver.delete-amenities');
            Route::get('create-update-amenities/{id}', 'Admin\CarDriverController@createUpdateAmenities')->name('driver.create-update-amenities');
            Route::post('create-update-amenities-save/{id}', 'Admin\CarDriverController@createUpdateAmenitiesSave')->name('driver.create-update-amenities-save');

        });
        Route::group(['prefix' => 'service'], function () {
            Route::get('index', 'Admin\ServiceController@show')->name('service.show');
            Route::get('create', 'Admin\ServiceController@create')->name('service.create');
            Route::post('add', 'Admin\ServiceController@add')->name('service.add');
            Route::get('update/{id}', 'Admin\ServiceController@update')->name('service.update');
            Route::post('edit/{id}', 'Admin\ServiceController@edit')->name('service.edit');
            Route::get('delete/{id}', 'Admin\ServiceController@delete')->name('service.delete');
        });
        Route::group(['prefix' => 'region'], function () {
            Route::get('index', 'Admin\RegionController@show')->name('region.show');
            Route::get('create', 'Admin\RegionController@create')->name('region.create');
            Route::post('add', 'Admin\RegionController@add')->name('region.add');
            Route::get('update/{id}', 'Admin\RegionController@update')->name('region.update');
            Route::post('edit/{id}', 'Admin\RegionController@edit')->name('region.edit');
            Route::get('delete/{id}', 'Admin\RegionController@delete')->name('region.delete');
            Route::get('deleteImage/{id}','Admin\RegionController@deleteImage')->name('region.deleteImage');
            Route::get('set-main-image/{region_id}/{id}','Admin\RegionController@setMainImage')->name('region.setMainImage');
        });
        Route::group(['prefix' => 'residence'], function () {
            Route::get('hotels', 'Admin\ResidenceController@showHotels')->name('hotel.show');
            Route::get('hostels', 'Admin\ResidenceController@showHostels')->name('hostel.show');
            Route::get('apartment', 'Admin\ResidenceController@showApartments')->name('apartment.show');
            Route::get('create', 'Admin\ResidenceController@create')->name('residence.create');
            Route::post('add', 'Admin\ResidenceController@add')->name('residence.add');
            Route::get('update/{id}', 'Admin\ResidenceController@update')->name('residence.update');
            Route::post('edit/{id}', 'Admin\ResidenceController@edit')->name('residence.edit');
            Route::get('delete/{id}', 'Admin\ResidenceController@delete')->name('residence.delete');

            Route::get('delete-data/{id}', 'Admin\ResidenceController@deleteData')->name('residence.delete-data');
            Route::get('create-update-data/{id}', 'Admin\ResidenceController@createUpdateData')->name('residence.create-update-data');
            Route::post('create-update-data-save/{id}', 'Admin\ResidenceController@createUpdateDataSave')->name('residence.create-update-data-save');

            Route::get('delete-amenities/{id}', 'Admin\ResidenceController@deleteAmenities')->name('residence.delete-amenities');
            Route::get('create-update-amenities/{id}', 'Admin\ResidenceController@createUpdateAmenities')->name('residence.create-update-amenities');
            Route::post('create-update-amenities-save/{id}', 'Admin\ResidenceController@createUpdateAmenitiesSave')->name('residence.create-update-amenities-save');

            Route::get('deleteImage/{id}','Admin\ResidenceController@deleteImage')->name('residence.deleteImage');
            Route::post('position-update','Admin\ResidenceController@positionUpdate')->name('residence.positionUpdate');
        });

        Route::group(['prefix' => 'room-type'], function () {
            Route::get('index', 'Admin\RoomTypeController@show')->name('room-type.show');
            Route::get('create', 'Admin\RoomTypeController@create')->name('room-type.create');
            Route::post('add', 'Admin\RoomTypeController@add')->name('room-type.add');
            Route::get('update/{id}', 'Admin\RoomTypeController@update')->name('room-type.update');
            Route::post('edit/{id}', 'Admin\RoomTypeController@edit')->name('room-type.edit');
            Route::get('delete/{id}', 'Admin\RoomTypeController@delete')->name('room-type.delete');
        });

        Route::group(['prefix' => 'vehicle-type'], function () {
            Route::get('index', 'Admin\VehicleTypeController@show')->name('vehicle-type.show');
            Route::get('create', 'Admin\VehicleTypeController@create')->name('vehicle-type.create');
            Route::post('add', 'Admin\VehicleTypeController@add')->name('vehicle-type.add');
            Route::get('update/{id}', 'Admin\VehicleTypeController@update')->name('vehicle-type.update');
            Route::post('edit/{id}', 'Admin\VehicleTypeController@edit')->name('vehicle-type.edit');
            Route::get('delete/{id}', 'Admin\VehicleTypeController@delete')->name('vehicle-type.delete');
        });

        Route::group(['prefix' => 'pages'], function () {            
            Route::get('update/{slug}', 'Admin\Pages\PageController@update')->name('page.update');
            Route::post('edit/{slug}' , 'Admin\Pages\PageController@edit')->name('page.edit');
            Route::get('delete-img/{slug}/{img}' , 'Admin\Pages\PageController@imageDelete')->name('page.image-delete');    
            Route::get('index', 'Admin\Pages\PageController@show')->name('pages.show');
        });
    });
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/', 'IndexController@index')->name('view.index');

    // TODO delete route /regions/see-all
    Route::get('/regions/see-all', 'IndexController@regionsAll')->name('view.regions-all');
    Route::get('/contact', 'IndexController@contact')->name('view.contact');
    Route::post('/contact-send', 'IndexController@sendContact')->name('site.mails.contact');
    Route::get('aboutarm', 'IndexController@aboutarm')->name('arm.index');
    Route::get('news', 'IndexController@news')->name('news.index');
    Route::get('news/{slug}', 'IndexController@news_page')->name('view.news_page');
    Route::get('about', 'IndexController@about')->name('about.index');
    //restaurant
    Route::get('restaurants/{slug?}', 'IndexController@restaurantsAll')->name('site.restaurants-all');
    Route::get('restaurant/{slug}', 'IndexController@restaurantSingle')->name('restaurant_single.index');
    
    //hotels
    Route::get('hotels/{region?}', 'IndexController@hotelsAll')->name('site.hotels-all');
    Route::get('hotel-single/{slug}', 'IndexController@hotelSingle')->name('site.hotel-single');
    //hostels
    Route::get('hostels/{region?}', 'IndexController@hostelsAll')->name('site.hostels-all');
    Route::get('hostel-single/{slug}', 'IndexController@hostelSingle')->name('site.hostel-single');
    //apartment
    Route::get('apartments/{region?}', 'IndexController@apartmentsAll')->name('site.apartments-all');
    Route::get('apartment-single/{slug}', 'IndexController@apartmentSingle')->name('site.apartment-single');
    //tours
    Route::get('tours/{slug}', 'IndexController@tours')->name('tours');
    Route::get('tour/{slug}', 'IndexController@tourSingle')->name('tour-single');
    Route::get('car/{slug}', 'IndexController@carSingle')->name('car-single');
    Route::get('hotel/{slug}', 'IndexController@hotelSingle')->name('hotel-single');

    Route::get('vacancy','IndexController@vacancy')->name('vacancy.index');
    Route::get('service','IndexController@service')->name('service.index');
    
    Route::get('drivers','IndexController@drivers')->name('drivers.index');
    Route::get('drivers/{id}','IndexController@driverSingle')->name('driver.single');
    
    Route::get('nocontent','IndexController@nocontent')->name('nocontent.index');

    Route::get('holiday', 'IndexController@holiday')->name('holiday.index');

    Route::group(['middleware' => 'web'], function(){
        Route::get('/place/{region}', 'IndexController@region')->name('view.region');
        Route::get('place/{region}/{tour}', 'IndexController@tour')->name('view.tour');
        Route::get('reserve-tour/{tour_id}/{key}/{type}', 'IndexController@reserveTour')->name('reserve-tour');
        Route::get('reserve-car/{driver_id}/{key}/{type}', 'IndexController@reserveCar')->name('reserve-car');
        Route::get('reserve-residence/{residence_id}/{key}/{type}', 'IndexController@reserveResidence')->name('reserve-residence');
        Route::get('reserve-hotel/{residence_id}/{row}/{key}', 'IndexController@reserveHotel')->name('reserve-hotel');
    });

    Route::post('send', 'IndexController@sendTourMail')->name('send.tour.mail');
    Route::post('send-driver-mail', 'IndexController@sendDriverMail')->name('send.driver.mail');
    Route::post('send-residence-mail', 'IndexController@sendResidenceMail')->name('send.residence.mail');
    Route::post('send-hotel-mail', 'IndexController@sendHotelMail')->name('send.hotel.mail');

    Route::get('sightseeing-places/{slug?}', 'IndexController@sightSeeingPlacesAll')->name('sightseeing-places');
//    Auth::routes();
});