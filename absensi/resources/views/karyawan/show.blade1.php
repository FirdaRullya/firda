@extends('layouts.index')
@section('content')

@foreach($data as $karyawan)
<div class="card o-hidden border-0 shadow-lg my-5">

  <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Informasi Karyawan</span>
                <span class="section-heading-lower">Data Diri</span>
              </h2>
              <ul class="list-unstyled list-hours mb-9 text-left mx-auto">

      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
           <div class="col-lg-12">
            <br/><br/>
            <center>
            @if(!empty($karyawan->foto))
            <img src="{{asset('img')}}/{{ $karyawan->foto}}" width="50%" />
            @else
            <img src="{{asset('img')}}/image.png" width="50%">
            @endif
          </center>
          </div>
          <div class="col-lg-24 ml-auto">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{ $karyawan->nama }}</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Tempat Lahir : </label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" value="{{ $karyawan->tempat_lahir }}" disabled="">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Tanggal Lahir : </label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" value="{{ $karyawan->tgl_lahir }}" disabled="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Jenis Kelamin : </label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" value="{{ $karyawan->jenis_kelamin }}" disabled="">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Posisi : </label>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" value="{{ $karyawan->posisi }}" disabled="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 ml-auto">
                    <label style="font-size: 10pt">Agama : </label>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" value="{{ $karyawan->agama}}" disabled="">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Status : </label>
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" value="{{ $karyawan->status }}" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label style="font-size: 10pt">Alamat : </label>
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" value="{{ $karyawan->alamat }}" disabled="">
                </div>
                <div class="form-group">
                    <label style="font-size: 10pt">No. Hp : </label>
                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" value="{{ $karyawan->no_hp }}" disabled="">
                  </div>
                <a href="/karyawan" class="btn btn-warning btn-user btn-block">
                 Back
                </a>
            </div>
          </div>
        </div>
      </div>

</ul>
              <p class="address mb-10">
                <em>
                  <strong>Jln Sudirman Blok M</strong>
                  <br>
                  Jakarta, Indonesia
                </em>
              </p>
              <p class="mb-5">
                <small>
                  <em>Call Center</em>
                </small>
                <br>
                (021) 585-8468
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>



    </div>

@endforeach

@endsection