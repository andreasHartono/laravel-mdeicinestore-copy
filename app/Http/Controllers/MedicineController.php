<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=Medicine::all();
        //dd($result);
        return view("medicine.index",["data"=>$result]);

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
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
       return view("medicine.show",["data"=>$medicine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }



    public function test()
    {
        //DB query. filter.
        $result=DB::table('medicines')
            ->where('price','>',20000)
            ->get();
        
        $result=DB::table('medicines')
            ->where('generic_name','like','%fen')
            ->get();
        
        //DB query. group by. sort
        $result=DB::table('medicines')
            ->select('generic_name')
            ->groupBy('generic_name')
            ->orderBy('generic_name','desc')
            ->get();

        //DB query. aggregate
        $result=DB::table('medicines')
            ->where('price','>',20000)
            ->count();
        
        $result=DB::table('medicines')->max('price');
        
        //DB query. join
        $result=DB::table('medicines')
            ->join('categories','medicines.category_id','=','categories.id')
            ->get();

        $result=DB::table('medicines')
            ->rightJoin('categories','medicines.category_id','=','categories.id')
            ->get();

        //Eloquent . filtering
        $result=Medicine::where('price','>',20000)
            ->get();
        
         //Eloquent . aggregate
         $result=Medicine::count();
         $result=Medicine::max('price');


         //Eloquent . special func
         $result=Medicine::find(2);

        dd($result);

    }
}
