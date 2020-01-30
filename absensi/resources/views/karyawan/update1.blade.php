@extends('layouts.index')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-12">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Form Karyawan</h1>
          </div>
          @foreach($data as $d)
          <form class="user" method="POST" action="{{ route('karyawan.update', $d->id) }}">

            @csrf

            @method('PUT')
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label>Nama :</label>
                <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="nama" value="{{ $d->nama }}">
              </div>
              <br/>
              <div class="col-sm-6">
                <label>Posisi : </label>
                @php
                //ambil dari posisi = select * from posisi
                $rs = App\Posisi::all()
                @endphp
                <select name="posisi" class="form-control">
                  <option value="">-- Pilih Posisi --</option>
                  @foreach($rs as $row)
                  @php
                  //edit data lama
                  $sel = ($d->jabatan_id == $row->id) ? 'selected' : '';
                  @endphp
                  <option value="{{ $row->id }}" {{ $sel }}>{{ $row->posisi }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <label>Agama :</label>
                <input type="text" class="form-control form-control-user" placeholder="agama" name="agama" value="{{ $d->agama }}">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>Tempat Lahir :</label>
                  <input type="text" class="form-control " placeholder="Tempat Lahir" name="tempat_lahir" value="{{ $d->tempat_lahir}}">
                </div>
                <br/>
                <div class="col-sm-6">
                 <label>Tanggal Lahir :</label>
                 <input type="text" class="form-control " placeholder="Tanggal Lahir" name="tgl_lahir" value="{{ $d->tgl_lahir}}">
                </div>
              </div>
             
                <div class="form-group">
                <div class="col-sm-6 mb-3 mb-sm-0">
                @php
                $ar_jk = ['L','P'];
                @endphp
                <label>Jenis Kelamin : </label>
                <br/>
                @foreach($ar_jk as $jk)
                @php
                //edit data lama
                $cek = ($d->jenis_kelamin == $jk) ? 'checked' : '';
                @endphp
                <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="{{ $jk }}" {{ $cek }}>                    
                <label class="form-check-label">{{ $jk }}</label>
                </div>
                @endforeach
                </div>
                <div class="col-sm-6">
                @php
                $ar_status = ['Menikah','Belum'];
                @endphp
                <label>Status : </label>
                <br/>
                @foreach($ar_status as $status)
                @php
                //edit data lama
                $cek2 = ($d->status == $status) ? 'checked' : '';
                @endphp

                <input type="radio" class=" form-control-input" name="status" value="{{ $status }}" {{ $cek2 }}> {{ $status }} 
                @endforeach
              </div>
            
            <div class="form-group row">
              <label>Alamat : </label>
              <br/>
              <textarea name="alamat" class="form-control form-control-user">{{ $d->alamat }}</textarea>
            </div>
          
              
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label>No. Hp : </label>
                <br/>
                <input type="text" name="no_hp" value="{{ $d->no_hp }}" class="form-control form-control-user" placeholder="HP" >
              </div>
              
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>Tanggal Gabung :</label>
                  <input type="text" class="form-control form-control-user" placeholder="Tanggal Gabung" name="tgl_gabung" value="{{ $d->tgl_gabung}}">
                </div>
                
                <div class="col-sm-6">
                 <label>Tanggal Keluar :</label>
                 <input type="text" class="form-control form-control-user" placeholder="Tanggal Keluar" name="tgl_keluar" value="{{ $d->tgl_keluar}}">
                </div> 
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
              <label>Foto : </label>
              <input type="file" class="form-control-file" name="foto" value="{{ $d->foto }}">
              </div>
              </div>

            <button type="submit" class="btn btn-warning">Edit</button>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection