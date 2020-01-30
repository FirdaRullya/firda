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
              <form class="user" method="POST" action="{{ route('karyawan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="nama" value="">
                  </div>
                  <div class="form-group">
                  @php
                  //ambil dari posisi = select * from posisi
                  $rs = App\Posisi::all()
                  @endphp
                  <select name="posisi">
                    <option>-- Pilih Posisi --</option>
                    @foreach($rs as $row)
                    <option value="{{ $row->id }}">{{ $row->posisi }}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="col-sm-6">
                    @php
                    $ar_jk = ['L','P'];
                    @endphp
                    <label>Gender : </label>
                    @foreach($ar_jk as $jk)
                    
                    <input type="radio" class="form-control form-control-user" name="jenis_kelamin" value="{{ $jk }}"> {{ $jk }}
                    @endforeach
                  </div>
                </div>
                
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="agama" name="agama" value="">
                  </div>
                
                <div class="form-group row">
                  <div class="col-sm-6">
                    @php
                    $ar_status = ['Menikah','Belum'];
                    @endphp
                    <label>Status : </label>
                    @foreach($ar_status as $status)
                    
                    <input type="radio" class="form-control form-control-user" name="status" value="{{ $status }}"> {{ $status }}
                    @endforeach
                  </div>
                  
                </div>
                <button type="button" class="btn btn-warning">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection