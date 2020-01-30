<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //if($request->has('search')){
             //$data_user = \App\User::where('nama','LIKE','%'.$request->search.'%')->get();
        // }else{
            // $data_user = \App\User::all();
         //}return view('kelolauser.index',['data_user'=>$data_user]);

//select users.*, role.role_nama AS akses from users inner join role on role.id = users.id

     //$data_karyawan = Karyawan::where('id')->get();
        $data_user = DB::table('users')
        ->join('role', 'role.id', '=', 'user.id')
        ->select('user.*', 'role.role_nama AS role')
        ->orderBy('id','desc')
        ->get();
        return view('users/index', compact('data_user'));
    

    
        
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
        $file = $request->file('foto');
        $nama_file = $file->getClientOriginalName();

        $tujuan_upload = 'img';
        $file->move($tujuan_upload,$nama_file);

        DB::table('karyawan')->insert(
                [
                    'nama'=>$request->nama,
                    'jabatan_id'=>$request->posisi,
                    'tempat_lahir'=>$request->tempat_lahir,
                    'tgl_lahir'=>$request->tgl_lahir,
                    'jenis_kelamin'=>$request->jenis_kelamin,
                    'agama'=>$request->agama,
                    'alamat'=>$request->alamat,
                    'no_hp'=>$request->no_hp,
                    'status'=>$request->status,
                    'tgl_gabung'=>$request->tgl_masuk,
                    'tgl_keluar'=>$request->tgl_keluar,
                    'foto'=>$nama_file
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
        $file = $request->file('foto');
        $nama_file = $file->getClientOriginalName();

        $tujuan_upload = 'img';
        $file->move($tujuan_upload,$nama_file);

        //tangkap request element2 form
        //Lalu panggil fungsi update
        DB::table('karyawan')->where('id',$id)->update(
                [
                    'nama'=>$request->nama,
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
                    'foto'=>$nama_file
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
}
