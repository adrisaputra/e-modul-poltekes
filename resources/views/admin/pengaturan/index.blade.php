@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">{{ __('Pengaturan') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('Pengaturan') }}</a></li>
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
						<th style="width: 60px">No</th>
						<th>Judul</th>
						<th>URL</th>
						{{--<th>File</th>--}}
						<th style="width: 20%">#aksi</th>
					</tr>
					@foreach($pengaturan as $v)
					<tr>
						<td>{{ ($pengaturan ->currentpage()-1) * $pengaturan ->perpage() + $loop->index + 1 }}</td>
						<td>{{ $v->judul }}</td>
						<td>{{ $v->url }}</td>
						{{--<td><a href="{{ asset('upload/pengaturan/' . $v->file) }}" target="blank">{{ $v->file }}</a></td>--}}
						<td>
							<a href="{{ url('/pengaturan/edit/'.$v->id ) }}" class="btn btn-xs btn-flat btn-warning">Edit</a>
						</td>
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $pengaturan->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection