@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __($title) }} di Job Sheet "{{ $job_sheet->judul }}"
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __($title) }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Edit {{ __($title) }}</h3>
		</div>
		
		<form action="{{ url('/'.Request::segment(1).'/edit/'.$job_sheet->id.'/'.$modul->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group @if ($errors->has('judul')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Judul Langkah-langkah') }} </label>
						<div class="col-sm-10">
							@if ($errors->has('judul'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('judul') }}</label>@endif
							<input type="text" class="form-control" placeholder="Judul Langkah-langkah" name="judul" value="{{ $modul->judul }}" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('File') }} </label>
						<div class="col-sm-10">
							<embed src="{{ asset('upload/modul/' . $modul->file) }}" type = "application/pdf" width = "100%" height = "1000px" />
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<div>
							<a href="{{ url('/'.Request::segment(1).'/'.$job_sheet->id) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
	</section>
</div>

@endsection