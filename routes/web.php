<?php
use Illuminate\Support\Facades\Input as input;
use App\User;
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



Route::get('/', function () {
    return '<h1>Hello World</h1>';
});
/*
Route::get('/users/{id}/{name}',function($id, $name){
	return 'Тухайн хэрэглэгч бол  '.$name.' with an id if '. $id;
});
*/

Route::get('/','PagesController@index');
/*
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/example','PagesController@example');
Route::get('/dashboard', 'DashboardController@index');
*/

/*

Route::get('/changepassword',function(){
	return view('auth.change_password');
});
Route::post('change/password',function(){
	$User = User::find(Auth::user()->id);
	if (Hash::check(Input::get('passwordold'), $User['password']) && Input::get('password') == Input::get('password_confirmation')){
		$User->password = bcrypt(Input::get('password'));
		$User->save();
		return back()->with('success', 'Password Changed');
	}
	else{
		return back()->with('error','Password Not Changed!!');
	}
});*/

/*
Route::resource('/posts','PostsController');
Route::resource('/course','CourseController');*/
Route::resource('/users','UserRegController');/*
Route::resource('/students','StudentController');
Route::resource('/person','PersonController');
Route::resource('/teachers','TeacherController');
*/
//Comments

/*
Auth::routes();
*/
Route::get('/home', 'HomeController@index');

Auth::routes();
/*
Route::get('/home', 'HomeController@index')->name('home');
*/