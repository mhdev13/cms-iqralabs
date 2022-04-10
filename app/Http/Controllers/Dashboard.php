<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use App\UploadedFile;
use App\Users;
use App\Groups;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dashboard extends Controller
{
    public function index(){
        $dashboard = DB::table('mau_monthly_report')
        ->select('count')
        ->where('year', '2022')
        ->orderBy('year', 'DESC')
        ->get();
        
        return view('dashboard',['dashboard' => $dashboard]);
    }
}
