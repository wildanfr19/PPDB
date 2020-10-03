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

             <form role="form" method="post" action="{{ route('verifikasi.store') }}">
                @csrf
               <div class="box-body">
                 <div class="form-group">
                   <label for="exampleInputEmail1">ID Pendaftaran</label>
                   <input type="text" class="form-control" name="id_pendaftaran" id="exampleInputEmail1" placeholder="ID Pendaftaran">
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