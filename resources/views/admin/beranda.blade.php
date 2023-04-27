@extends('admin/layout')
@section('konten')

<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">
		
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
	</ol>
	</ol>
	</section>
	
	<section class="content">
	
	<div class="box-body">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<!-- ./col -->
				@if(Auth::user()->group == 1)
					
					<div class="col-lg-4 col-xs-12">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
							<h3>{{ $mahasiswa }}</h3>

							<p>Total Mahasiswa</p>
							</div>
							<div class="icon">
							<i class="fa fa-box"></i>
							</div>
							<a href="{{ url('mahasiswa') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					
					<div class="col-lg-4 col-xs-12">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
							<h3>{{ $job_sheet }}</h3>

							<p>Total Job SHeet</p>
							</div>
							<div class="icon">
							<i class="fa fa-box"></i>
							</div>
							<a href="{{ url('job_sheet') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					
					<div class="col-lg-4 col-xs-12">
						<!-- small box -->
						<div class="small-box bg-red">
							<div class="inner">
							<h3>{{ $user }}</h3>

							<p>Total User</p>
							</div>
							<div class="icon">
							<i class="fa fa-box"></i>
							</div>
							<a href="{{ url('user') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					
				@elseif(Auth::user()->group == 2)
				<center>
					<img src="{{ asset('/upload/logo/poltekes.png') }}" width="150px">

					{{--<p style="font-size:20px;font-weight:bold;margin-top:20px">VISI MISI PRODI DIII KEBIDANAN POLTEKKES KEMENKES KENDARI</p>--}}

					<p style="font-size:18px;font-weight:bold;margin-top:20px">VISI PRODI DIII KEBIDANAN POLTEKKES KEMENKES KENDARI :</p>
					<p>Menghasilkan Tenaga Bidan yang Unggul dalam Memberikan Pelayanan Kebidanan Komunitas dan Berwawasan Maritim 
					Pada Tahun 2021<p>

					<p style="font-size:18px;font-weight:bold;margin-top:20px">MISI PRODI DIII KEBIDANAN POLTEKKES KEMENKES KENDARI :</p>
				</center>
					<p style="margin-left:100px;margin-right:100px;text-align: justify">1. Menyelenggarakan  pendidikan  tinggi  kebidanan  dan  mengembangkan ilmu  pengetahuan  dan  teknologi  yang  sesuai  dengan  tuntutan  profesi dalam pelayanan asuhan kebidanan.<br>
					2. Menyelenggarakan penelitian dan pengabdian kepada masyarakat dalam rangka mengembangkan dan mengaplikasikan ilmu pengetahuan dan teknologi khususnya di bidang kebidanan dan kesehatan.<br>
					3. Menghasilkan Ahli Madya Kebidanan yang unggul   berwirausaha dalam mengaplikasikan pengetahuan dan keterampilan klinik kebidanan berperilaku yang professional, kompeten serta berkemampuan dalam pelayanan Kebidanan yang didasari etika kebidanan yang dapat bersaing baik secara nasional maupun Global.</p>
				
				@endif
			</div>
			<!-- /.row -->
	</section>
</div>
@endsection