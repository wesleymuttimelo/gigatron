<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
       $employees = DB::table('employee')
           ->where([
               ['deleted_at','=',NULL]
           ])
           ->paginate(15);
        return view('employee',['employees'=>$employees]);
    }
}
