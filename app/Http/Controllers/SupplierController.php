<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Category;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Supplier::all();
        //dd($data);
        return view('supplier.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('supplier.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $data=new Supplier();
        $data->name=$request->get('name');
        $data->address=$request->get('address');
        $data->save();
        return redirect()->route('suppliers.index')
            ->with('status','data baru berhasil tersimpan');
        //redirect()->action('SupplierController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $data=$supplier;
        return view('supplier.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        //dd($request);
        $supplier->name=$request->get('name');
        $supplier->address=$request->get('address');
        $supplier->save();
        return redirect()->route('suppliers.index')
            ->with('status','data berhasil diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
       $this->authorize('delete-permission');
        $supplier->delete();
        return redirect()->route('suppliers.index')
        ->with('status','data berhasil dihapus');
    }


    public function getEditForm(Request $request)
    {
        $id=$request->get('id');
        $data=Supplier::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('supplier.getEditForm',compact('data'))->render()
        ),200);
    }

    public function deleteData(Request $request)
    {
        $id=$request->get('id');
        $supplier=Supplier::find($id);
        $supplier->delete();
        return response()->json(array(
            'status'=>'ok',
            'msg'=>'berhasil hapus data'
        ),200);
    }
}