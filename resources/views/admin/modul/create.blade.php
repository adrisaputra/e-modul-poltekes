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
			<h3 class="box-title">Tambah {{ __($title) }}</h3>
		</div>
		
		<form action="{{ url('/'.Request::segment(1).'/'.$job_sheet->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
			<div class="box-body">
				<div class="col-lg-12">

					<div class="form-group @if ($errors->has('judul')) has-error @endif">
						<label class="col-sm-3 control-label">{{ __('Judul Langkah-langkah') }} <span class="required" style="color: #dd4b39;">*</span></label>
						<div class="col-sm-9">
							@if ($errors->has('judul'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('judul') }}</label>@endif
							<input type="text" class="form-control" placeholder="Judul Langkah-langkah" name="judul" value="{{ old('judul') }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('file')) has-error @endif">
                            <label class="col-sm-3 control-label">{{ __('File') }} </label>
                            <div class="col-sm-9">
                                @if ($errors->has('file'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('file') }}</label>@endif
                                <input type="file" class="form-control" placeholder="File" name="file" value="{{ old('file') }}">
                                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 20 Mb (pdf, doc, atau xls)</i></span>
                            </div>
                        </div>

					<div class="form-group @if ($errors->has('gambar')) has-error @endif">
                            <label class="col-sm-3 control-label">{{ __('Gambar') }} </label>
                            <div class="col-sm-9">
                                @if ($errors->has('file'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('gambar') }}</label>@endif
                                <input type="file" class="form-control" placeholder="Gambar" name="gambar" value="{{ old('gambar') }}">
                                <span style="font-size:11px"><i>Ukuran Gambar Tidak Boleh Lebih Dari 20 Mb (pdf, doc, atau xls)</i></span>
                            </div>
                        </div>

					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
								<a href="{{ url('/'.Request::segment(1).'/'.$job_sheet->id) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
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