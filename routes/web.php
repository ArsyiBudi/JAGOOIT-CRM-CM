<?php

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Orders;
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

// Client
Route::any('/', function () {
    return view('clients.landing');
});

Route::get('/track', function () {
    return view('clients.track');
});
Route::post('/track', [C_Orders::class, 'track']);
// Client End

// Admin 
Route::prefix('login')->group(function(){
    Route::view('/', 'admin.login');
    Route::post('/', [C_Auth::class, 'login']);
});

Route::prefix('leads')->group(function(){
    Route::get('/', function () {
        return view('admin.leads.menu', [
            "title" => "Leads | Menu",
        ]);
    });

    Route::get('/create', function () {
        return view('admin.leads.create', [
            "title" => "Leads | Create",
        ]);
    });
    
    Route::get('/detail', function () {
        return view('admin.leads.detail', [
            "title" => "Leads | Detail",
        ]);
    });

    Route::get('/activity', function () {
        return view('admin.leads.activity', [
            "title" => "Leads | Create Activity",
        ]);
    });
    
    Route::get('/offer', function () {
        return view('admin.leads.offer', [
            "title" => "Leads | Create Offer",
        ]);
    });
});

Route::prefix('client')->group(function(){
    Route::get('/', function () {
        return view('admin.client.menu', [
            "title" => "Client | Menu",
        ]);
    });
    
    Route::get('/detail', function () {
        return view('admin.client.detail', [
            "title" => "Client | Detail",
        ]);
    });
    
    Route::prefix('order')->group(function(){
        Route::get('/', function () {
            return view('admin.client.order.list', [
                "title" => "Client | Order List",
            ]);
        });
        
        Route::get('/create', function () {
            return view('admin.client.order.create', [
                "title" => "Client | Create Order",
            ]);
        });
        
        Route::prefix('history')->group(function(){
            Route::get('/', function () {
                return view('admin.client.order.history', [
                    "title" => "Client | Order History",
                ]);
            });
            
            Route::prefix('detail')->group(function(){
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
        
        
        Route::prefix('plan')->group(function(){
            Route::get('/recruitment', function () {
                return view('admin.client.plan.recruitment', [
                    "title" => "Plan | Recruitment",
                ]);
            });
            
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
            
            Route::get('/popks', function () {
                return view('admin.client.plan.popks', [
                    "title" => "Plan | PO & PKS",
                ]);
            });
        });  
    });
});



// Admin End