@extends('dashboard.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
 
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ route('peserta.index')}}" class="btn btn-sm btn-flat btn-primary btn-refresh" title=""><i class="fa fa-refresh"></i> All Peserta</a>

                    <a href="{{ route('peserta.diverifikasi')}}" class="btn btn-sm btn-flat btn-success btn-refresh" title=""><i class="fa fa-refresh"></i> Verifikasi</a>

                    <a href="{{ route('peserta.belom_verifikasi')}}" class="btn btn-sm btn-flat btn-danger btn-refresh" title=""><i class="fa fa-refresh"></i>Belom Verifikasi</a>


           
            </div>
            <div class="box-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover myTable">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Action</th>
                             <th>Photo</th>
                             <th>Nama</th>
                             <th>NISN</th>
                             <th>Email</th>
                             <th>ID Registrasi</th>
                             <th>No HP</th>
                             <th>Alamat</th>
                             <th>Biodata</th>
                             <th>Status Verifikasi</th>
                             <th>Download Dokumen</th>
                             <th>Status Lulus</th>
                         </tr>
                     </thead>
                     <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $row => $dt)
                        <tr>
                         <td>{{ $no++ }}</td>
                         <td>
                            <div style="width: 60px">
                                 <a href="{{ route('peserta.edit', $dt->id) }}" class="btn btn-xs btn-flat btn-primary" title=""><span class="glyphicon glyphicon-edit"></span></a>

                             <button href="{{ route('peserta.delete', $dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"> <span class="glyphicon glyphicon-trash"></span></button>
                            </div>
                            
                         </td>
                         <td>
                            <img src="{{ asset($dt->foto) }}" style="width: 60px">
                        </td>
                         <td>{{ $dt->name }}</td>
                         <td>{{ $dt->nisn }}</td>
                         <td>{{ $dt->email }}</td>
                         <td>{{ $dt->id_registrasi }}</td>
                         <td>
                            @if($dt->biodata_r->no_hp === NULL)
                            <p><i>-</i></p>
                            @else
                            {{ $dt->biodata_r->no_hp }}
                            @endif    
                        </td>
                        <td>
                            @if($dt->biodata_r->no_hp === NULL)
                            <p><i>-</i></p>
                            @else
                            {{ $dt->biodata_r->alamat }}
                            @endif  
                        </td>
                        <td>
                            @if($dt->biodata_r_count > 0)
                               <label class="label label-success">Sudah Melengkapi</label>
                            @else  
                                <label class="label label-danger">Belum Melengkapi</label>
                            @endif    
                        </td>
                        <td>
                            @if($dt->is_verifikasi == 1)
                               <label class="label label-success">Sudah Verifikasi</label>
                            @else  
                                <label class="label label-danger">Belum Verifikasi</label>
                            @endif    
                        </td>
                        <td>
                            <p>
                                <a download="" href="{{ asset($dt->biodata_r->ijazah) }}" class="btn btn-xs btn-success" title="">Download Ijazah</a>

                                <a download="" href="{{ asset($dt->biodata_r->ktp) }}" class="btn btn-xs btn-warning" title="">Download KTP</a>

                            </p>
                        </td>
                        <td>
                            @if($dt->islulus == NULL)
                            <a  href="{{ route('peserta.luluskan', $dt->id) }}" class="btn btn-xs btn-primary" title="">Luluskan</a>
                            @else

                            <label class="label label-info">Sudah Lulus</label>
                            @endif

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