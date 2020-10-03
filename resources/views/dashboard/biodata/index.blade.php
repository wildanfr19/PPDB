@extends('dashboard.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h4>{{ $title }}</h4>
		<div class="box box-warning">
			<div class="box-header">
				<p>
					<button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
				</p>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
					@if(Session::has('berhasil'))
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Sukses!</h4>
				{{ Session::get('berhasil') }}
			</div>
			@endif

			@if($cek < 1)
			<form role="form" action="{{ route('biodata.store', \Auth::user()->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="box-body">
					<div class="form-group">
						<label for="namapeserta">No HP</label>
						<input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="NO HP">
					</div>
					<div class="form-group">
						<label for="nisn">Tempat Lahir</label>
						<input type="text" name="tempat_lahir" class="form-control" id="exampleInputNISN1" placeholder="Tempat Lahir">
					</div>

				

					<div class="form-group">
						<label for="nisn">Tanggal Lahir</label>
						<input type="text" name="tanggal_lahir" class="form-control datepicker" autocomplete="off" id="exampleInputNISN1" placeholder="Tanggal Lahir">
					</div>

					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" rows="5" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="alamat">Ijazah</label>
						<input type="file" name="ijazah" class="form-control"  placeholder="Ijazah">
					</div>

					<div class="form-group">
						<label for="alamat">KTP</label>
						<input type="file" name="ktp" class="form-control"  placeholder="KTP">
					</div>


				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>

			@else 

			<form role="form" action="{{ route('biodata.update', \Auth::user()->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="namapeserta">No HP</label>
						<input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="NO HP" value="{{ $dt->no_hp }}">
					</div>
					<div class="form-group">
						<label for="nisn">Tempat Lahir</label>
						<input type="text" value="{{ $dt->tempat_lahir }}" name="tempat_lahir" class="form-control" id="exampleInputNISN1" placeholder="Tempat Lahir">
					</div>

				

					<div class="form-group">
						<label for="nisn">Tanggal Lahir</label>
						<input type="text" name="tanggal_lahir" value="{{ $dt->tanggal_lahir }}" class="form-control datepicker" autocomplete="off" id="exampleInputNISN1" placeholder="Tanggal Lahir">
					</div>

					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" rows="5" class="form-control">{{ $dt->alamat }}</textarea>
					</div>

					<div class="form-group">
						<label for="alamat">Ijazah</label>
						<input type="file"  value="{{ $dt->ijazah }}" name="ijazah" class="form-control"  placeholder="Ijazah">
					</div>

					<div class="form-group">
						<label for="alamat">KTP</label>
						<input type="file" name="ktp" value="{{ $dt->ktp }}" class="form-control"  placeholder="KTP">
					</div>


				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
			@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
		
        // btn refresh
        $('.btn-refresh').click(function(e){
        	e.preventDefault();
        	$('.preloader').fadeIn();
        	location.reload();
        })
        
    })
</script>

@endsection