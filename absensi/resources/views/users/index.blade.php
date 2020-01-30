@extends('layouts.index')
@section('content')
@php
$ar_judul = ['No','Nama','Email','Akses','Action'];
$no = 1;
@endphp

<section>
  <div class="container">
    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/about.jpg" alt="">
    <div class="about-heading-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 mx-auto">
          <div class="bg-faded rounded p-5">

            <h1 class="btn-info" align="center">Data User</h1>

            <!-- Button trigger modal -->
            

<nav class="navbar navbar-light">
  <button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus">&nbsp;Add</i></button>
  <form class="form-inline" method="GET" action="/register">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-info btn-sm" type="submit" value="user">Search</button>
  </form>
</nav>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                   <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Akses') }}</label>

                            <div class="col-md-6">
                            @php
                            //ambil dari role = select * from role
                            $rs = App\Role::all()
                            @endphp
                            <select name="role">
                            <option>-- Pilih Akses Anda --</option>
                            @foreach($rs as $row)
                            <option value="{{ $row->id }}">{{ $row->role }}</option>
                            @endforeach
                            </select>
                                <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <br/>	
          <br/>
          <table class="table table-hover" >
           <thead class="thead-dark">
            <tr>
             @foreach($ar_judul as $jdl)
             <th>{{ $jdl }}</th>
             @endforeach
           </tr>
         </thead>
         <tbody>
         @foreach($data_user as $user)
         <tr class="table-light">
          <td>{{ $no++ }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->password }}</td>
          <td>{{ $user->role }}</td>
          <td width="20%">
            <center>
            <form method="POST" action="{{route('user.destroy',$user->id)}}">
            <a href="{{ route('user.show', $user->id)}}" class="btn btn-dark btn-sm"><i class="fas fa-address-card"></i></a>
            &nbsp; &nbsp;
            <a href="{{ route('user.edit', $user->id)}}" class="btn btn-dark btn-sm"><i class="fas fa-pencil-alt"></i></a>
            &nbsp; &nbsp;
            {{csrf_field()}}
            @method('DELETE')
            <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('Yakin Mau Di Hapus?')"><i class="fas fa-trash-alt"></i>
            </button>
          </center>
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