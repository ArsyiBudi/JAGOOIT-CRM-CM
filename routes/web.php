<?php

use App\Http\Controllers\C_Activity;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Leads;
use App\Http\Controllers\C_Mail;
use App\Http\Controllers\C_Offer;
use App\Http\Controllers\C_Orders;
use App\Http\Controllers\C_Plan;
use App\Http\Controllers\PenawaranWordController;
use App\Http\Controllers\TalentController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

//? TESTING
Route::get('/send-email/{email}', [C_Mail::class, 'index']);
Route::get('/generate-offer/{offer_letter_id}', [C_Plan::class, 'generateWordOffer']);
Route::get('/email', function() {
    return view('emails.testmail');
});

//set active
function set_active($routes)
{
    $currentPath = $_SERVER['REQUEST_URI'];

    if (is_array($routes)) {
        foreach ($routes as $route) {
            if (strpos($currentPath, $route) === 0) {
                return 'bg-secondary';
            }
        }
    } else {
        if ($currentPath == $routes) {
            return 'bg-secondary';
        }
    }
    return '';
}

function set_child_active($routes)
{
    $currentPath = $_SERVER['REQUEST_URI'];

    if (is_array($routes)) {
        foreach ($routes as $route) {
            if (strpos($currentPath, $route) === 0) {
                return 'text-secondary fill-secondary';
            }
        }
    } else {
        if ($currentPath == $routes) {
            return 'text-secondary fill-secondary';
        }
    }
    return 'text-white fill-white';
}

//? Client
Route::any('/', function () {
    return view('clients.landing');
});

Route::fallback(function () { //!To Handle an unknown routes
    return back();
});

Route::view('/track', 'clients.track');
Route::post('/track', [C_Orders::class, 'track']);
Route::post('/logout', [C_Auth::class, 'logout']);
//? Client End

//? Admin 
Route::prefix('login')->group(function () {
    Route::view('/', 'admin.login')->name('login');
    Route::post('/', [C_Auth::class, 'login']);
});
Route::get('/logout', [C_Auth::class, 'logout'])->name('logout');

//!PROTECTED ROUTES
Route::middleware('auth')->group(function () {
    Route::prefix('leads')->group(function () {
        Route::get('/', [C_Leads::class, 'fetch'])->name('fetch_leads');
        Route::delete('/leads/{id}', [C_Leads::class, 'delete'])->name('admin.leads.delete');
        Route::get('/{id}/detail', [C_Leads::class, 'detail'])->name('detail_leads');
        Route::prefix('create')->group(function () {
            Route::get('/', function () {
                return view('admin.leads.create', [
                    "title" => "Leads | Create"
                ]);
            });
            Route::post('/', [C_Leads::class, 'create'])->name('create_leads');
        });

        //?LEADS ACTIVITY
        Route::prefix('/activity')->group(function () {
            Route::get('/{leads_id}', [C_Activity::class, 'fetch_activity']);
            Route::post('/{leads_id}/appointment', [C_Activity::class, 'appointment'])->name('activity.appointment');
            Route::post('/{leads_id}/note', [C_Activity::class, 'note'])->name('activity.note');
            Route::post('/{leads_id}/report', [C_Activity::class, 'report'])->name('activity.report');
        });

        //?LEADS OFFER
        Route::get('/offer/{leads_id}', [C_Leads::class, 'openOffer']);
        Route::post('/offer/{leads_id}', [C_Leads::class, 'sendOffer']);
    });

    Route::prefix('client')->group(function () {
        Route::get('/', [C_Leads::class, 'fetch_client'])->name('fetch_client');
        Route::delete('/{client_id}', [C_Leads::class, 'delete_client'])->name('delete_client');
        Route::get('/detail/{client_id}', [C_Leads::class, 'detail']);
        Route::prefix('order')->group(function () {
            Route::get('/', [C_Orders::class, 'fetch'])->name('fetch_order');
            Route::delete('/{order_id}', [C_Orders::class, 'delete_order'])->name('delete_order');
            Route::patch('/{order_id}', [C_Orders::class, 'finish_order'])->name('finish_order');

            //?DETAIL ORDER
            Route::prefix('detail') -> group(function(){
                Route::get('/{order_id}', [C_Orders::class, 'detail'])->name('detail_order');
                Route::get('/{order_id}/timeline', [C_Orders::class, 'timeline']);
            });

            //?CREATE ORDER
            Route::prefix('create')->group(function () {
                Route::get('/', [C_Orders::class, 'newOrder'])->name('new_order');
                Route::post('/', [C_Orders::class, 'create'])->name('create_order');
            });

            //?HISTORY ORDER
            Route::prefix('history')->group(function () {
                Route::get('/', [C_Orders::class, 'fetch_history']);
            });

            //?PLAN ORDER
            Route::prefix('plan')->group(function () {
                //?Plan Handler
                Route::get('/{order_id}', [C_Plan::class, 'handlePlanRoute']) -> name('handle_plan');
                //?RECRUITMENT
                Route::get('/{order_id}/recruitment', [C_Plan::class, 'fetchRecruitment'])->name('fetchRecruitment');
                Route::post('/{order_id}/recruitment', [C_Plan::class, 'saveRecruitment'])->name('save_recruitment');
                Route::delete('/{order_id}/recruitment', [TalentController::class, 'destroy']);

                //?TRAINING
                Route::get('/{order_id}/training', [C_Plan::class, 'fetchTraining']) -> name('fetchTraining');
                Route::post('/{order_id}/training', [C_Plan::class, 'saveTraining'])->name('new_offer');
                Route::patch('/{order_id}/training/{order_details_id}', [C_Plan::class, 'addGrade'])->name('add_grade');

                //?PENAWARAN
                Route::get('/{order_id}/penawaran', [C_Plan::class, 'fetchOffer']) -> name('fetchOffer');
                Route::put('/{order_id}/penawaran', [C_Plan::class, 'addOfferDetails']) -> name('add_offer_details');
                Route::post('/{order_id}/penawaran', [C_Plan::class, 'createOffer'])->name('create_offer');
                Route::patch('/{order_id}/penawaran', [C_Plan::class, 'offer_send']) -> name('send_offer');
                Route::post('/{order_id}/penawaran/save', [C_Plan::class, 'offer_save']) -> name('save_offer');
                Route::delete('/{order_id}/penawaran/{offer_job_detail_id}', [C_Plan::class, 'deleteOfferDetails']) -> name('delete_offer_detail');
                
                //?NEGOSIASI
                Route::get('/{order_id}/negosiasi', [C_Plan::class, 'fetchNegosiasi']) -> name('fetchNegosiasi');
                Route::patch('/{order_id}/negosiasi', [C_Plan::class, 'submitNegosiasi']) -> name('submitNegosiasi');
                Route::post('/{order_id}/negosiasi',[C_Plan::class, 'saveNegosiasi']) -> name('saveNegosiasi');
                
                //?PERCOBAAN
                Route::get('/{order_id}/percobaan', [C_Plan::class, 'fetchPercobaan']) -> name('fetchPercobaan');
                Route::post('/{order_id}/percobaan',[C_Plan::class, 'savePercobaan']) -> name('savePercobaan');
                Route::get('/{order_id}/percobaan/{talent_id}', [C_Plan::class, 'deletePercobaan']) -> name('deletePercobaan');

                //?PO & PKS
                Route::get('/{order_id}/popks',[C_Plan::class, 'fetchPopks']);
                Route::post('/{order_id}/popks', [C_Plan::class, 'popks_create']) -> name('create_popks');
                Route::patch('/{order_id}/popks', [C_Plan::class, 'popks_send']) -> name('send_popks');
                Route::put('/{order_id}/popks', [C_Plan::class, 'popks_save']);
            });
        });
    });
});
//? Admin End