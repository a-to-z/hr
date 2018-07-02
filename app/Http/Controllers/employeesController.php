<?php

namespace App\Http\Controllers;

use App\employees;
use Illuminate\Http\Request;

class employeesController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = employees::select('emp_no')->where([['emp_no','>',90000],['active_emp','Y']])->get();
        return view('list',compact('employees'));
    }
}
