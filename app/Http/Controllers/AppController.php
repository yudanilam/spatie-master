<?php

namespace App\Http\Controllers;

use App\Models\Table_setting;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Table_setting::findOrFail('1');
        // dd($data);
        
        return view('seting.index')->with("data",$data);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table_setting $r,$id)
    {
        $rules=array(
            'nama_aplikasi' => 'required|unique:table_settings',
            'judul' => 'required',
            'footer' => 'required',
            'version'=> 'required'
        );
        $messages=array(
            'nama_aplikasi.required' => 'Inputkan Nama Aplikasi',
            'judul.required' => 'Inputkan Judul Aplikasi',
            'footer.required' => 'Inputkan Footer Aplikasi',
            'version.required'=> 'Inputkan Versi Aplikasi'
        );
        $validator=Validator::make($request->all(),$rules,$messages);
        
        if($validator->fails())
            {
                $messages=$validator->messages();
                return response()->json(["messages"=>$messages], 500);
            }

            $products = Table_setting::find($id);
                $products->nama_aplikasi = $request->nama_aplikasi;
                $products->judul = $request->judul;
                $products->footer = $request->footer;
                $products->version = $request->version;
                $products->save();
                return response()->json(["product" => $products, "message"=>"Product has been updated successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(r $r)
    {
        //
    }
}
