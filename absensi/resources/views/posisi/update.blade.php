@extends('layouts.index')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<div class="container">
  <div class="main">
    <div class="main-center"><br/>
      <h1>Edit Posisi</h1><br/>
@foreach($data as $d)
 <form action="{{route('posisi.update',$d->id)}}" method="POST">
 	{{csrf_field()}}

  <div class="form-group">
    <input name="posisi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan posisi anda" value="{{$d->posisi}}">
  </div>
  
     
      <div class="modal-footer">
        <button value="{{url('/karyawan')}}" type="submit" class="btn btn-warning">Update</button>
      </div>
  </form>
@endforeach
</div>
    </div>
  </div>
</div>
</div>

  

@endsection