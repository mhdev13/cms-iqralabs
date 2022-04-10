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

class Report extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = DB::table('mau_monthly_report')
        ->select('*')
        ->orderBy('id','desc')
        ->get();

        $sum = DB::table('mau_monthly_report')
        ->sum('mau_monthly_report.count');

        return view('report/monthly',['report' => $report, 'sum' => $sum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report/add_report_monthly');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->_token != ''){
            DB::table('mau_monthly_report')->insert([
                'year' => $request->year,
                'month' => $request->month,
                'count' => $request->count,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Session::flash('flash_message', 'succesfully saved.');

            return redirect('/report');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = DB::table('mau_monthly_report')
        ->Select('*')
        ->where('id', $id)
        ->get();

        return view('report/edit_report_monthly', ['report' => $report]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->_token != ''){
            DB::table('mau_monthly_report')
            ->where('id', $request->id)
            ->update([
                'year' => $request->year,
                'month' => $request->month,
                'count' => $request->count,
                'updated_at' => carbon::now()
            ]);

        Session::flash('flash_message','successfully update.');

        return redirect('/report');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mau_monthly_report')->where('id', $id)->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/report');
    }

    public function getReport()
    {
        $data = array(
            "status" => 200,
            "response" => "success",
            "data" => DB::table('mau_monthly_report')
            ->sum('mau_monthly_report.count')
        );

        return $data;
    }
}


