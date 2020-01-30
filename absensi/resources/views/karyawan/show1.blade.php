@extends('layouts.index')
@section('content')

@foreach($data as $karyawan)
<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5">
            <br/><br/>
            <center>
            @if(!empty($karyawan->foto))
            <img src="{{asset('img')}}/{{ $karyawan->foto }}" width="117%" />
            @else
            <img src="{{asset('img')}}/" width="117%" />
            @endif
          </center>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{ $karyawan->nama }}</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <label style="font-size: 10pt">Tempat Lahir : </label>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="{{ $karyawan->tempat_lahir }}" disabled="">
                  </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label style="font-size: 10pt">Tanggal Lahir : </label>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="{{ $karyawan->tgl_lahir }}" disabled="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label style="font-size: 10pt">Jenis Kelamin : </label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="{{ $karyawan->jenis_kelamin }}" disabled="">
                  </div>
                  <div class="col-sm-6">
                    <label style="font-size: 10pt">Posisi : </label>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="{{ $karyawan->posisi }}" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label style="font-size: 10pt">Alamat : </label>
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="{{ $karyawan->alamat }}" disabled="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label style="font-size: 10pt">No. Hp : </label>
                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="{{ $karyawan->no_hp }}" disabled="">
                  </div>
                  <div class="col-sm-6">
                    <label style="font-size: 10pt">Status : </label>
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="{{ $karyawan->status }}" disabled="">
                  </div>
                </div>
                <a href="{{url('/karyawan')}}" class="btn btn-warning btn-user btn-block">
                 Back
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>

@endforeach

@endsection