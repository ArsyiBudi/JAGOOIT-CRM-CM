<?php

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
Route::get('/', function () {
    return view('clients.landing');
});

Route::get('/track', function () {
    return view('clients.track');
});
// Client End


// Admin 
Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/leads/menu', function () {
    return view('admin.leads.menu', [
        "title" => "Leads | Menu",
    ]);
});

Route::get('/leads/create', function () {
    return view('admin.leads.create', [
        "title" => "Leads | Create",
    ]);
});

Route::get('/leads/detail', function () {
    return view('admin.leads.detail', [
        "title" => "Leads | Detail",
    ]);
});

Route::get('/leads/activity/create', function () {
    return view('admin.leads.activity', [
        "title" => "Leads | Create Activity",
    ]);
});

Route::get('/leads/offer/create', function () {
    return view('admin.leads.offer', [
        "title" => "Leads | Create Offer",
    ]);
});

Route::get('/client/menu', function () {
    return view('admin.client.menu', [
        "title" => "Client | Menu",
    ]);
});

Route::get('/client/detail', function () {
    return view('admin.client.detail', [
        "title" => "Client | Detail",

    ]);
});

Route::get('/client/history', function () {
    return view('admin.client.order.history', [
        "title" => "Client | Order History",
    ]);
});

Route::get('/client/history/detail', function () {
    return view('admin.client.order.detail', [
        "title" => "Client | Detail Order",
    ]);
});

Route::get('/client/history/detail/timeline', function () {
    return view('admin.client.order.timeline', [
        "title" => "Client | Order Timeline",
    ]);
});

Route::get('/client/order', function () {
    return view('admin.client.order.list', [
        "title" => "Client | Order List",
    ]);
});

Route::get('/client/create', function () {
    return view('admin.client.order.create', [
        "title" => "Client | Create Order",
    ]);
});

Route::get('/client/plan/create/recruitment', function () {
    return view('admin.client.plan.recruitment', [
        "title" => "Plan | Recruitment",
    ]);
});

Route::get('/client/plan/create/training', function () {
    return view('admin.client.plan.training', [
        "title" => "Plan | Training",
    ]);
});

Route::get('/client/plan/create/penawaran', function () {
    return view('admin.client.plan.penawaran', [
        "title" => "Plan | Penawaran",
    ]);
});

Route::get('/client/plan/create/negosiasi', function () {
    return view('admin.client.plan.negosiasi', [
        "title" => "Plan | Negosiasi",
    ]);
});

Route::get('/client/plan/create/percobaan', function () {
    return view('admin.client.plan.percobaan', [
        "title" => "Plan | Percobaan",
    ]);
});

Route::get('/client/plan/create/popks', function () {
    return view('admin.client.plan.popks', [
        "title" => "Plan | PO & PKS",
    ]);
});
// Admin End