<?php

use Illuminate\Support\Facades\Route;


//set active
function set_active($routes) {
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
// Client End


// Route::prefix('leads') -> group([middleware => ['auth:sanctum']], function(){

// });

    // Admin
    
    Route::get('/login', function () {
        return view('admin.login');
    });
    
    Route::get('/leads/menu', function () {
        return view('admin.leads.menu');
    });
    
    Route::get('/leads/create', function () {
        return view('admin.leads.create');
    });
    
    Route::get('/leads/detail', function () {
        return view('admin.leads.detail');
    });
    
    Route::get('/leads/activity/create', function () {
        return view('admin.leads.activity');
    });
    
    Route::get('/leads/offer/create', function () {
        return view('admin.leads.offer');
    });
    
    Route::get('/client/menu', function () {
        return view('admin.client.menu');
    });
    
    Route::get('/client/detail', function () {
        return view('admin.client.detail');
    });
    
    Route::get('/client/history', function () {
        return view('admin.client.order.history');
    });
    
    Route::get('/client/history/detail', function () {
        return view('admin.client.order.detail');
    });
    
    Route::get('/client/history/detail/timeline', function () {
        return view('admin.client.order.timeline');
    });
    
    Route::get('/client/order', function () {
        return view('admin.client.order.list');
    });
    
    Route::get('/client/create', function () {
        return view('admin.client.order.create');
    });
    
    Route::get('/client/plan/create/recruitment', function () {
        return view('admin.client.plan.recruitment');
    });
    
    Route::get('/client/plan/create/training', function () {
        return view('admin.client.plan.training');
    });
    
    Route::get('/client/plan/create/penawaran', function () {
        return view('admin.client.plan.penawaran');
    });
    
    Route::get('/client/plan/create/interview', function () {
        return view('admin.client.plan.interview');
    });
    
    Route::get('/client/plan/create/popks', function () {
        return view('admin.client.plan.popks');
    });
    // Admin End

