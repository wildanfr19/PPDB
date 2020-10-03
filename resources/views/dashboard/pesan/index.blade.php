@extends('dashboard.layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ route('pesan.add') }}" class="btn btn-sm btn-flat btn-primary" title=""><span class="glyphicon glyphicon-send"></span> Kirim</a>
                </p>
            </div>
            <div class="box-body">
               <table class="table table-bordered table-condensed myTable">
                   <thead>
                       <tr>
                           <th>#</th>
                           <th>Judul</th>
                           <th>Users</th>
                           <th>Status</th>
                           <th>Created At</th>
                           <th>View Detail</th>
                       </tr>
                   </thead>
                   <tbody>
                    @foreach($data as $e => $value)
                       <tr>
                           <td>{{ $e+1 }}</td>
                           <td>{{ $value->judul }}</td>
                           <td>{{ $value->users_r->name }}</td>
                           <td>
                               @if($value->status == NULL)
                               <label class="label label-warning">Belum Dibaca</label>
                               @else
                               <label class="label label-success">Sudah Dibaca</label>
                               @endif
                           </td>
                           <td>{{ date('d F Y H:i:s', strtotime($value->created_at)) }}</td>
                           <td>
                               <a href="{{ route('pesan.detail', $value->id) }}" title="" class="btn btn-primary btn-sm">Detail Pesan</a>
                           </td>
                       </tr>
                    @endforeach   
                   </tbody>
               </table>
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