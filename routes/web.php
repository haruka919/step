<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ログイン認証なし
//TOPページ
Route::get('/', 'StepsController@index')->name('steps.index');

//TOPページ（Ajax　データ取得）
Route::get('/ajax/index', 'Ajax\StepController@index');

//STEP一覧ページ
Route::get('/steps', 'StepsController@arichive')->name('steps');
Route::get('/ajax/steps', 'Ajax\StepController@arichive')->name('ajaxsteps');

//STEP一覧ページ（カテゴリー別）
Route::get('/category/{category_id}', 'StepsController@category');
Route::get('/ajax/category', 'Ajax\StepController@category');

//STEP流れページ
Route::get('/steps/{step_id}', 'StepsController@flow')->name('steps.flow');

//STEP流れページ（Ajax　データ取得）
Route::get('/ajax/stepFlow', 'Ajax\StepController@flow');



// ログイン認証あり
Route::group(['middleware' => 'auth'], function() {

  //STEP編集登録ページ
  Route::get('/steps/{step_id}/edit', 'StepsController@edit');
  //STEP編集登録ページ（Ajax　データ取得）
  Route::get('/ajax/stepEditflow', 'Ajax\StepController@edit');

  //マイページ
  Route::get('/mypage', 'UsersController@mypage')->name('mypage');

  // ユーザー編集画面
  Route::get('/users/edit', 'UsersController@edit');

  // ユーザー更新画面
  Route::post('/users/update', 'UsersController@update');

  //STEP詳細ページ
  Route::get('/steps/{step_id}/{flow_id}', 'StepsController@detail')->name('steps.detail');

  //STEP詳細ページ（Ajax　データ取得）
  Route::get('/ajax/kostepDetail', 'Ajax\StepController@detail');

  //子STEP完了
  Route::post('/ajax/completed', 'Ajax\StepController@completed');

  //STEP新規登録ページ
  Route::get('/steps/new', 'StepsController@new')->name('steps.new');
  Route::post('/steps', 'StepsController@store');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


