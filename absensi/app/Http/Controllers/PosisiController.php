<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Posisi;
class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ar_posisi = DB::table('posisi')->get();
        return view('posisi/index', compact('ar_posisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('posisi/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //Lalu panggil fungsi insert
        DB::table('posisi')->insert(
                [
                    'id'=>$request->id,
                    'posisi'=>$request->posisi,
                    
                ]);
        //Landing page
        return redirect('/posisi');
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
     //tampilkan form u/ menampilkan data lama yg mau di edit sebanyak sebaris data
        $data = Posisi::where('id',$id)->get();
        return view('posisi/update', compact('data'));
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
     //tangkap request element2 form
        //Lalu panggil fungsi update
        DB::table('posisi')->where('id',$id)->update(
                [
                    'id'=>$request->id,
                    'posisi'=>$request->posisi,
    
                ]);
        //Landing page ke url http://Localhost:8000/karyawan/id
        return redirect('/posisi'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     //Lakukan query delete
        DB::table('posisi')->where('id',$id)->delete();
        return redirect('/posisi');
    }
}
