<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function employee()
    {

        $data         = DB::select("SELECT * FROM practice.employee A
                                    inner join practice.division B on A.division_id=B.division_id
                                    inner join practice.department C on B.dept_id = C.dept_id");

        $department = DB::select("SELECT * FROM practice.department");
        $division = DB::select("SELECT * FROM practice.division");

        return view('employee',[
           'data'       =>$data ,
           'department' =>$department,
           'division'   =>$division
        ]);
        
    }

    public function getEmployee($id){
        $data         = DB::select("SELECT * FROM practice.employee A
                                    inner join practice.division B on A.division_id=B.division_id
                                    inner join practice.department C on B.dept_id = C.dept_id");

        $department = DB::select("SELECT * FROM practice.department");
        $division = DB::select("SELECT * FROM practice.division");
        echo json_encode(DB::table('division')->where('division_id',$id)->get());
    }

    //Edit_Emp
    public function editEmployee($id)
    {

        $data         = DB::select("SELECT * FROM practice.employee A
                                     inner join practice.division B on A.division_id=B.division_id
                                    inner join practice.department C on B.dept_id = C.dept_id");

        $editEmployee= DB::SELECT("select * from practice.employee
                                                    where emp_id = '".$id."'"
                                                     );
        $department = DB::select("SELECT * FROM practice.department");       
        $division = DB::select("SELECT * FROM practice.division");         
        return view('employee')->with([
            'data'           =>$data,
            'editEmployee'   =>$editEmployee,
            'department'     =>$department,
            'division'       =>$division
        ]);
    
    
    }

    public function saveEmployee()
    {
        $object = Request::all();        
        
        if(empty($object['id'])){

            DB::table('practice.employee')->insert([
                'emp_id'         => $object['emp_id'] ,
                'emp_name'       => $object['emp_name'] , 
                'emp_lastname'   => $object['emp_lastname'] ,  
                'emp_tel'        => $object['emp_tel'] ,  
                'division_id'    => $object['division_id'] ,         
            ]);        

            return redirect('employee');

        } else {

            DB::table('practice.employee')->where(['emp_id' => $object['emp_id']])
            ->update([
                'emp_id'         => $object['emp_id'] ,
                'emp_name'       => $object['emp_name'] , 
                'emp_lastname'   => $object['emp_lastname'] ,  
                'emp_tel'        => $object['emp_tel'] ,  
                'division_id'    => $object['division_id'] ,     
            ]);        
    
            return redirect('editEmployee/'.$object['emp_id']);            
        }

    }
    public function deleteEmployee($id){

        $deleted = DB::table('practice.employee')->where('emp_id', '=', $id)->delete();

        return redirect('employee');
    }

    public function divisionById(){

        $object = Request::all(); 

        $selected = DB::SELECT("select * from practice.division where dept_id = '".$object['id']."'");

        return $selected;
    }

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function getEditmenu($id)
    { 
     
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

 
}