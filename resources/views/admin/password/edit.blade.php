@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __('GANTI PASSWORD') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('GANTI PASSWORD') }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Ganti Password</h3>
		</div>
		
		<form action="{{ route('user.password.update') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		@method('patch')
          @csrf
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group @if ($errors->has('current_password')) has-error @endif">
						<label for="inputEmail3" class="col-sm-2 control-label">Password Lama</label>
						<div class="col-sm-10">
							@if ($errors->has('current_password'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('current_password') }}</label>@endif
							<input type="password" class="form-control" placeholder="Password Lama" name="current_password">
							
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('password')) has-error @endif">
						<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							@if ($errors->has('password'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>@endif
							<input type="password" class="form-control" placeholder="Password" name="password">
							
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
						<label for="inputEmail3" class="col-sm-2 control-label">Konfirmasi Password</label>
						<div class="col-sm-10">
							@if ($errors->has('password_confirmation'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password_confirmation') }}</label>@endif
							<input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation">
							
							<div style="padding-top:10px">
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
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