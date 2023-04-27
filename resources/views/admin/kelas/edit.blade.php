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
		
		<form action="{{ url('/'.Request::segment(1).'/edit/'.$kelas->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
				<div class="form-group @if ($errors->has('kelas')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Kelas') }} <span class="required" style="color: #dd4b39;">*</span></label>
						<div class="col-sm-10">
							@if ($errors->has('kelas'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('kelas') }}</label>@endif
							<input type="text" class="form-control" placeholder="Kelas" name="kelas" value="{{ $kelas->kelas }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('nama_dosen')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Nama Dosen') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('nama_dosen'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('nama_dosen') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama Dosen" name="nama_dosen" value="{{ $kelas->nama_dosen }}" >
						</div>
					</div>
                    
					<div class="form-group @if ($errors->has('ruangan')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Ruangan') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('ruangan'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('ruangan') }}</label>@endif
							<input type="text" class="form-control" placeholder="Ruangan" name="ruangan" value="{{ $kelas->ruangan }}" >
						</div>
					</div>
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