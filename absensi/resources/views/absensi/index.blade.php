@extends('layouts.index')
@section('content')
@php
$ar_judul = ['No','Nama Karyawan','Tanggal','Time In','Time Out','Keterangan' ,'Action'];
$no = 1;
@endphp

<section >
  <div class="container">
    <center>
    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/absensi.jpg" alt="">
  </center>
    <div class="about-heading-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 mx-auto">
          <div class="bg-faded rounded p-5">

            <h1 class="btn-info" align="center">Jadwal Kerja</h1>

            <!-- Button trigger modal -->
            @if(Auth::user()->role == 'admin')
            <button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus">&nbsp;Add</i>
            </button>
            @endif
            
  </form>
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

                   <form action="{{route('absensi.store')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Karyawan</label>
                      <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik nama lengkap anda">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Tanggal">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Time In</label>
                      <input name="time_in" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="00:00:00">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Time Out</label>
                      <input name="time_out" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="00:00:00">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Time Break</label>
                      <input name="time_break" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="00:00:00">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Time End Break</label>
                      <input name="time_breakend" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="00:00:00">
                    </div>
 
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Keterangan</label>
                      <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1"  placeholder="Keterangan"></textarea>
                    </div>
                    <div class="form-group">
                      @php

                      $rs = App\Karyawan::all();
                      @endphp
                      <label for="exampleFormControlSelect1">ID Karyawan</label>
                      <select name="jabatan_id" class="form-control" id="exampleFormControlSelect1" >
                        <option value="">Pilih ID</option>
                        @foreach($rs as $row)
                        <option value="{{$row->id}}">{{$row->nama}}</option>
                        @endforeach
                      </select>
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

<br/><br/>
 <table class="table table-hover" >
           <thead class="thead-dark">
            <tr>
             @foreach($ar_judul as $jdl)
             <th>{{ $jdl }}</th>
             @endforeach
           </tr>
         </thead>
         <tbody>
         @foreach($data_absensi as $ab)
         <tr class="table-light">
          <td>{{ $no++ }}</td>
          <td>{{ $ab->nama }}</td>
          <td>{{ $ab->tanggal }}</td>
          <td>{{ $ab->time_in }}</td>
          <td>{{ $ab->time_out }}</td>
          <td>{{ $ab->keterangan }}</td>
         <td>
          <form method="POST" action="{{route('absensi.destroy',$ab->id)}}">
            <a href="{{ route('absensi.show', $ab
            ->id)}}" class="btn btn-dark btn-sm"><i class="fas fa-address-card"></i></a>
            &nbsp; &nbsp;
            @if(Auth::user()->role == 'admin')
            <a href="/absensi/{{$ab->id}}/edit" class="btn btn-dark btn-sm"><i class="fas fa-pencil-alt"></i></a>
            &nbsp; &nbsp;
             {{csrf_field()}}
            @method('DELETE')
           <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('Yakin Mau Di Hapus?')"><i class="fas fa-trash-alt"></i>
            </button>
            @endif
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      </table>



             
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