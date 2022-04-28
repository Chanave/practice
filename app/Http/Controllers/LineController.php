<?php

namespace App\Http\Controllers;


use Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class LineController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function line()
    {
        $data = DB::select("SELECT * FROM practice.line");
        
        $li = DB::select("SELECT * FROM practice.line
        WHERE line_id='2'");
        
        return view('line',[
            'data'       =>$data ,
            'li'         =>$li
        ]);

    }

    public function getLine($id){
        $data = DB::select("SELECT * FROM practice.line");


        echo json_encode(DB::table('line')->where('line_id',$id)->get());
    }

    public function editLine($id)
    {
        $data = DB::select("SELECT * FROM practice.line");

        $editLine= DB::SELECT("select * from practice.line
                                                    where line_id = '".$id."'"
                                                    );
            
        return view('line')->with([
            'line_id'         => $object['line_id'] ,
            'line_box'       => $object['line_box'] , 
            'line_date'      => $object['line_date']

        ]);
    
    
    }

    public function saveLine()
    {
        $object = Request::all();        
        
        if(empty($object['id'])){

            DB::table('practice.line')->insert([
                'line_id'        => $object['line_id'] ,
                'line_box'       => $object['line_box'] ,
                'line_date'      => $object['line_date']
        
            ]);        

            return redirect('line');

        } else {

            DB::table('practice.line')->where(['line_id' => $object['line_id']])
            ->update([
                'line_id'         => $object['line_id'] ,
                'line_box'       => $object['line_box'] , 
                'line_date'      => $object['line_date']
    
            ]);        
            
            return redirect('editLine/'.$object['line_id']);            
        }
    }

    public function deleteLine($id){

        $deleted = DB::table('practice.line')->where('line_id', '=', $id)->delete();

        return redirect('line');
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

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