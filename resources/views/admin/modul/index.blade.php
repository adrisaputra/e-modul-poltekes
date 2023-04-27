@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">Job Sheet "{{ $job_sheet->judul }}"
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __($title) }}</a></li>
	</ol>
	</section>
	
	<section class="content">
	<div class="box">   
		<div class="box-header with-border">
			<div class="box-tools pull-left">
				<div style="padding-top:10px">
					@if(Auth::user()->group==1)
						<a href="{{ url('/'.Request::segment(1).'/create/'.$job_sheet->id) }}" class="btn btn-success btn-flat" title="Tambah Data">Tambah</a>
					@endif
					<a href="{{ url('/'.Request::segment(1).'/'.$job_sheet->id) }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
					<a href="{{ url('/job_sheet') }}" class="btn btn-danger btn-flat" title="Refresh halaman">Kembali</a>    
				</div>
			</div>
			<div class="box-tools pull-right">
				<div class="form-inline">
					<form action="{{ url('/'.Request::segment(1).'/search/'.$job_sheet->id) }}" method="GET">
						<div class="input-group margin">
							<input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-danger btn-flat">cari</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
			
			<div class="table-responsive box-body">

				@if ($message = Session::get('status'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i>Berhasil !</h4>
						{{ $message }}
					</div>
				@endif

				<table class="table table-bordered">
					<tr style="background-color: gray;color:white">
						<th style="width: 5%">No</th>
						<th style="width: 50%">Judul</th>
						<!-- <th style="width: 15%">File</th> -->
						<th style="width: 20%">Gambar</th>
						@if(Auth::user()->group==2)
							<th style="width: 20%">Status</th>
						@endif
						@if(Auth::user()->group==1)
							<th style="width: 15%">#aksi</th>
						@endif
					</tr>
					@foreach($modul as $v)
					<tr>
						<td>{{ ($modul ->currentpage()-1) * $modul ->perpage() + $loop->index + 1 }}</td>
						<td>{{ $v->judul }}</td>
						<!-- <td><a href="{{ url('/'.Request::segment(1).'/detail/'.$job_sheet->id.'/'.$v->id ) }}" class="btn btn-xs btn-flat btn-info">Lihat PDF</a></td> -->
						<td><a href="#" data-toggle="modal" data-target="#modal-default{{ $v->id }}"><img src="{{ asset('upload/modul/'.$v->gambar)}}" width="150px" height="150px"></a></td>
						
		    				@if(Auth::user()->group==2)
							<td>
								@php
									$count = DB::table('baca_job_sheet_tbl')->where('modul_id',$v->id)->where('user_id',Auth::user()->id)->count();
								@endphp
								@if($count==0)
									<span class="label label-danger">Belum Dibaca</span>
								@else
									<span class="label label-success">Sudah Dibaca</span>
								@endif
							</td>
						@endif
						@if(Auth::user()->group==1)
							<td>
								<a href="{{ url('/'.Request::segment(1).'/edit/'.$job_sheet->id.'/'.$v->id ) }}" class="btn btn-xs btn-flat btn-warning">Edit</a>
								<a href="{{ url('/'.Request::segment(1).'/hapus/'.$job_sheet->id.'/'.$v->id ) }}" class="btn btn-xs btn-flat btn-danger" onclick="return confirm('Anda Yakin ?');">Hapus</a>
							</td>
						@else
							@if($count==0)
							<td>
								<a href="{{ url('baca_job_sheet/'.$v->id ) }}" class="btn btn-xs btn-flat btn-success" onclick="return confirm('Anda Yakin ?');">Sudah Di Baca</a>
							</td>
							@endif
						@endif
						
						</td>
					</tr>
					<div class="modal fade" id="modal-default{{ $v->id }}">
						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail Gambar</h4>
						</div>
						<div class="modal-body">
							<img src="{{ asset('upload/modul/'.$v->gambar)}}" width="100%" height="100%">
						</div>
						</div>
						<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $modul->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection