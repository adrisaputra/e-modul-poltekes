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
			<h3 class="box-title">Edit {{ __($title) }}</h3>
		</div>
		
		<form action="{{ url('/'.Request::segment(1).'/edit/'.$pendahuluan->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group @if ($errors->has('file')) has-error @endif">
                            <label class="col-sm-3 control-label">{{ __('File') }}  <span class="required" style="color: #dd4b39;">*</span></label>
					   <div class="col-sm-9">
						@if ($pendahuluan->file)
							<span class="text-red">file sebelumnya: </span><a href="{{ asset('upload/pendahuluan/' . $pendahuluan->file) }}">{{ $pendahuluan->file }}</a>
						@endif  
						@if ($errors->has('file'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('file') }}</label>@endif
						<input type="file" class="form-control" placeholder="File" name="file" value="{{ old('file') }}">
						<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 20 Mb (pdf, doc, atau xls)</i></span>
                            </div>
                        	</div>

					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
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