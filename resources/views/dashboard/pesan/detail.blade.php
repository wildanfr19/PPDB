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
              <table class="table table-striped" cellspacing="0" width="100%">
                <tbody>
                <tr>
                    <td style="width: 10%;"><b>Judul</b></td>
                    <td style="width: 1%;"><b>:</b></td>
                    <td>{{ $data->judul }}</td> 
                </tr>
                <tr>
                  <td style="width: 10%;"><b>Users</b></td>
                  <td style="width: 1%;"><b>:</b></td>
                  <td>{{ $data->users_r->name }}</td> 
                </tr>
                <tr>
                  <td style="width: 10%;"><b>Isi Pesan</b></td>
                  <td style="width: 1%;"><b>:</b></td>
                  <td>{{ $data->keterangan }}</td> 
                </tr>
              <tr>
               <td style="width: 10%;"><b>Tanggal</b></td>
               <td style="width: 1%;"><b>:</b></td>
                <td>{{ date('d F Y H:i:s', strtotime($data->created_at)) }}</td>
                </tr>
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