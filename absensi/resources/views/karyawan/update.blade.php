@extends('layouts.index') 
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<div class="container">
  <div class="main">
    <div class="main-center"><br/>
      <h3>Edit Form Pegawai</h3><br/>


      @foreach($data as $d)
      <form class="user" method="POST" action="{{route('karyawan.update',$d->id)}}" enctype="multipart/form-data">
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
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Tempat Lahir : </label>
          <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik tempat lahir anda" value="{{$d->tempat_lahir}}">
        </div>
        <div class="col-sm-6">
          <label for="exampleInputEmail1">Tanggal Lahir : </label>
          <input name="tgl_lahir" value="{{$d->tgl_lahir}}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
      </div>
        <div class="form-group row">
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
          $ar_agama = ['Islam','Kristen','Hindu','Buddha','Konghuchu','Others'];
          @endphp
          <label>Agama : </label>
          <br/>
          @foreach($ar_agama as $agama)
          @php
          //edit data lama
          $cek3 = ($d->agama == $agama) ? 'checked' : '';
          @endphp
          <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" name="agama" value="{{ $agama }}" {{ $cek3 }}>                    
          <label class="form-check-label">{{ $agama }}</label>
          </div>
          @endforeach
        </div>
      </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleFormControlTextarea1">Alamat : </label>
          <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ketik alamat anda">{{ $d->alamat }}</textarea>
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
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">No. Hp : </label>
          <input name="no_hp" value="{{$d->no_hp}}" type="number" class="form-control"  aria-describedby="emailHelp" placeholder="ketik no.hp anda">
          
        </div>
        <div class="col-sm-6">
          <label for="exampleInputEmail1">Foto : </label>
          <input name="foto" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>
      </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Tanggal Gabung : </label>
          <input name="tgl_masuk" value="{{$d->tgl_gabung}}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
        <div class="col-sm-6">
          <label for="exampleInputEmail1">Tanggal Keluar : </label>
          <input name="tgl_keluar" value="{{$d->tgl_keluar}}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
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