@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __('TATA TERTIB LABORATORIUM') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('TATA TERTIB LABORATORIUM') }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ __('TATA TERTIB LABORATORIUM') }}</h3>
		</div>
		
		<div class="box-body">
			<div class="col-lg-12">
				
				<div class="form-group">
					<div class="col-sm-12">
						<embed src="{{ asset('upload/TATA TERTIB LABORATORIUM.pdf') }}" type = "application/pdf" width = "100%" height = "1000px" />
					</div>
				</div>
				
			</div>
		</div>
	</div>
	</section>
</div>

@endsection