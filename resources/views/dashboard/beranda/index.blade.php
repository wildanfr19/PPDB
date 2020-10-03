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
						<div class="col-md-4">

					
							@if(\Auth::user()->role == 1)
							<p><h3>Selamat Datang Administrator</h3></p>
							@else
							<center>	
								<h1>
										{{ $pesan }}
								</h1>
						    </center>
							@endif

								@if(\Auth::user()->role == NULL)
								<center>
									<a target="_blank" href="{{ route('cetak.exportpdf') }}" class="btn btn-success" title="">Cetak bukti pendaftaran</a>
								</center>
								@endif
						</div>
						<div class="col-md-4">
							<center>
								@if(\Auth::user()->role == NULL)
								 <h1>
								  {{ $status }}
								</h1>
								@endif
							</center>

						</div>
						<div class="col-md-4">
							<center>
								@if(\Auth::user()->role == NULL)

								 <h1>
								  {{ $pesan_lulus }}
								</h1>
								@endif
							</center>

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