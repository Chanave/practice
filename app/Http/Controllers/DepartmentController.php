<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function department()
    {

        $data         = DB::select("SELECT * FROM practice.department");
        
        return view('department',[
           'data' =>$data 
        ]);
    }

    public function editDepartment($id)
    {

        $data         = DB::select("SELECT * FROM practice.department");

        $editDepartment= DB::SELECT("select * from practice.department
                                                    where dept_id = '".$id."'"
                                                     );
                                          
        return view('department')->with([
            'data'             =>$data,
            'editDepartment'   =>  $editDepartment
        ]);
    
    
    }

    public function saveDepartment()
    {
        $object = Request::all();        
        
        if(empty($object['id'])){

            DB::table('practice.department')->insert([
                'dept_id'         => $object['dept_id'] ,
                'dept_name'       => $object['dept_name'] ,        
            ]);        

            return redirect('department');

        } else {

            DB::table('practice.department')->where(['dept_id' => $object['dept_id']])
            ->update([
                'dept_id'         => $object['dept_id'] ,
                'dept_name'       => $object['dept_name'] ,        
            ]);        
    
            return redirect('editDepartment/'.$object['dept_id']);            
        }

    }
    public function deleteDepartment($id){

        $deleted = DB::table('practice.department')->where('dept_id', '=', $id)->delete();

        return redirect('department');
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
        $editmenu = DB::connection('mysql')->SELECT("select * from practice.department
        											where dept_id = '".$id."'"
        											);

        return view('practice.editmenu')->with([
            'editmenu'   =>  $editmenu
        ]);
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