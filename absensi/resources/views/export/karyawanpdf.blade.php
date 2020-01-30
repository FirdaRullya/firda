<table border="1" >
	<thead>
		<tr bgcolor="lightblue">
			<th>No</th>
			<th>Nama</th>
			<th>Tempat,Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Posisi</th>
			<th>No HP</th>
			<th>Status</th>
			<th>Alamat</th>
		</tr>
	</thead>
	<tbody>
		@php
		$no = 1;
		@endphp

		@foreach($karyawan as $kar)
		<tr>
		<td>{{ $no++ }}</td>
		<td>{{$kar->nama}}</td>
		<td>{{$kar->tempat_lahir}},{{$kar->tgl_lahir}}</td>
		<td>{{$kar->jenis_kelamin}}</td>
		<td>{{$kar->jabatan_id}}</td>
		<td>{{$kar->no_hp}}</td>
		<td>{{$kar->status}}</td>
		<td>{{$kar->alamat}}</td>
		</tr>
		
      @endforeach
	</tbody>
</table>