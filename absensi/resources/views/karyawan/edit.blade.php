@extends('layouts.index')
@section('content')
<h1>Edit Data Karyawan</h1>
	<div class="row">	
	<div class="col-lg-12">

 <form action="/karyawan/{{$karyawan->id}}/update" method="POST">
 	{{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputEmail1">Nama Lengkap</label>
    <input name="nama_karyawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik nama lengkap anda" value="{{$karyawan->nama_karyawan}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tanggal Lahir</label>
    <input name="tgl_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD" value="{{$karyawan->tgl_lahir}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1" >
    	<option value="">Pilih Jenis Kelamin</option>
    	<option value="L" @if($karyawan->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
    	<option value="P" @if($karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Agama</label>
    <select name="agama" class="form-control" id="exampleFormControlSelect1" >
    	<option value="">Pilih Agama</option>
    	<option value="Islam" @if($karyawan->agama == 'Islam') selected @endif>Islam</option>
      <option value="Kristen" @if($karyawan->agama == 'Kristen') selected @endif>Kristen</option>
      <option value="Hindu" @if($karyawan->agama == 'Hindu') selected @endif>Hindu</option>
      <option value="Buddha" @if($karyawan->agama == 'Buddha') selected @endif>Buddha</option>
      <option value="Konghuchu" @if($karyawan->agama == 'Konghuchu') selected @endif>Konghuchu</option>
      <option value="Others" @if($karyawan->agama == 'Others') selected @endif>Others</option>
    </select>
  </div>
  <div class="form-group">
  	<label for="exampleFormControlTextarea1">Alamat</label>
  	<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ketik alamat anda">{{$karyawan->alamat}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tanggal Gabung</label>
    <input name="tgl_masuk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD" value="{{$karyawan->tgl_masuk}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tanggal Keluar</label>
    <input name="tgl_keluar" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD" value="{{$karyawan->tgl_keluar}}">
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
  </form>
</div>
    </div>
  </div>
</div>

@endsection