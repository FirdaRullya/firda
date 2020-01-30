@extends('layouts.index')
@section('content')

@foreach($data as $absensi)


<div class="card o-hidden border-0 shadow-lg my-5">

  <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb">
                <span class="section-heading-upper">Informasi Absensi (Jadwal Kerja)</span>
                
              </h2>
              <ul class="list-unstyled list-hours mb-9 text-left mx-auto">

      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
           <div class="col-lg-12">
            <br/><br/>
            
          </div>
         
          <div class="col-lg-24 ml-auto">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{ $absensi->nama }}</h1>
              </div>

              <form class="user">

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Tanggal : </label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" value="{{ $absensi->tanggal }}" disabled="">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Jam Masuk Kerja : </label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" value="{{ $absensi->time_in }}" disabled="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Jam Keluar Kerja: </label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" value="{{ $absensi->time_out }}" disabled="">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Jam Istirahat : </label>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" value="{{ $absensi->time_break }}" disabled="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 ml-auto">
                    <label style="font-size: 10pt">Jam Istirahat Berakhir : </label>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" value="{{ $absensi->time_breakend}}" disabled="">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0 ml-auto">
                    <label style="font-size: 10pt">Keterangan : </label>
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" value="{{ $absensi->keterangan }}" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label style="font-size: 10pt">Posisi : </label>
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" value="{{ $absensi->karyawan_id }}" disabled="">
                </div>
              </form>
              
               
    
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
        <br/>
        <center>
         <a href="{{url('/absensi')}}" class="btn btn-dark btn-user btn">
                 Kembali
                </a>
              </center>
      </div>
    </section>



    </div>
@endforeach
@endsection