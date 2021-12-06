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



Route::get('/', 'TopController@index')->name('top');

Route::get('/jeweller_login', function () {
    return view('auth.jeweller_login');
});




Auth::routes();

Route::get('/new_jeweller', 'RegisterController@new_jeweller')->name('new_jeweller');
Route::post('/new_jeweller', 'RegisterController@jeweller_end')->name('jeweller_end');

Route::get('jeweller/complete', function () {
    return view('jeweller_login.complete');
});


Route::get('/operation_login/new_operation/{code}', 'RegisterController@new_operation')->name('new_operation');
Route::post('/operation_login/new_operation/{code}', 'RegisterController@new_operation_end')->name('new_operation_end');

Route::get('operation/complete', function () {
    return view('operation_login.complete');
});

Route::get('/operation_login', function () {
    return view('auth.operation_login');
});

Route::post('/new_sns', 'RegisterController@sns_end')->name('sns_end');

//twitter
Route::get('/login/twitter', 'SocialController@getTwitterAuth');
Route::get('/login/twitter/callback', 'SocialController@getTwitterAuthCallback');

//facebook
Route::get('/login/yahoo', 'SocialController@getYahooAuth');
Route::get('/login/yahoo/callback', 'SocialController@getYahooAuthCallback');

//google
Route::get('/login/google', 'SocialController@getGoogleAuth');
Route::get('/login/google/callback', 'SocialController@getGoogleAuthCallback');

//google
Route::get('/login/instagram', 'SocialController@getInstagramAuth');
Route::get('/login/instagram/callback', 'SocialController@getInstagramAuthCallback');



Route::get('home', 'MymenuController@index')->name('Mymenu');
Route::get('mymenu', 'MymenuController@index')->name('Mymenu2');

Route::get('mymenu/profile', 'MymenuController@profile')->name('mymenu_profile');
Route::get('mymenu/profile/edit/', 'MymenuController@profile_edit')->name('mymenu_profile_edit');
Route::post('mymenu/profile/edit/', 'MymenuController@profile_edit_end')->name('mymenu_profile_edit_end');
Route::get('mymenu/message', 'MymenuController@message')->name('mymenu_message');
Route::get('mymenu/message/detail/{id}', 'MymenuController@message_detail')->name('mymenu_message_detail');
Route::post('mymenu/message/detail/{id}', 'MymenuController@message_end')->name('mymenu_message_end');
Route::get('mymenu/message/dl/{id}', 'MymenuController@message_download')->name('mymenu_message_download');
Route::get('mymenu/favorite', 'MymenuController@favorite')->name('mymenu_favorite');
Route::get('mymenu/orderhistory', 'MymenuController@orderhistory')->name('mymenu_orderhistory');
Route::get('mymenu/orderhistory/detail/{id}', 'MymenuController@orderhistory_detail')->name('mymenu_orderhistory_detail');

Route::get('mymenu/payment', 'MymenuController@payment')->name('mymenu_payment');
Route::get('mymenu/pay/{id}', 'MymenuController@pay')->name('mymenu_pay');
Route::get('mymenu/receive/{id}', 'MymenuController@receive')->name('mymenu_receive');

Route::get('mymenu/assessment/{id}', 'MymenuController@assessment')->name('mymenu_assessment');
Route::post('mymenu/assessment/{id}', 'MymenuController@assessment_end')->name('mymenu_assessment_end');

Route::get('mymenu/message/acept/{id}', 'MymenuController@message_acept')->name('mymenu_message_acept');
Route::post('mymenu/message/proposal/{id}', 'MymenuController@message_proposal')->name('mymenu_proposal');


Route::get('mymenu/message/detail/menu/{id}', 'MymenuController@message_menu_detail')->name('mymenu_message_menu_detail');
Route::post('mymenu/message/detail/menu/{id}', 'MymenuController@message_menu_detail_end')->name('mymenu_menu_detail_end');

Route::get('mymenu/message/detail/material/{id}', 'MymenuController@message_material_detail')->name('mymenu_message_material_detail');
Route::post('mymenu/message/detail/material/{id}', 'MymenuController@message_material_detail_end')->name('mymenu_material_detail_end');
Route::get('mymenu/leave', 'MymenuController@leave')->name('mymenu_leave');

Route::get('tutorial/{type?}', 'TutorialController@index')->name('tutorial');

Route::get('qa', 'QaController@index')->name('qa');
Route::get('product', 'ProductController@index')->name('product');
Route::get('material', 'MaterialController@index')->name('material');
Route::get('menu', 'MenuController@index')->name('menu');

Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/confirm', 'ContactController@confirm')->name('contact_confirm');
Route::post('contact/end', 'ContactController@contact_end')->name('contact_end');
Route::get('contact/complete', 'ContactController@complete')->name('contact_complete');

Route::get('order', 'OrderController@index')->name('order');
Route::post('order', 'OrderController@end')->name('order_end');
Route::get('order/complete', 'OrderController@complete')->name('order_complete');
Route::get('order_list', 'OrderController@list')->name('order_list');
Route::get('order_list/detail/{order}', 'OrderController@detail')->name('order_detail');

Route::get('operationmenu', 'OperationController@index')->name('operationmenu');
Route::get('operationmenu/qa', 'OperationController@qa')->name('operationmenu_qa');
Route::get('operationmenu/qa/new_post', 'OperationController@qa_new')->name('operationmenu_qa_new_post');
Route::post('operationmenu/qa/new_post', 'OperationController@qa_new_end')->name('operationmenu_qa_new_end');
Route::get('operationmenu/qa/edit/{id}', 'OperationController@qa_edit')->name('operationmenu_qa_edit');
Route::post('operationmenu/qa/edit/{id}', 'OperationController@qa_edit_end')->name('operationmenu_qa_edit_end');
Route::post('operationmenu/qa/status', 'OperationController@qa_status')->name('operationmenu_qa_status');

Route::get('operationmenu/news', 'OperationController@news')->name('operationmenu_news');
Route::get('operationmenu/news/new_post', 'OperationController@news_new')->name('operationmenu_news_new_post');
Route::post('operationmenu/news/new_post', 'OperationController@news_new_end')->name('operationmenu_news_new_end');
Route::get('operationmenu/news/detail/{id}', 'OperationController@news_detail')->name('operationmenu_news_detail');
Route::get('operationmenu/news/edit/{id}', 'OperationController@news_edit')->name('operationmenu_news_edit');
Route::post('operationmenu/news/edit/{id}', 'OperationController@news_edit_end')->name('operationmenu_news_edit_end');
Route::post('operationmenu/news/status', 'OperationController@news_status')->name('operationmenu_news_status');


Route::get('operationmenu/user', 'OperationController@user')->name('operationmenu_user');
Route::get('operationmenu/user/detail/{id}', 'OperationController@user_detail')->name('operationmenu_user_detail');
Route::post('operationmenu/user/status', 'OperationController@user_status')->name('operationmenu_user_status');

Route::get('operationmenu/campaign', 'OperationController@campaign')->name('operationmenu_campaign');
Route::post('operationmenu/campaign', 'OperationController@campaign_end')->name('operationmenu_campaign_end');

Route::get('operationmenu/invitation', 'OperationController@invitation')->name('operationmenu_invitation');
Route::post('operationmenu/invitation', 'OperationController@invitation_end')->name('operationmenu_invitation_end');

Route::get('operationmenu/profile', 'OperationController@profile')->name('operationmenu_profile');
Route::get('operationmenu/profile/edit/', 'OperationController@profile_edit')->name('operationmenu_profile_edit');
Route::post('operationmenu/profile/edit/', 'OperationController@profile_edit_end')->name('operationmenu_profile_edit_end');


Route::get('operationmenu/approval', 'OperationController@approval')->name('operationmenu_approval');
Route::get('operationmenu/progress', 'OperationController@progress')->name('operationmenu_progress');
Route::get('operationmenu/progress/detail/{id}', 'OperationController@progress_detail')->name('operationmenu_progress_detail');


Route::get('operationmenu/favorite', 'OperationController@favorite')->name('operationmenu_favorite');
Route::get('operationmenu/leave', 'OperationController@leave')->name('operationmenu_leave');

Route::get('operationmenu/message', 'OperationController@message')->name('operationmenu_message');
Route::get('operationmenu/message/detail/{id}', 'OperationController@message_detail')->name('operationmenu_message_detail');
Route::get('operationmenu/message/read_only/{id}', 'OperationController@message_read_only')->name('operationmenu_message_read_only');

Route::get('jewellermenu', 'JewellermenuController@index')->name('jewellermenu');
Route::get('jewellermenu/profile', 'JewellermenuController@profile')->name('jewellermenu_profile');
Route::get('jewellermenu/profile/edit/', 'JewellermenuController@profile_edit')->name('jewellermenu_profile_edit');
Route::post('jewellermenu/profile/edit/', 'JewellermenuController@profile_edit_end')->name('jewellermenu_profile_edit_end');


Route::get('jewellermenu/product', 'JewellermenuController@product')->name('jewellermenu_product');
Route::get('jewellermenu/product/new_post', 'JewellermenuController@product_new')->name('jewellermenu_product_new_post');
Route::post('jewellermenu/product/new_post', 'JewellermenuController@product_new_end')->name('jewellermenu_product_new_end');
Route::get('jewellermenu/product/detail/{id}', 'JewellermenuController@product_detail')->name('jewellermenu_product_detail');
Route::get('jewellermenu/product/edit/{id}', 'JewellermenuController@product_edit')->name('jewellermenu_product_edit');
Route::post('jewellermenu/product/edit/{id}', 'JewellermenuController@product_edit_end')->name('jewellermenu_product_edit_end');
Route::post('jewellermenu/product/status', 'JewellermenuController@product_status')->name('jewellermenu_product_status');


Route::get('jewellermenu/menu', 'JewellermenuController@menu')->name('jewellermenu_menu');
Route::get('jewellermenu/menu/new_post', 'JewellermenuController@menu_new')->name('jewellermenu_menu_new_post');
Route::post('jewellermenu/menu/new_post', 'JewellermenuController@menu_new_end')->name('jewellermenu_menu_new_end');
Route::get('jewellermenu/menu/detail/{id}', 'JewellermenuController@menu_detail')->name('jewellermenu_menu_detail');
Route::get('jewellermenu/menu/edit/{id}', 'JewellermenuController@menu_edit')->name('jewellermenu_menu_edit');
Route::post('jewellermenu/menu/edit/{id}', 'JewellermenuController@menu_edit_end')->name('jewellermenu_menu_edit_end');
Route::post('jewellermenu/menu/status', 'JewellermenuController@menu_status')->name('jewellermenu_menu_status');


Route::get('jewellermenu/material', 'JewellermenuController@material')->name('jewellermenu_material');
Route::get('jewellermenu/material/new_post', 'JewellermenuController@material_new')->name('jewellermenu_material_new_post');
Route::post('jewellermenu/material/new_post', 'JewellermenuController@material_new_end')->name('jewellermenu_material_new_end');
Route::get('jewellermenu/material/detail/{id}', 'JewellermenuController@material_detail')->name('jewellermenu_material_detail');
Route::get('jewellermenu/material/edit/{id}', 'JewellermenuController@material_edit')->name('jewellermenu_material_edit');
Route::post('jewellermenu/material/edit/{id}', 'JewellermenuController@material_edit_end')->name('jewellermenu_material_edit_end');
Route::post('jewellermenu/material/status', 'JewellermenuController@material_status')->name('jewellermenu_material_status');

Route::get('jewellermenu/message', 'JewellermenuController@message')->name('jewellermenu_message');

Route::get('jewellermenu/message/acept/{id}', 'JewellermenuController@message_acept')->name('jewellermenu_message_acept');
Route::post('jewellermenu/message/proposal/{id}', 'JewellermenuController@message_proposal')->name('jewellermenu_proposal');


Route::get('jewellermenu/message/detail/order/{id}', 'JewellermenuController@message_order_detail')->name('jewellermenu_message_order_detail');
Route::post('jewellermenu/message/detail/order/{id}', 'JewellermenuController@message_order_detail_end')->name('jewellermenu_order_detail_end');


Route::get('jewellermenu/message/detail/{id}', 'JewellermenuController@message_detail')->name('jewellermenu_message_detail');
Route::post('jewellermenu/message/detail/{id}', 'JewellermenuController@message_end')->name('jewellermenu_message_end');



Route::get('jewellermenu/message/dl/{id}', 'JewellermenuController@message_download')->name('jewellermenu_message_download');

Route::get('jewellermenu/favorite', 'JewellermenuController@favorite')->name('jewellermenus_favorite');
Route::get('jewellermenu/orderhistory', 'JewellermenuController@orderhistory')->name('jewellermenus_orderhistory');
Route::get('jewellermenu/orderhistory/detail/{id}', 'JewellermenuController@orderhistory_detail')->name('jewellermenus_orderhistory_detail');

Route::get('jewellermenu/orderreceived', 'JewellermenuController@orderreceived')->name('jewellermenus_orderreceived');
Route::get('jewellermenu/orderreceived/detail/{id}', 'JewellermenuController@orderreceived_detai')->name('jewellermenus_detai_orderreceived');


Route::get('jewellermenu/send/{id}', 'JewellermenuController@send')->name('jewellermenus_send');
Route::get('jewellermenu/assessment/{id}', 'JewellermenuController@assessment')->name('jewellermenus_assessment');
Route::post('jewellermenu/assessment/{id}', 'JewellermenuController@assessment_end')->name('jewellermenus_assessment_end');

Route::get('jewellermenu/leave', 'JewellermenuController@leave')->name('jeweller_leave');


Route::get('jeweller', 'JewellerController@list')->name('jeweller');
Route::get('jeweller/detail/{id}', 'JewellerController@detail')->name('jeweller_detail');
Route::get('jeweller/profile/{id}', 'JewellerController@detail')->name('jeweller_profile');
Route::get('jeweller/{id}/product', 'JewellerController@product')->name('jeweller_product');
Route::get('jeweller/{id}/menu', 'JewellerController@menu')->name('jeweller_menu');
Route::get('jeweller/{id}/material', 'JewellerController@material')->name('jeweller_material');

Route::get('jeweller/product/detail/{id}', 'JewellerController@product_detail')->name('jeweller_product_detail');
Route::get('jeweller/menu/detail/{id}', 'JewellerController@menu_detail')->name('jeweller_menu_detail');
Route::get('jeweller/material/detail/{id}', 'JewellerController@material_detail')->name('jeweller_material_detail');




Route::get('user/detail/{id}', 'UserController@detail')->name('user_detail');

Route::get('addBookmark', 'CommonController@addBookmark')->name('addBookmark');

Route::get('chgSort', 'CommonController@chgSort')->name('chgSort');

Route::get('r', 'CommonController@receive')->name('receive');
Route::get('leave_complete', 'CommonController@leave_complete')->name('leave_complete');


//必ず最後にかくこと
Route::get('{slug}', 'PageController@page');
