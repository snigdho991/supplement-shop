<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Ums\AdminToolsController;
use App\Http\Controllers\Cms\ThemeController;
use App\Http\Controllers\Cms\EventController;
use App\Http\Controllers\Cms\FrontendController;
use App\Http\Controllers\Cms\DealController;
use App\Http\Controllers\Cms\QueryController;
use App\Http\Controllers\Cms\OrderController;


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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/single-event-api/{id}', [FrontendController::class, 'get_single_event'])->name('get.single.event');
Route::get('/single-deal-api/{id}', [FrontendController::class, 'get_single_deal'])->name('get.single.deal');

Route::get('/pages/faq', [FrontendController::class, 'frontend_faq'])->name('frontend.faq');
Route::get('/pages/privacy-policy', [FrontendController::class, 'frontend_privacy_policy'])->name('frontend.privacy.policy');

Route::get('/all-events', [FrontendController::class, 'all_events'])->name('all.events');
Route::get('/all-deals', [FrontendController::class, 'all_deals'])->name('all.deals');

Route::post('/save-frontend-theme', [FrontendController::class, 'select_frontend_theme'])->name('select.frontend.theme');
Route::post('/submit-query', [FrontendController::class, 'submit_query'])->name('submit.query');



// Route::get('/generate-role', [RoleController::class, 'generate_role'])->name('generate.role');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::post('/save-theme', [ThemeController::class, 'select_theme'])->name('select.theme');
		
	Route::group(['prefix' => 'administrator'], function(){
		Route::get('/dashboard', [AdminToolsController::class, 'dashboard'])->name('dashboard');
		Route::resource('events', EventController::class);
		Route::resource('deals', DealController::class);

		Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
		Route::get('/query/{id}', [QueryController::class, 'manage_query'])->name('query.manage');

		Route::get('/spam-queries', [QueryController::class, 'spam'])->name('queries.spam');

		Route::post('/mark/query/spam', [QueryController::class, 'mark_spam'])->name('mark.spam');
		Route::post('/remove/query/spam', [QueryController::class, 'remove_spam'])->name('remove.spam');
		Route::delete('/delete/query/{id}', [QueryController::class, 'query_destroy'])->name('query.destroy');
		Route::post('/query/conver-to-order', [QueryController::class, 'conver_to_order'])->name('conver.to.order');

		Route::get('/order/{id}/{orderid}', [OrderController::class, 'manage_order'])->name('order.manage');
		Route::post('/order/status/change', [OrderController::class, 'change_order_status'])->name('change.order.status');
		Route::get('/pending-orders', [OrderController::class, 'pending_orders'])->name('pending.orders');
		Route::get('/successful-orders', [OrderController::class, 'accepted_orders'])->name('successful.orders');
		Route::get('/successful-orders', [OrderController::class, 'accepted_orders'])->name('successful.orders');
		Route::get('/declined-orders', [OrderController::class, 'declined_orders'])->name('declined.orders');
		Route::delete('/delete/order/{id}', [OrderController::class, 'order_destroy'])->name('order.destroy');

		Route::post('/user/save/basic-info', [AdminToolsController::class, 'save_basic_info'])->name('save.basic.info');
	    Route::post('/user/save/change-password', [AdminToolsController::class, 'change_auth_password'])->name('change.auth.password');
	});

});
