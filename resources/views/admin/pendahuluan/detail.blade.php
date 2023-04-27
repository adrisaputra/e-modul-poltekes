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
			<h3 class="box-title">@if(Auth::user()->group==1) Detail @endif {{ __($title) }}</h3>
		</div>
		
		<form action="{{ url('/'.Request::segment(1).'/edit/'.$pendahuluan->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group">
						<div class="col-sm-12">
							<embed src="{{ asset('upload/pendahuluan/' . $pendahuluan->file) }}" type = "application/pdf" width = "100%" height = "1000px" />
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<div>
							<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
	</section>
</div>

@endsection