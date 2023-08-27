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

// Client
Route::any('/', function () {
    return view('clients.landing');
});

Route::fallback(function () { //To Handle an unknown routes
    return redirect('/');
});

Route::get('/track', function () {
    return view('clients.track');
});
Route::post('/track', [C_Orders::class, 'track']);
// Client End

// Admin 
Route::prefix('login')->group(function () {
    Route::view('/', 'admin.login')->name('login');
    Route::post('/', [C_Auth::class, 'login']);
});
Route::get('/logout', [C_Auth::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::prefix('leads')->group(function () {
        Route::get('/', [C_Leads::class, 'fetch']);
        Route::delete('/leads/{id}', [C_Leads::class, 'delete'])->name('admin.leads.delete');
    
        Route::prefix('create')->group(function () {
            Route::get('/', function () {
                return view('admin.leads.create', [
                    "title" => "Leads | Create"
                ]);
            });
            Route::post('/', [C_Leads::class, 'create'])->name('create_leads');
        });
        Route::get('/{id}/detail', [C_Leads::class, 'detail']) -> name('detail_leads');
    
        Route::get('/{id}/activity', function () {
            return view('admin.leads.activity', [
                "title" => "Leads | Create Activity",
            ]);
        });
    
        Route::get('/{id}/offer', function () {
            return view('admin.leads.offer', [
                "title" => "Leads | Create Offer",
            ]);
        });
    
        //Activity Backend
        Route::post(
            '/appointment',
            [C_Activity::class, 'appointment']
        )->name('activity.appointment');
        Route::post(
            '/note',
            [C_Activity::class, 'note']
        )->name('activity.note');
        Route::post(
            '/report',
            [C_Activity::class, 'report']
        )->name('activity.report');
    });
    
    Route::prefix('client')->group(function () {
        Route::get('/', [C_Leads::class, 'fetch_client'])-> name('fetch_client');
        Route::get('/detail/{id}', [C_Leads::class, 'detail']);
        
        Route::prefix('order')->group(function () {
            Route::get('/', [C_Orders::class, 'fetch'])->name('fetch_order');
            Route::get('/create', [C_Orders::class, 'newOrder'])-> name('new_order');
            Route::post('/create', [C_Orders::class, 'create']) -> name('create_order');
            
            Route::prefix('history')->group(function(){
                Route::get('/', function () {
                    return view('admin.client.order.history', [
                        "title" => "Client | Order History",
                    ]);
                });
    
                Route::prefix('detail')->group(function () {
                    Route::get('/', function () {
                        return view('admin.client.order.detail', [
                            "title" => "Client | Detail Order",
                        ]);
                    });
    
                    Route::get('/timeline', function () {
                        return view('admin.client.order.timeline', [
                            "title" => "Client | Order Timeline",
                        ]);
                    });
                });
            });
    
    
            Route::prefix('plan')->group(function () {
                Route::get('/', [TalentController::class, 'procedure1']);
                Route::delete('/{id}', [TalentController::class, 'destroy']);
    
                Route::get('/training', function () {
                    return view('admin.client.plan.training', [
                        "title" => "Plan | Training",
                    ]);
                });
    
                Route::get('/penawaran', function () {
                    return view('admin.client.plan.penawaran', [
                        "title" => "Plan | Penawaran",
                    ]);
                });
                Route::post('/penawaran', [PenawaranWordController::class, 'generate'])->name('penawaran.download');
    
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
    
                Route::prefix('popks')->group(function () {
                    Route::get('/', function () {
                        return view('admin.client.plan.popks', [
                            "title" => "Plan | PO & PKS",
                        ]);
                    });
    
                    Route::post('/', [C_Plan::class, 'popks_create'])->name('create_popks');
                    // Route::post('/', [C_Plan::class, 'popks_send']) -> name('send_popks');
                });
            });
        });
    });
});

// Admin End