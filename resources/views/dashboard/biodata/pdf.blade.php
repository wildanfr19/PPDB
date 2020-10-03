<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pendaftaran</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 
    {{-- <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> --}}
 
   
   
</head>
<body>
   
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center>
						
					<img src="{{ asset('$sk->photo') }}" style="width: 200px" alt=""> 

				</center>
				<br>
				<br>
				<table class="table">
					<tbody>
						<tr>
							<td>Nama Sekolah</td>
							<td>:</td>
							<td>{{ $sk->nama }}</td>
						</tr>


						<tr>
							<td>No Telp</td>
							<td>:</td>
							<td>{{ $sk->no_telp }}</td>
						</tr>

						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>{{ $sk->alamat }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<br>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table" border="1">
					<thead>
						<tr>
							<th width="100px">Nama</th>
							<th width="100px">Email</th>
							<th width="100px">Alamat</th>
							<th width="100px">NO HP</th>
							<th width="100px">Tempat lahir</th>
							<th width="100px">No REGISTRASI</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $dt->name }}</td>
							<td>{{ $dt->email }}</td>
							<td>{{ $dt->biodata_r->alamat }}</td>
							<td>{{ $dt->biodata_r->no_hp }}</td>
							<td>{{ $dt->biodata_r->tempat_lahir }}</td>
							<td>{{ $dt->id_registrasi }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>