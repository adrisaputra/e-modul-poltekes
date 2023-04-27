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
			<h3 class="box-title">Tambah {{ __($title) }}</h3>
		</div>
		
		<form action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
			<div class="box-body">
				<div class="col-lg-12">

					<div class="form-group @if ($errors->has('nim')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('NIM') }} <span class="required" style="color: #dd4b39;">*</span></label>
						<div class="col-sm-10">
							@if ($errors->has('nim'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('nim') }}</label>@endif
							<input type="text" class="form-control" placeholder="NIM" name="nim" value="{{ old('nim') }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('nama')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Nama') }} <span class="required" style="color: #dd4b39;">*</span></label>
						<div class="col-sm-10">
							@if ($errors->has('nama'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('nama') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama" name="nama" value="{{ old('nama') }}" >
						</div>
					</div>
                    
					<div class="form-group @if ($errors->has('alamat')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Alamat') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('alamat'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('alamat') }}</label>@endif
							<input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}" >
						</div>
					</div>
                    
					<div class="form-group @if ($errors->has('no_hp')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('No. HP') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('no_hp'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('no_hp') }}</label>@endif
							<input type="text" class="form-control" placeholder="No. HP" name="no_hp" value="{{ old('no_hp') }}" >
						</div>
					</div>
                    
					<div class="form-group @if ($errors->has('kelas_id')) has-error @endif">
                            <label class="col-sm-2 control-label">{{ __('Kelas') }} <span class="required" style="color: #dd4b39;">*</span></label>
                            <div class="col-sm-10">
                                @if ($errors->has('kelas_id'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('kelas_id') }}</label>@endif
                                <select class="form-control select2" name="kelas_id">
                                    <option value=""> -Pilih Kelas-</option>
                                    @foreach($kelas as $v)
                                    <option value="{{ $v->id }}" @if(old('kelas_id')=="$v->id" ) selected @endif>{{ $v->kelas }}</option>
                                    @endforeach

                                </select>
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