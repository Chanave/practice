<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class AdmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admenu()
    {
        $data         = DB::select("SELECT * FROM practice.kindee");
        
        return view('admenu',[
           'data' =>$data 
        ]);
    }

    public function editMenu($id)
    {

        $data         = DB::select("SELECT * FROM practice.kindee");

        $editMenu= DB::SELECT("select * from practice.kindee
                                                    where kin_id = '".$id."'"
                                                     );
                                          
        return view('admenu')->with([
            'data'       =>$data,
            'editMenu'   =>  $editMenu
        ]);
    
    
    }

    public function saveMenu()
    {
        $object = Request::all();        
        
        if(empty($object['id'])){

            DB::table('practice.kindee')->insert([
                'kin_id'       => $object['kin_id'] , 
                'kin_date'     => $object['kin_date'] ,
                'kin_menu'     => $object['kin_menu'] ,         
            ]);        

            return redirect('admenu');

        } else {

            DB::table('practice.kindee')->where(['kin_id' => $object['kin_id']])
            ->update([
                'kin_id'       => $object['kin_id'] ,   
                'kin_date'     => $object['kin_date'] ,
                'kin_menu'     => $object['kin_menu'] ,      
            ]);        
    
            return redirect('editMenu/'.$object['kin_id']);            
        }

    }

    public function deleteMenu($id){

        $deleted = DB::table('practice.kindee')->where('kin_id', '=', $id)->delete();

        return redirect('admenu');
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
    public function edit($id)
    {
        //
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