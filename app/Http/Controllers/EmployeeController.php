<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){

        return view('store');
    }

    public function store(request $request){
        $data = $request->except(['_token']);
        try {
            $employee = Employee::create($data);
            return redirect('/');
        } catch (Throwable $e) {
            return false;
        }
    }

    public function delete($id){
       if($id){
           try {
               $employee = Employee::find($id);
               $employee->delete();
           }catch (Throwable $e){
               return false;
           }
           return true;
       }
    }

    public function edit($id){
        $employee = Employee::find($id);
        return view('edit',['employee'=>$employee]);
    }

    public function update($id,request $request){
        //dd($request->get('name'));
        $employee = Employee::find($id);
        $employee->name = $request->get('name');
        $employee->document = $request->get('document');
        $employee->rg = $request->get('rg');
        $employee->cep = $request->get('cep');
        $employee->street = $request->get('street');
        $employee->number = $request->get('number');
        $employee->neighborhood = $request->get('neighborhood');
        $employee->save();
        return redirect('/');
    }
}
