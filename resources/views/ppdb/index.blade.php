@extends('layouts.master')


@section('content')

<div class="container" style="margin-top: 80px">
	<div class="row">


		<div class="col-md-12">
			@if(Session::has('berhasil'))
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Sukses!</h4>
				{{ Session::get('berhasil') }}
			</div>
			@endif
			<form role="form" action="{{ route('ppdb.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="box-body">
					<div class="form-group">
						<label for="namapeserta">Nama Peserta</label>
						<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nama Peserta">
					</div>
					<div class="form-group">
						<label for="nisn">NISN</label>
						<input type="text" name="nisn" class="form-control" id="exampleInputNISN1" placeholder="NISN">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Foto Peserta</label>
						<input type="file" name="foto" id="exampleInputFile">

						<p class="help-block">Example block-level help text here.</p>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection