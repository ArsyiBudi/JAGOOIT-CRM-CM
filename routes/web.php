<?php

use App\Http\Controllers\C_Activity;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Leads;
use App\Http\Controllers\C_Offer;
use App\Http\Controllers\C_Orders;
use App\Http\Controllers\C_Plan;
use App\Http\Controllers\PenawaranWordController;
use App\Http\Controllers\TalentController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;


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

// Route::fallback(function () { //!To Handle an unknown routes
//     return redirect('/');
// });

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
        Route::prefix('create')->group(function () {
            Route::get('/', function () {
                return view('admin.leads.create', [
                    "title" => "Leads | Create"
                ]);
            });
            Route::post('/', [C_Leads::class, 'create'])->name('create_leads');
        });
        Route::get('/{id}/detail', [C_Leads::class, 'detail'])->name('detail_leads');
        Route::prefix('/activity') -> group(function () {
            Route::get('/{leads_id}', function(){
                return view('admin.leads.activity', [
                    'title' => "Leads | Create Activity"
                ]);
            });
            Route::post('/{leads_id}/appointment', [C_Activity::class, 'appointment'])->name('activity.appointment');
            Route::post('/{leads_id}/note',[C_Activity::class, 'note'])->name('activity.note');
            Route::post('/{leads_id}/report', [C_Activity::class, 'report'])->name('activity.report');
        });

        Route::get('/{id}/offer', function () {
            return view('admin.leads.offer', [
                "title" => "Leads | Create Offer",
            ]);
        });
    });

    Route::prefix('client')->group(function () {
        Route::get('/', [C_Leads::class, 'fetch_client'])->name('fetch_client');
        Route::get('/detail/{client_id}', [C_Leads::class, 'detail']);
        Route::prefix('order')->group(function () {
            Route::get('/', [C_Orders::class, 'fetch'])->name('fetch_order');
            Route::get('/detail/{order_id}', [C_Orders::class, 'detail'])->name('detail_order');

            //?CREATE ORDER
            Route::prefix('create')->group(function(){
                Route::get('/', [C_Orders::class, 'newOrder'])-> name('new_order');
                Route::post('/', [C_Orders::class, 'create']) -> name('create_order');
            });

            //?HISTORY ORDER
            Route::prefix('history')->group(function(){
                Route::get('/', function () {
                    return view('admin.client.order.history', [
                        "title" => "Client | Order History",
                    ]);
                });
                Route::get('/{order_id}/timeline', function () {
                    return view('admin.client.order.timeline', [
                        "title" => "Client | Order Timeline",
                    ]);
                });
            });

            //?PLAN ORDER
            Route::prefix('plan')->group(function () {
                Route::get('/recruitment/{order_id}', [TalentController::class, 'procedure1']) -> name('recruitment');
                Route::delete('/recruitment/{order_id}', [TalentController::class, 'destroy']);

                Route::get('/training', function () {
                    return view('admin.client.plan.training', [
                        "title" => "Plan | Training",
                    ]);
                });

                Route::post('/training', [C_Offer::class, 'newOffer'])->name('create_offer_null');
                Route::get('/penawaran/{id}', function () {
                    return view('admin.client.plan.penawaran', [
                        "title" => "Plan | Penawaran",
                    ]);
                });
                Route::post('/penawaran/{id}', [C_Offer::class, 'create'])->name('create_offer');
            
                Route::get('/negosiasi', function () {
                    return view('admin.client.plan.negosiasi', [
                        "title" => "Plan | Negosiasi",
                    ]);
                });

                Route::get('/percobaan', function () {
                    return view('admin.client.plan.percobaan', [
                        "title" => "Plan | Percobaan",
                    ]);
                });
                Route::get('/{order_id}/popks/{popks_id}', function () {
                    return view('admin.client.plan.popks', [
                        "title" => "Plan | PO & PKS",
                    ]);
                });
    
                Route::post('/{order_id}/popks/{popks_id}', [C_Plan::class, 'popks_create']) -> name('create_popks');
                Route::patch('/{order_id}/popks/{popks_id}', [C_Plan::class, 'popks_send']) -> name('send_popks');
            
            });
        });
    });
});


//? Admin End