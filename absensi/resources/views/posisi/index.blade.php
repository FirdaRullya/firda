@extends('layouts.index')
@section('content')
<section class="page-section about-heading">
  <div class="container">
    <center>
    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/gdg.jpg" alt="">
  </center>
    <div class="about-heading-content">
      <div class="row">
        <div class="col-xl-9 col-lg-12 mx-auto">
          <div class="bg-faded rounded p-5">
    <h1 class="btn-info" align="center">Data Posisi </h1>

    <!-- Button trigger modal -->
    @if(Auth::user()->role == 'admin')
    <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus">Add</i>
    </button>
    @endif
<br/>
<br/>

  <table class="table table-hover" >
   <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Nama Posisi</th>
      <th></th>
      
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach($ar_posisi as $pos)
    <tr class="table-light">
      <td>{{ $no++ }}</td>
      <td>{{$pos->posisi}}</td>
      <td>
        <form method="POST" action="{{route('posisi.destroy',$pos->id)}}">
      
        @if(Auth::user()->role == 'admin')
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
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Posisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <form action="{{ route('posisi.store') }}" method="POST">
        {{csrf_field()}}

        <div class="form-group">
          <label for="exampleInputEmail1">Posisi</label>
          <input name="posisi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan posisi anda">
        </div>

        <div class="modal-footer">
          
          <button type="submit" class="btn btn-warning">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection