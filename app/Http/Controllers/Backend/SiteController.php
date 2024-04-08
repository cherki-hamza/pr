<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    // the publishers index page
    public function index(UsersDataTable $dataTable){
        $title = "publishers";
        return $dataTable->render('admin.publishers.publishers');
    }


}
