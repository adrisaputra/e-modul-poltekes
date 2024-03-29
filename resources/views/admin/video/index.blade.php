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
                    @if(Auth::user()->group==1)
					<div style="padding-top:10px">
						<a href="{{ url('/'.Request::segment(1).'/create') }}" class="btn btn-success btn-flat" title="Tambah Data">Tambah</a>
						<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
					</div>
				@endif
			</div>
			<div class="box-tools pull-right">
				<div class="form-inline">
					<form action="{{ url('/'.Request::segment(1).'/search') }}" method="GET">
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
						<th style="width: 25%">Judul</th>
						<th style="width: 25%">Link</th>
						@if(Auth::user()->group==1)
							<th style="width: 20%">#aksi</th>
						@endif
					</tr>
					@foreach($video as $v)
					<tr>
						<td>{{ ($video ->currentpage()-1) * $video ->perpage() + $loop->index + 1 }}</td>
						<td>{{ $v->judul }}</td>
						<td><a href="{{ $v->url }}">{{ $v->url }}</a></td>
						@if(Auth::user()->group==1)
							<td>
								<a href="{{ url('/'.Request::segment(1).'/edit/'.$v->id ) }}" class="btn btn-xs btn-flat btn-warning">Edit</a>
								<a href="{{ url('/'.Request::segment(1).'/hapus/'.$v->id ) }}" class="btn btn-xs btn-flat btn-danger" onclick="return confirm('Anda Yakin ?');">Hapus</a>
							</td>
						@endif
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $video->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection