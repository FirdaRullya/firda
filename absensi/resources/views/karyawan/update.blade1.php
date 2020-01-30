@extends('layouts.index') 
@section('content')


<div class="container">
  <div class="main">
    <div class="main-center">
      <h3>Edit Form Pegawai</h3>


      @foreach($data as $d)
      <form class="user" method="POST" action="{{route('karyawan.update',$d->id)}}">
        @csrf
        @method('PUT')      
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input name="nama_karyawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik nama lengkap anda" value="{{$d->nama}}">
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
                    @php
                    $ar_jk = ['L','P'];
                    @endphp
                    <label>Jenis Kelamin : </label>
                    <br/>
                    @foreach($ar_jk as $jk)
                     @php
                    //edit data lama
                    $cek = ($d->jenis_kelamin == $jk)? 'checked' : '';
                    @endphp
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="{{ $jk }}" {{ $cek }}>
                      <label class="form-check-label">{{ $jk }}</label>
                    </div>
                    @endforeach
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Tempat Lahir</label>
          <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik tempat lahir anda" value="{{$d->tempat_lahir}}">
          </div>
       
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
          <input name="tgl_lahir" value="{{$d->tgl_lahir}}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
         </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          @php
          //ambil dari table posisi = select * from posisi
          $rs1 = App\Posisi::all();
          @endphp
          <label for="jabatan_id">Posisi</label>
          <select name="jabatan_id" class="form-control" id="exampleFormControlSelect1" >
            <option value="">Pilih Posisi</option>
            @foreach($rs1 as $row1)
                    @php
                    //edit data lama
                    $sel2 = ($d->jabatan_id == $row1->posisi) ? 'selected' : '';
                    @endphp
                    <option value="{{ $row1->posisi }}" {{ $sel2 }}>{{ $row1->posisi }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
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
      </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">No. Hp</label>
          <input name="no_hp" value="{{$d->no_hp}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ketik no.hp anda">
        </div>
         <div class="col-sm-6 mb-3 mb-sm-0">
                    @php
                    $ar_status = ['Menikah','Belum'];
                    @endphp
                    <label>Status : </label><br/>
                    @foreach($ar_status as $status)
                    @php
                    //edit data lama
                    $cek2 = ($d->status==$status)? 'checked' : '';
                    @endphp
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" value="{{ $status }}" {{ $cek2 }}>
                      <label class="form-check-label">{{ $status }}</label>
                    </div>
                    @endforeach
                  </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Tanggal Gabung</label>
          <input name="tgl_masuk" value="{{$d->tgl_gabung}}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleInputEmail1">Tanggal Keluar</label>
          <input name="tgl_keluar" value="{{$d->tgl_keluar}}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
        </div>
      </div>
        <div class="form-group row">

        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ketik alamat anda">{{ $d->alamat }}</textarea>
        </div>
         <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="foto">Foto</label>
          <input name="foto" type="file" class="form-control-file"  value="{{$d->foto}}" {{$d->foto}}>
        </div>
      </div>
        <br/>
       
        <button type="submit"  class="btn btn-primary">SIMPAN</button>
        
      </form>

      @endforeach
    </div><!--main-center"-->
  </div><!--main-->
</div><!--container-->
</div>

</body>
</html>

@endsection