@extends('layouts.index')
@section('content')
<h1>Edit Posisi</h1>
	<div class="row">	
	<div class="col-lg-12">

 <form action="{{route('posisi.update',$d->id)}}" method="POST">
 	{{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputEmail1">Posisi</label>
    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan posisi anda" value="{{$pos->nama}}">
  </div>
  
     
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
  </form>
</div>
    </div>
  

@endsection