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
		<div class="box-header with-border">
			<h3 class="box-title">Edit Pengaturan</h3>
		</div>
		
		<form action="{{ url('/pengaturan/edit/'.$pengaturan->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">

					<div class="form-group @if ($errors->has('judul')) has-error @endif">
						<label for="inputEmail3" class="col-sm-2 control-label">Judul  <span class="required" style="color: #dd4b39;">*</span></label>
						<div class="col-sm-10">
							@if ($errors->has('judul'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('judul') }}</label>@endif
							<input type="text" class="form-control" placeholder="Judul" name="judul" value="{{ $pengaturan->judul }}" >
						</div>
					</div>

					<div class="form-group @if ($errors->has('url')) has-error @endif">
						<label for="inputEmail3" class="col-sm-2 control-label">URL</label>
						<div class="col-sm-10">
							@if ($errors->has('url'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('url') }}</label>@endif
							<input type="text" class="form-control" placeholder="URL" name="url" value="{{ $pengaturan->url }}" >
						</div>
					</div>
					
					{{--<div class="form-group @if ($errors->has('file')) has-error @endif">
                            <label class="col-sm-2 control-label">{{ __('File') }} </label>
					   <div class="col-sm-10">
						@if ($pengaturan->file)
							<span class="text-red">file sebelumnya: </span><a href="{{ asset('upload/pengaturan/' . $pengaturan->file) }}">{{ $pengaturan->file }}</a>
						@endif  
						@if ($errors->has('file'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('file') }}</label>@endif
						<input type="file" class="form-control" placeholder="File" name="file" value="{{ old('file') }}">
						<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 20 Mb (pdf)</i></span>
                            </div>
                        	</div>--}}

					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<div>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
								<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</form>
	</div>
	</section>
</div>

@endsection