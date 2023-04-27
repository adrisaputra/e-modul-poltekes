@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">{{ __($title) }}
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
					<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
					<a href="{{ url('/lihat_mahasiswa/'.$mahasiswa->kelas->id) }}" class="btn btn-danger btn-flat" title="Refresh halaman">Kembali</a>    
				</div>
			</div>
			<div class="box-tools pull-right">
				<div class="form-inline">
					<form action="{{ url('/'.Request::segment(1).'/'.$mahasiswa->id.'/search') }}" method="GET">
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
						<th style="width: 85%">Judul Job Sheet</th>
						<th style="width: 5%">#aksi</th>
					</tr>
					@foreach($job_sheet as $v)
					<tr>
						<td>{{ ($job_sheet ->currentpage()-1) * $job_sheet ->perpage() + $loop->index + 1 }}</td>
						<td>{{ $v->judul }}</td>
						<td>
							<a href="#" class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#modal-default{{$v->id}}">Lihat Langkah-langkah</a>
						</td>
					</tr>
					@endforeach
				</table>

				
				@foreach($job_sheet as $v)
					<div class="modal fade" id="modal-default{{$v->id}}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Langkah-langkah</h4>
								</div>
								<div class="modal-body">
									
								<table class="table table-bordered">
									<tr style="background-color: gray;color:white">
										<th style="width: 5%">No</th>
										<th style="width: 50%">Judul</th>
										<th style="width: 20%">Status</th>
									</tr>
									@foreach($v->modul as $x)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $x->judul }}</td>
										<td>
											@php
												$count = DB::table('baca_job_sheet_tbl')->where('modul_id',$x->id)->where('user_id',$mahasiswa->id)->count();
											@endphp
											@if($count==0)
												<span class="label label-danger">Belum Dibaca</span>
											@else
												<span class="label label-success">Sudah Dibaca</span>
											@endif
										</td>
									</tr>
									@endforeach
								</table>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $job_sheet->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection