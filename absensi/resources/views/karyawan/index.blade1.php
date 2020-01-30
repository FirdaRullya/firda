@extends('layouts.index')
@section('content')
@php
$ar_judul = ['No','Nama','Posisi','Gender','Status','Action'];
$no = 1;
@endphp

<section>
  <div class="container">
    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/datak.jpg" alt="" align="center">
    <div class="about-heading-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 mx-auto">
          <div class="bg-faded rounded p-5">

            <h1 class="btn-warning" align="center">Data Karyawan</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus">&nbsp;Add</i>
            </button>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                   <form action="{{route('karyawan.store')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input name="nama_karyawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik nama lengkap anda">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1" >
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tempat Lahir</label>
                      <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik tempat lahir anda">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Lahir</label>
                      <input name="tgl_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group">
                      @php

                      $rs = App\Posisi::all();
                      @endphp
                      <label for="exampleFormControlSelect1">Posisi</label>
                      <select name="jabatan_id" class="form-control" id="exampleFormControlSelect1" >
                        <option value="">Pilih Posisi</option>
                        @foreach($rs as $row)
                        <option value="{{$row->id}}">{{$row->posisi}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Agama</label>
                      <select name="agama" class="form-control" id="exampleFormControlSelect1" >
                        <option value="">Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghuchu">Konghuchu</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No. Hp</label>
                      <input name="no_hp" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik no.hp anda">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Alamat</label>
                      <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ketik alamat anda"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Status</label>
                      <select name="status" class="form-control" id="exampleFormControlSelect1" >
                        <option value="">Pilih Status</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum">Belum</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Gabung</label>
                      <input name="tgl_masuk" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Keluar</label>
                      <input name="tgl_keluar" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Foto</label>
                      <input name="foto" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <br/> 
          <br/>
          <table class="table table-hover" >
           <thead class="thead-dark">
            <tr>
             @foreach($ar_judul as $jdl)
             <th>{{ $jdl }}</th>
             @endforeach
           </tr>
         </thead>
         <tbody>
         @foreach($data_karyawan as $karyawan)
         <tr class="table-light">
          <td>{{ $no++ }}</td>
          <td>{{ $karyawan->nama }}</td>
          <td>{{ $karyawan->posisi }}</td>
          <td>{{ $karyawan->jenis_kelamin }}</td>
          <td>{{ $karyawan->status }}</td>
          <td>
            <a href="{{ route('karyawan.show', $karyawan->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-address-card"></i></a>
            &nbsp; &nbsp;
            <a href="/karyawan/{{$karyawan->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
            &nbsp; &nbsp;
            <a href="/karyawan/{{$karyawan->id}}/delete" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
      </table>

      <a href="/karyawan/export" class="btn btn-sm btn-warning">Ekspor Excel</a>
      <a href="/karyawan/exportPdf" class="btn btn-sm btn-warning">Ekspor PDF</a>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



@endsection