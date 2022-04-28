<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Input;
use DB;



class CheckboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkbox()
    {
        $datetoday = date('w');
        if($datetoday == 1 || $datetoday == 2 || $datetoday == 3 || $datetoday == 4){
            $dateStart = date('Y-m-d', strtotime('monday this week'));
            $dateEnd = date('Y-m-d', strtotime('friday this week'));
        }else{
            $dateStart = date('Y-m-d', strtotime('monday next week'));
            $dateEnd = date('Y-m-d', strtotime('friday next week'));        
        }        

        //return dd($dateStart."-".$dateEnd);
        $data = DB::select("SELECT * FROM practice.kindee WHERE kin_date BETWEEN '".$dateStart."' AND '".$dateEnd."'");
        
        
        return view('checkbox',[
           'data' =>$data 
        ]);
    }

   

    
    public function editMenu($id)
    {

        $data         = DB::select("SELECT * FROM practice.kindee");

        $editMenu= DB::SELECT("select * from practice.kindee
                                                    where kin_id = '".$id."'"
                                                     );
                                          
        return view('checkbox')->with([
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

            return redirect('checkbox');

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

        return redirect('checkbox');
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