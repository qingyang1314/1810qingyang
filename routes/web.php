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

//闭包路由 返回视图

// Route::get('/', function () {
// 	dump(request()->user());
// 	// echo 123;
//     return view('welcome');
// });

// Route::view('/','test',['name'=>'lisidasddadf']);

//闭包路由返回值

 Route::get('/index','IndexController@index');


Route::get('/form',function(){
	return'<form action="/do" method="post">'.csrf_field().'<input type="text" name="name"><button>提交</button></form>';
});
// Route::post('/do','IndexController@adddo');
//支持多种路由
// Route::match(['get','post'],'/do','IndexController@adddo');

//闭包函数传参 必填

// Route::get('/goods/{id}',function($id){
//  		echo "ID is:".$id;

//  });

//可选传参
// Route::get('/goods/{id}','IndexController@goods');
// Route::get('/goods/{id?}','IndexController@goods')->where('id','\d+');

Route::prefix('goods')->group(function(){

		Route::get('add','IndexController@add');
		Route::get('del','IndexController@del');
		Route::get('edit','IndexController@edit');
		Route::get('list','IndexController@lists');
});

// Route::get('/goods/add','IndexController@add');
// Route::get('/goods/del','IndexController@del');
// Route::get('/goods/edit','IndexController@edit');
// Route::get('/goods/list','IndexController@lists');

// Route::get('/aa',function(){
// 	return redirect('/form');

// });

// 	Route::prefix('user')->group(function(){
// // Route::prefix('user')->middleware('islogin')->group(function(){
// 	Route::get('add',function(){
// 	return view('users/add');
// 	});

// 	Route::post('adddo','UserController@store');
// 	Route::get('del','UserController@del');
// 	Route::get('list','UserController@index');
// 	Route::get('edit/{id}','UserController@edit')->name('edituser');
// 	Route::post('update/{id}','UserController@update');
// 	Route::post('checkname','UserController@checkName');
// 	Route::post('send','UserController@send');
// 	Route::post('log','UserController@login');
// });

// Route::get('/test',function(){
// 	// return 'sadfadfd';
// 	// return [1,2,3];
// 	 return response('Hello Cookie')->cookie('test', '123', 1);
// });

// // Route::get('/login',function(){
// // 	return view('users.login');

// // });
// Route::get('/log',function(){
// 	return view('users/login');

// });



// //测试
// Route::prefix('test')->group(function(){

// // Route::prefix('test')->middleware('islogin')->group(function(){
// 	Route::get('add',function(){
// 	return view('test/add');
// 	});


// 	Route::post('adddo','TestController@store');
// 	Route::post('update/{id}','TestController@update');
// 	Route::get('list','TestController@index');
// 	Route::get('del','TestController@del');
// 	Route::get('edit/{id}','TestController@edit')->name('edittest');
// 	Route::post('checkname','TestController@checkName');



// });

//   Route::get('/login',function(){
// 	return view('test.login');

// });

//注册登录
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 珠宝首饰小项目
Route::get('/','IndexController@index');
Route::get('/sendSms','IndexController@sendSms');
Route::get('/logindo','IndexController@logindo');
Route::post('/addreg','IndexController@addreg');
Route::get('/checkname','IndexController@checkname');
Route::get('/logout','IndexController@logout');
Route::get('/regname','IndexController@regname');
Route::get('/idcg','IndexController@idcg');
Route::get('/prolist','IndexController@prolist');
Route::get('/car','IndexController@car');
Route::get('/user','IndexController@user');
Route::get('/pay','IndexController@pay');
Route::get('/success','IndexController@success');
Route::get('/proinfo{goods_id}','IndexController@proinfo');
Route::get('/cart{goods_id}','IndexController@cart');
Route::get('/pay{goods_id}','IndexController@pay');
Route::get('/success{goods_id}','IndexController@success');
Route::get('/zhifu{shop_price}','IndexController@zhifu');
// Route::get('/zhifu{shop_price}',function(){
//     $ordersn = date('YmdHis').rand(1000,9999);
//     return "<b><a href=/zhifu/".$ordersn."></a></b>";
// });


Route::post('/countTotal{goods_id}','IndexController@countTotal');

Route::post('/getSubTotal','IndexController@getSubTotal');
Route::prefix('login')->group(function(){
Route::get('/login',function(){
	return view('login.login');
});
Route::get('/reg','LoginController@reg');
});

Route::get('/pay',function(){
	return view('index.pay');
});

Route::get('/success',function(){
	return view('index.success');
});

Route::prefix('ze')->group(function(){
Route::get('ze/zelogin',function(){
	return view('ze.login');
});
Route::get('/zereg','ZeController@reg');
Route::post('/addreg','ZeController@addreg');
Route::get('/checkname','ZeController@checkname');
Route::get('/sendSm','ZeController@sendSm');
Route::get('/logindo','ZeController@logindo');
Route::get('ze/index','ZeController@index');
});
