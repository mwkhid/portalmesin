@extends('layouts.backend')

@section('title','Kalab Bebas LAB')

@section('content')
<div class="content">
<!-- Dynamic Table with Export Buttons -->
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar Bebas LAB <small>Teknik Mesin</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 30%;">Nama</th>
                    <th class="text-center" style="width: 10%;">Status</th>
                    <th class="text-center" style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">{{ $key+1}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="font-w600 font-size-sm text-center">
                         @can('kalabgetaran')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_getaran')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laborangetaran')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('laboran_getaran')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabperancangan')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_perancangan')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabmekanika')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_mekanika')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laboranmekanika')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('laboran_mekanika')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabmotor')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_motor')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laboranmotor')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('laboran_motor')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabpanas')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_panas')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laboranpanas')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('laboran_panas')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabproduksi')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_produksi')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laboranproduksi')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('laboran_produksi')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabotomasi')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_otomasi')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laboranotomasi')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('laboran_otomasi')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabmaterial')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_material')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laboranmaterial')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('laboran_material')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabpengecoran')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_pengecoran')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalanano')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_nano')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabenergi')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('kalab_energi')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laboranenergi')
                            @if(($row->statusBebaslab($row->mahasiswa_id)->pluck('laboran_energi')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                    </td>
                    <td width="250" style="text-align: center;">
                        <form action="{{route('kalab.bebaslab.update', $row->mahasiswa_id)}}" method="post">
                        @method('PATCH')
                        @csrf
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary btn-noborder btn-rounded">SETUJUI</button>
                            </div>
                        </form>
                        <!-- <a href="{{route('kalab.bebaslab.show', $row->mahasiswa_id)}}" class="btn btn-sm btn-alt-primary btn-noborder btn-rounded mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
<!-- END Dynamic Table with Export Buttons -->
</div>
@endsection
