@extends('layouts.index') 
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<div class="container">
  <div class="main">
    <div class="main-center"><br/>
      <h3>Edit Form Absensi</h3><br/>


      @foreach($data as $d)
      <form class="user" method="POST" action="{{route('absensi.update',$d->id)}}" enctype="multipart/form-data">
         {{csrf_field()}}
        @method('PUT')      
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Nama Lengkap : </label>
          <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik nama lengkap anda" value="{{$d->nama}}">
        </div>
        <div class="col-sm-6">
          <label>Posisi : </label>
                @php
                //ambil dari posisi = select * from posisi
                $rs = App\Posisi::all()
                @endphp
                <select name="jabatan_id" class="form-control">
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
      </div>
        <div class="col-sm-6">
          <label for="exampleInputEmail1">Tanggal : </label>
          <input name="tanggal" value="{{$d->tanggal}}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
      </div>
        
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Time-in : </label>
          <input name="time_in" value="{{$d->time_in}}" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
        <div class="col-sm-6">
          <label for="exampleInputEmail1">Time-out : </label>
          <input name="time_out" value="{{$d->time_out}}" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
      </div>

      <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Time-break : </label>
          <input name="time_break" value="{{$d->time_break}}" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
        <div class="col-sm-6">
          <label for="exampleInputEmail1">Time-breakend : </label>
          <input name="time_out" value="{{$d->time_breakend}}" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
      </div>

      <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Keterangan : </label>
          <input name="keterangan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik nama lengkap anda" value="{{$d->keterangan}}">
        </div>
        <br/>
        <center>
        <button value="" type="submit" class="btn btn-dark">Ubah</button>
      </center>
        <br/>
      </form>

      @endforeach
    </div>
    </div>
    </div><!--main-center"-->
  </div><!--main-->
</div><!--container-->

</body>
</html>

@endsection