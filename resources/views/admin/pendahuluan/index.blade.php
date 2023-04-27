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
						<th>File</th>
						<th style="width: 15%">#aksi</th>
					</tr>
					@foreach($pendahuluan as $v)
					<tr>
						<td>{{ ($pendahuluan ->currentpage()-1) * $pendahuluan ->perpage() + $loop->index + 1 }}</td>
						<td><a href="{{ url('/'.Request::segment(1).'/detail/'.$v->id ) }}" class="btn btn-xs btn-flat btn-info">Lihat PDF</a></td>
						<td>
							<a href="{{ url('/'.Request::segment(1).'/edit/'.$v->id ) }}" class="btn btn-xs btn-flat btn-warning">Edit</a>
							</td>
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
							<img src="{{ asset('upload/pendahuluan/'.$v->gambar)}}" width="100%" height="100%">
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
			<div class="float-right">{{ $pendahuluan->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection