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
					<a href="{{ url('/'.Request::segment(1).'/'.$kelas->id) }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
				</div>
			</div>
			<div class="box-tools pull-right">
				<div class="form-inline">
					<form action="{{ url('/'.Request::segment(1).'/'.$kelas->id.'/search') }}" method="GET">
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
						<th style="width: 25%">NIM</th>
						<th style="width: 25%">Nama Mahasiswa</th>
						<th style="width: 25%">Kelas</th>
						<th style="width: 20%">#aksi</th>
					</tr>
					@foreach($mahasiswa as $v)
					<tr>
						<td>{{ ($mahasiswa ->currentpage()-1) * $mahasiswa ->perpage() + $loop->index + 1 }}</td>
						<td>{{ $v->nim }}</td>
						<td>{{ $v->nama }} </td>
						<td>{{ $v->kelas->kelas }} </td>
						<td>
							<a href="{{ url('/lihat_job_sheet/'.$v->id ) }}" class="btn btn-xs btn-flat btn-info">Lihat Job Sheet</a>
						</td>
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $mahasiswa->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection