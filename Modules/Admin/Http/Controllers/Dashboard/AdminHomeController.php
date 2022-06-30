<?php

namespace Modules\Admin\Http\Controllers\Dashboard;


use Illuminate\Routing\Controller;

class AdminHomeController extends Controller
{

    public function index()
    {
         return view('admin::Admin.dashboard.index');
    }



}
