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
Route::group(['middleware' => ['install']], function () {


Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {

     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

     	 Route::get('/profile', 'UiController@index')->name('profile');
		 Route::post('/profile', 'UiController@postprofile')->name('postprofile');
		 Route::post('/password', 'UiController@password_change')->name('password');

     	 Route::any('setting','SettingController@index')->name('setting');

     	 Route::get('language','LanguageController@index')->name('language');
		 Route::match(['get', 'post'], 'create', 'LanguageController@create')->name('language.create');

		 Route::get('language/edit/{id?}', 'LanguageController@edit')->name('language.edit');
		 Route::patch('language/update/{id}', 'LanguageController@update')->name('language.update');
		 Route::delete('/language/delete/{id}', 'LanguageController@delete')->name('language.delete');

     Route::group(['as' => 'user.', 'prefix' => 'user'], function () {

     		Route::get('/role', 'RoleController@index')->name('role');
			Route::get('/role/datatable', 'RoleController@datatable')->name('role.datatable');
			Route::any('/role/create', 'RoleController@create')->name('role.create');
			Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
			Route::post('/role/edit', 'RoleController@update')->name('role.update');
			Route::delete('/role/delete/{id}', 'RoleController@distroy')->name('role.delete');

			//user:::::::::::::::::::::::::::::::::
			Route::get('/', 'UserController@index')->name('index');
			Route::get('/datatable', 'UserController@datatable')->name('datatable');
			Route::any('/create', 'UserController@create')->name('create');
			Route::put('/change/{value}/{id}', 'UserController@status')->name('change');
			Route::get('/edit/{id}', 'UserController@edit')->name('edit');
			Route::put('/edit', 'UserController@update')->name('update');
			Route::delete('/delete/{id}', 'UserController@destroy')->name('delete');

     });
     //package option:::::::::::::::::::::::::
      Route::group(['as' => 'option.', 'prefix' => 'option'], function () {


          Route::get('/datatable', 'PackageOptionController@datatable')->name('datatable'); 
          Route::get('/','PackageOptionController@index')->name('index');
          Route::get('/create','PackageOptionController@create')->name('create');
          Route::post('/create','PackageOptionController@store')->name('store');
          Route::get('/edit/{id}','PackageOptionController@edit')->name('edit');
          Route::put('/update/{id}','PackageOptionController@update')->name('update');
          Route::put('/change/{value}/{id}', 'PackageOptionController@status')->name('change');
          Route::delete('/delete/{id}', 'PackageOptionController@destroy')->name('delete');

      });

     //packege:::::::::::::::::::::::::::::::::
     Route::group(['as' => 'package.', 'prefix' => 'package'], function () {
      	
      	  Route::get('/datatable', 'PackageController@datatable')->name('datatable');	
          Route::get('/','PackageController@index')->name('index');
          Route::get('/create','PackageController@create')->name('create');
          Route::post('/create','PackageController@store')->name('store');
          Route::get('/edit/{id}','PackageController@edit')->name('edit');
          Route::put('/update/{id}','PackageController@update')->name('update');
		      Route::put('/change/{value}/{id}', 'PackageController@status')->name('change');
		      Route::delete('/delete/{id}', 'PackageController@destroy')->name('delete');

     });

         //packege:::::::::::::::::::::::::::::::::
     Route::group(['as' => 'slider.', 'prefix' => 'slider'], function () {
      	
      	  Route::get('/datatable', 'SliderController@datatable')->name('datatable');	
          Route::get('/','SliderController@index')->name('index');
          Route::get('/create','SliderController@create')->name('create');
          Route::post('/create','SliderController@store')->name('store');
          Route::get('/edit/{id}','SliderController@edit')->name('edit');
          Route::put('/update/{id}','SliderController@update')->name('update');
		  Route::put('/change/{value}/{id}', 'SliderController@status')->name('change');
		  Route::delete('/delete/{id}', 'SliderController@destroy')->name('delete');

     });


      //service:::::::::::::::::::::::::::::::::
     Route::group(['as' => 'service.', 'prefix' => 'service'], function () {
      	
      	  Route::get('/datatable', 'ServiceController@datatable')->name('datatable');	
          Route::get('/','ServiceController@index')->name('index');
          Route::get('/create','ServiceController@create')->name('create');
          Route::post('/create','ServiceController@store')->name('store');
          Route::get('/edit/{id}','ServiceController@edit')->name('edit');
          Route::put('/update/{id}','ServiceController@update')->name('update');
		  Route::put('/change/{value}/{id}', 'ServiceController@status')->name('change');
		  Route::delete('/delete/{id}', 'ServiceController@destroy')->name('delete');

     });

     //service::::::::::::::::::Slider:::::::::::::::
     Route::group(['as' => 'service-slider.', 'prefix' => 'service-slider'], function () {
      	
      	  Route::get('/datatable', 'ServiceSliderController@datatable')->name('datatable');	
          Route::get('/','ServiceSliderController@index')->name('index');
          Route::get('/create','ServiceSliderController@create')->name('create');
          Route::post('/create','ServiceSliderController@store')->name('store');
          Route::get('/edit/{id}','ServiceSliderController@edit')->name('edit');
          Route::put('/update/{id}','ServiceSliderController@update')->name('update');
		      Route::put('/change/{value}/{id}', 'ServiceSliderController@status')->name('change');
		      Route::delete('/delete/{id}', 'ServiceSliderController@destroy')->name('delete');

     });

     //pages::::::::::::::::::::::::::::::::::::::::::::
      Route::group(['as' => 'pages.', 'prefix' => 'pages'], function () {
         
         Route::get('/', 'PageController@index')->name('index');
         Route::post('/update', 'PageController@store')->name('store');
 
    });

        //News::::::::::::::::::::::::::::::::::::::::::::
     Route::group(['as' => 'news.', 'prefix' => 'news'], function () {


         Route::get('/datatable', 'NewsController@datatable')->name('datatable'); 
         Route::get('/', 'NewsController@index')->name('index');
         Route::get('/create', 'NewsController@create')->name('create');
         Route::post('/create', 'NewsController@store')->name('store');
         Route::get('/edit/{id}','NewsController@edit')->name('edit');
         Route::put('/update/{id}','NewsController@update')->name('update');
         Route::put('/change/{value}/{id}', 'NewsController@status')->name('change');
         Route::delete('/delete/{id}', 'NewsController@destroy')->name('delete');
          Route::get('/comment', 'NewsController@comment')->name('comment');
          Route::post('/comment', 'NewsController@post_comment')->name('post-comment');
         //category:::::::::::::::::::::
      Route::group(['as' => 'category.', 'prefix' => 'category'], function () {

          Route::get('/datatable', 'CategoryController@datatable')->name('datatable'); 
         Route::get('/', 'CategoryController@index')->name('index');
         Route::get('/create', 'CategoryController@create')->name('create');
         Route::post('/create', 'CategoryController@store')->name('store');
         Route::get('/edit/{id}','CategoryController@edit')->name('edit');
         Route::put('/update/{id}','CategoryController@update')->name('update');
         Route::delete('/delete/{id}', 'CategoryController@destroy')->name('delete');

        }); 
 
    });
    //Booking::::::::::::::::::::::::::
     Route::group(['as' => 'book.', 'prefix' => 'book'], function () {

         Route::get('/', 'BookingController@index')->name('index');
         Route::get('/client/{id}', 'BookingController@client')->name('client');
         Route::get('/packege/{id}', 'BookingController@packege')->name('packege');
         Route::delete('/delete/{id}', 'BookingController@destroy')->name('delete');


        }); 
     //System::::::::::::::::::::::::::
     Route::get('/faq','SystemController@index')->name('faq');
     Route::get('/ans/{id}','SystemController@answer')->name('faq.ans');
     Route::post('/ans','SystemController@post_answer')->name('faq.post_answer');
     //Messege::::::::::::::::::::::::::
     Route::get('/messege','SystemController@messege')->name('messege');
     Route::get('/messege/review/{id}','SystemController@review')->name('messege.review');
     Route::post('/messege/review','SystemController@reaply')->name('messege.reaply');
     //Subscriber:::::::::::::::::::::::::::
     Route::get('/subscibers','SystemController@subscibers')->name('subscibers');
     Route::get('/subscibers/mail','SystemController@subscibers_mail')->name('subscibers.mail');
     Route::post('/subscibers/mail','SystemController@subscibers_mailsend')->name('subscibers.send_mail');
     //Air Ticket:::::::::::::::::::::::::::::::
     Route::get('/air-ticket','SystemController@air_ticket')->name('air_ticket');
     Route::get('/air-ticket/mail','SystemController@airticket_mail')->name('air_ticket.mail');
     Route::post('/air-ticket/mail','SystemController@airticket_mailsend')->name('air_ticket.send_mail');

});

Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/details/{slug}/{id}','HomeController@details')->name('details');
Route::post('book','HomeController@book')->name('book');
Route::get('about','HomeController@about')->name('about');
Route::get('umrah','HomeController@umrah')->name('umrah');
Route::get('hajj','HomeController@hajj')->name('hajj');
Route::get('news','HomeController@news')->name('news');
Route::get('/news-details/{slug}/{id}','HomeController@news_details')->name('news-details');
Route::get('contact','HomeController@contact')->name('contact');
Route::post('contact','HomeController@post_contact')->name('post_contact');
Route::post('question','HomeController@question')->name('question');
Route::post('subscibers','HomeController@subscibers')->name('subscibers');
Route::get('air-ticket','HomeController@air_ticket')->name('air_ticket');
Route::post('air-ticket','HomeController@book_ticket')->name('book_ticket');

});




Route::get('/installs', 'Install\InstallController@index');
Route::get('install/database', 'Install\InstallController@database');
Route::post('install/process_install', 'Install\InstallController@process_install');
Route::get('install/create_user', 'Install\InstallController@create_user');
Route::post('install/store_user', 'Install\InstallController@store_user');
Route::get('install/system_settings', 'Install\InstallController@system_settings');
Route::post('install/finish', 'Install\InstallController@final_touch');	
