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
               <form role="form" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="namapeserta">Nama Sekolah</label>
                        <input type="text" name="nama" class="form-control" value="{{ $dt->nama }}" id="exampleInputEmail1" placeholder="Nama Sekolah   ">
                    </div>
                    <div class="form-group">
                        <label for="nisn">Alamat</label>
                        <textarea name="alamat" class="form-control"  placeholder="Alamat">{{ $dt->alamat }}</textarea>
                    </div>

                

                    <div class="form-group">
                        <label for="nisn">No Telp</label>
                        <input type="text" value="{{ $dt->no_telp }}" name="no_telp" class="form-control datepicker"  id="exampleInputNISN1" placeholder="No Telp">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Logo Sekolah</label>
                        <input type="file" name="photo" class="form-control"  placeholder="Ijazah">
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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
 
@endsection