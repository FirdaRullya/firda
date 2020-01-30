<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Karyawan;
use App\Posisi;
use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class KaryawanController extends Controller
/*{
	
 public function index(Request $request){
 	if ($request->has('cari')){
 		$data_karyawan = \App\Karyawan::where('nama_karyawan', 'LIKE', '%'.$request->cari.'%')->get();
 	}else{
 	$data_karyawan = \App\Karyawan::all();
 }
 	return view ('karyawan.index', ['data_karyawan' => $data_karyawan]);
 }
 public function create(Request $request){
 	\App\Karyawan::create($request->all());
 	return redirect('/karyawan');
 }
 public function edit($id){
 	$karyawan = \App\Karyawan::find($id);
 	return view('karyawan.edit', ['karyawan'=>$karyawan]);
 }
 public function update(Request $request, $id){
 	$karyawan = \App\Karyawan::find($id);
 	$karyawan->update($request->all());
 	return redirect ('/karyawan');
 }
 public function delete($id){
 	$karyawan = \App\Karyawan::find($id);
 	$karyawan->delete($karyawan);
 	return redirect ('/karyawan');
 }
}*/
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //$ar_jenis = Jabatan::orderBy('nama')->get();
        $data_karyawan = DB::table('karyawan')
        ->join('posisi', 'posisi.id', '=', 'karyawan.id')
        ->select('karyawan.*', 'posisi.posisi AS posisi')
        ->get();
        return view('karyawan/index', compact('data_karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('karyawan/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //tangkap request element2 form
        //Lalu panggil fungsi insert
        DB::table('karyawan')->insert(
                [
                    'nama'=>$request->nama_karyawan,
                    'jabatan_id'=>$request->jabatan_id,
                    'tempat_lahir'=>$request->tempat_lahir,
                    'tgl_lahir'=>$request->tgl_lahir,
                    'jenis_kelamin'=>$request->jenis_kelamin,
                    'agama'=>$request->agama,
                    'alamat'=>$request->alamat,
                    'no_hp'=>$request->no_hp,
                    'status'=>$request->status,
                    'tgl_gabung'=>$request->tgl_masuk,
                    'tgl_keluar'=>$request->tgl_keluar,
                ]);
        //Landing page
        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //select karyawan.*, posisi.posisi AS posisi from karyawan inner join posisi on posisi.id = karyawan.id
     $data = DB::table('karyawan')
       ->join('posisi', 'posisi.id', '=', 'karyawan.id')
       ->select('karyawan.*', 'posisi.posisi AS posisi')
       ->where('karyawan.id', '=', $id)
       ->get();

       return view('karyawan.show', compact('data'));
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
        $data = Karyawan::where('id',$id)->get();
        return view('karyawan/update', compact('data'));

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
        DB::table('karyawan')->where('id',$id)->update(
                [
                    'nama'=>$request->nama_karyawan,
                    'jabatan_id'=>$request->jabatan_id,
                    'tempat_lahir'=>$request->tempat_lahir,
                    'tgl_lahir'=>$request->tgl_lahir,
                    'jenis_kelamin'=>$request->jenis_kelamin,
                    'agama'=>$request->agama,
                    'alamat'=>$request->alamat,
                    'no_hp'=>$request->no_hp,
                    'status'=>$request->status,
                    'tgl_gabung'=>$request->tgl_masuk,
                    'tgl_keluar'=>$request->tgl_keluar,
                ]);
        //Landing page ke url http://Localhost:8000/karyawan/id
        return redirect('/karyawan'.'/'.$id);
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
        DB::table('karyawan')->where('id',$id)->delete();
        return redirect('/karyawan');
    }
     public function export() 
    {
        return Excel::download(new KaryawanExport, 'users.xlsx');
    }
    public function exportPdf(){
        $karyawan = \App\Karyawan::all();
        $pdf = PDF::loadView('export.karyawanpdf', ['karyawan'=>$karyawan]);
    return $pdf->download('karyawan.pdf');
    }
}