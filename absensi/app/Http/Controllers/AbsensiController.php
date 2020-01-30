<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Detail;
use App\Karyawan;
use App\Posisi;
use App\Absensi;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {

         // if($request->has('search')){
         //     $data_absensi = \App\Absensi::where('nama','LIKE','%'.$request->search.'%')->get();
         // }else{
         //     $data_absensi = \App\Absensi::all();
         // }return view('absensi.index',['data_absensi'=>$data_absensi]);


     //$ar_jenis = Jabatan::orderBy('nama')->get();
        // $data_karyawan = DB::table('absensi')
        // ->join('posisi', 'posisi.id', '=', 'absensi.id')
        // ->select('absensi.*', 'absensi.nama AS nama')
        // ->get();
        // return view('absensi/index', compact('data_absensi'));


        //select absensi.*, posisi.posisi AS posisi from absensi inner join posisi on posisi.id = absensi.id

          $data_absensi = DB::table('absensi')->get();
        $data_absensi = DB::table('absensi')
        ->join('posisi', 'posisi.id', '=', 'absensi.id')
        ->select('absensi.*', 'posisi.posisi AS posisi')
        ->get();
        return view('absensi/index', compact('data_absensi'));   
}

	 public function create()
    {
      return view('absensi/index');
    }
    public function store(Request $request)
    {
     //tangkap request element2 form
        //Lalu panggil fungsi insert
        DB::table('absensi')->insert(
                [
                    'nama'=>$request->nama,
                    'tanggal'=>$request->tanggal,
                    'time_in'=>$request->time_in,
                    'time_out'=>$request->time_out,
                    'time_break'=>$request->time_break,
                    'time_breakend'=>$request->time_breakend,
                    'keterangan'=>$request->keterangan,
                    'karyawan_id'=>$request->jabatan_id,
                    
                ]);
        //Landing page
        return redirect('/absensi');
    }
     public function show($id)
    {   
        //select absensi.*, absensi.karyawan_id AS kar from absensi inner join karyawan on absensi.id = absensi.id
     $data = DB::table('absensi')
       ->join('karyawan', 'absensi.id', '=', 'absensi.id')
       ->select('absensi.*', 'absensi.karyawan_id AS kar')
       ->where('absensi.id', '=', $id)
       ->get();

       return view('absensi.show', compact('data'));
    }
    public function edit($id)
    {
     //tampilkan form u/ menampilkan data lama yg mau di edit sebanyak sebaris data
        $data = Absensi::where('id',$id)->get();
        return view('absensi/update', compact('data'));

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
        DB::table('absensi')->where('id',$id)->update(
                [
                    'nama'=>$request->nama,
                    'tanggal'=>$request->tanggal,
                    'time_in'=>$request->time_in,
                    'time_out'=>$request->time_out,
                    'time_break'=>$request->time_break,
                    'time_breakend'=>$request->time_breakend,
                    'keterangan'=>$request->keterangan,
                    'karyawan_id'=>$request->karyawan_id,
                    
                ]);
        //Landing page ke url http://Localhost:8000/karyawan/id
        return redirect('/absensi'.'/'.$id);
    }
    public function destroy($id)
    {
     //Lakukan query delete
        DB::table('absensi')->where('id',$id)->delete();
        return redirect('/absensi');
    }

}
