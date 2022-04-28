<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function division()
    {

        $data         = DB::select("SELECT * FROM practice.division A
                                    inner join practice.department B on A.dept_id=B.dept_id");
         $department = DB::select("SELECT * FROM practice.department");
        return view('division',[
           'data'       =>$data ,
           'department' =>$department
        ]);
        
        
    }

    //Edit_division
    public function editDivision($id)
    {

        $data         = DB::select("SELECT * FROM practice.division A
                                    inner join practice.department B on A.dept_id=B.dept_id");

        $editDivision= DB::SELECT("select * from practice.division
                                                    where division_id = '".$id."'"
                                                     );
        $department = DB::select("SELECT * FROM practice.department");               
        return view('division')->with([
            'data'           =>  $data,
            'editDivision'   =>  $editDivision,
            'department'     =>  $department
        ]);
    
    
    }

    public function saveDivision()
    {
        
        $object = Request::all();        
        
        if(empty($object['id'])){

            DB::table('practice.division')->insert([
                'division_id'         => $object['division_id'] ,
                'division_name'       => $object['division_name'] , 
                'dept_id'             => $object['dept_id'] ,  
                
                 
                      
            ]);        

            return redirect('division');

        } else {

            DB::table('practice.division')->where(['division_id' => $object['division_id']])
            ->update([
                'division_id'         => $object['division_id'] ,
                'division_name'       => $object['division_name'] , 
                'dept_id'             => $object['dept_id'] ,   
                  
            ]);        
    
            return redirect('editDivision/'.$object['division_id']);            
        }

    }
    public function deleteDivision($id){

        $deleted = DB::table('practice.division')->where('division_id', '=', $id)->delete();

        return redirect('division');
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
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
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