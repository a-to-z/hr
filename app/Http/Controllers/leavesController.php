<?php

namespace App\Http\Controllers;

use App\leaveDET;
use App\leaveEMP;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\leaveMST;
use Illuminate\Support\Facades\Auth;

class leavesController extends Controller
{
    //
    public function index()
    {
        //
        $emp_no = User::select('emp_no')->where('id',Auth::id())->get();
        $leaves = leaveMST::where([['emp_no',$emp_no[0]['emp_no']],['l_year',date("Y")]])->get();
        $spent = leaveEMP::select(DB::raw('sum(sl) as sl')
            ,DB::raw('sum(cl) as cl')
            ,DB::raw('sum(lv_hj) as hj')
            ,DB::raw('sum(lv_ad) as ad')
            ,DB::raw('sum(lv_uh) as uh')
            ,DB::raw('sum(lv_re) as re')
            ,DB::raw('sum(lv_we) as we')
            ,DB::raw('sum(nvl(lv_al,0)) as al'))->where([['emp_no',$emp_no[0]['emp_no']],['l_year',date("Y")]])->get();

        $final = array([
                            'sl' => $leaves[0]['sl']-$spent[0]['sl']
                            ,'cl' => $leaves[0]['cl']-$spent[0]['cl']
                            ,'hj' => $leaves[0]['hj']-$spent[0]['hj']
                            ,'ad' => $leaves[0]['ad']-$spent[0]['ad']
                            ,'uh' => $leaves[0]['uh']-$spent[0]['uh']
                            ,'re' => $leaves[0]['re']-$spent[0]['re']
                            ,'we' => $leaves[0]['we']-$spent[0]['we']
                            ,'al' => $leaves[0]['al']-$spent[0]['al']
                            ],
            ['sl' => (is_null($leaves[0]['sl'])) ? 0 : $leaves[0]['sl']
                ,'cl' => (is_null($leaves[0]['cl'])) ? 0 : $leaves[0]['cl']
                ,'hj' => (is_null($leaves[0]['hj'])) ? 0 : $leaves[0]['hj']
                ,'ad' => (is_null($leaves[0]['ad'])) ? 0 : $leaves[0]['ad']
                ,'uh' => (is_null($leaves[0]['uh'])) ? 0 : $leaves[0]['uh']
                ,'re' => (is_null($leaves[0]['re'])) ? 0 : $leaves[0]['re']
                ,'we' => (is_null($leaves[0]['we'])) ? 0 : $leaves[0]['we']
                ,'al' => (is_null($leaves[0]['al'])) ? 0 : $leaves[0]['al']
            ]);
        return view('leavesAll',compact('final','emp_no'));
    }

    public function details(){

        $emp_no = User::select('emp_no')->where('id',Auth::id())->get();
        $details = leaveDET::where('emp_no',$emp_no[0]['emp_no'])->orderBy('start_dt', 'desc')->get();

        $types = array(
          'SL' => 'Sick Leave'
          ,'CL' => 'Casual Leave'
          ,'AL' => 'Annual Leave'
            ,'HJ' => 'Hajj Leave'
            ,'AD' => 'Accidental Disability Leave'
            ,'UH' => 'Umrah Leave'
            ,'RE' => 'Religious Leave'
            ,'WE' => 'Wedding Leave'
            ,'WP' => 'Without Pay'
            ,'HD' => 'Half Day'
            ,'LP' => 'With Pay'
            ,'MA' => 'Maternity Leave'
        );

        return view('leaveDetails',compact('details','types'));
    }
}
