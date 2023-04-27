<!DOCTYPE html>
@php
    $link_ujian = DB::table('pengaturan_tbl')->first();
@endphp
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>E-Modul Poltekes</title>
        <link href="{{ asset('/upload/logo/poltekes.png') }}" rel="icon">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/Ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-plugin/iCheck/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-plugin/timepicker/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-dist/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker|Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400&display=swap" rel="stylesheet"> 
        <style type="text/css">
            .fontQuicksand{
                font-family: 'Quicksand', sans-serif;
            }

            .fontPoppins{
                font-family: 'Poppins', sans-serif;
            }

            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
            }

            .preloader .loading {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                font: 14px arial;
            }

            .dropzone {
                border: 2px dashed #0087F7;
            }
        </style>
        
        
        <script>
			
			function formatRupiah(objek, separator) {
                  a = objek.value;
                  b = a.replace(/[^\d]/g,"");
                  c = "";
                  panjang = b.length;
                  j = 0;
                  for (i = panjang; i > 0; i--) {
                    j = j + 1;
                    if (((j % 3) == 1) && (j != 1)) {
                      c = b.substr(i-1,1) + separator + c;
                    } else {
                      c = b.substr(i-1,1) + c;
                    }
                  }
                  objek.value = c;
            }
                
        </script>

    </head>

    <body class="default sidebar-mini skin-blue-light fontPoppins">
        <div class="preloader">
			<div class="loading text-center">
				<img src="{{ asset('/assets/core-images/load.gif') }}" width="50">
                <br>
				<p><b class="fontPoppins">Harap Tunggu</b></p>
			</div>
		</div>
        <div class="wrapper">
            <header class="main-header">
                <a href="" class="logo">
                    <span class="logo-lg"><b>E-MODUL</b></span>
                </a>
                
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="user-image" alt="User Image">                                
						  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="img-circle" alt="User Image">                                        
								<p>
                                    {{ Auth::user()->name }}                                            
								    <small>Member since<br> {{ Auth::user()->created_at }} </small>
                                        </p>
                                    </li>
                                    
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ url('/password') }}" class="btn btn-default btn-flat">Ganti Password</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-google btn-flat">Sign out</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="img-circle" alt="User Image">                        
					</div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }}  </p>                            
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>

                        @if(Auth::user()->group==1)
                        <li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}"><a href="{{ url('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li class="{{ (request()->is('pendahuluan*')) ? 'active' : '' }}"><a href="{{ url('pendahuluan')}}"><i class="fa fa-list text-yellow" ></i> <span>Pendahuluan</span></a></li>
                        <li class="{{ (request()->is('job_sheet*')) ? 'active' : '' }}"><a href="{{ url('job_sheet')}}"><i class="fa fa-list text-yellow" ></i> <span>Job Sheet</span></a></li>
                        <li class="{{ (request()->is('kelas*')) ? 'active' : '' }}"><a href="{{ url('kelas')}}"><i class="fa fa-list text-green" ></i> <span>Kelas</span></a></li>
                        <li class="{{ (request()->is('mahasiswa*')) ? 'active' : '' }}"><a href="{{ url('mahasiswa')}}"><i class="fa fa-list text-blue" ></i> <span>Mahasiswa</span></a></li>
                        <li class="{{ (request()->is('video*')) ? 'active' : '' }}"><a href="{{ url('video')}}"><i class="fa fa-image text-red" ></i> <span>Video</span></a></li>
                        <li class="{{ (request()->is('post_test*')) ? 'active' : '' }}"><a href="{{ url('post_test')}}"><i class="fa fa-list text-green" ></i> <span>Post Test</span></a></li>
                        <li class="header">CORE BASE</li>
                        <li class="{{ (request()->is('pengaturan*')) ? 'active' : '' }}"><a href="{{ url('pengaturan')}}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>
                        <li class="{{ (request()->is('user*')) ? 'active' : '' }}"><a href="{{ url('user')}}"><i class="fa fa-user"></i> <span>User</span></a></li>
                        @endif

                        @if(Auth::user()->group==2)
                            <li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}"><a href="{{ url('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                            <li class="{{ (request()->is('pendahuluan*')) ? 'active' : '' }}"><a href="{{ url('/pendahuluan/detail/1') }}"><i class="fa fa-list text-yellow" ></i> <span>Pendahuluan</span></a></li>
                            <li class="{{ (request()->is('petunjuk_penggunaan*')) ? 'active' : '' }}"><a href="{{ url('petunjuk_penggunaan') }}"><i class="fa fa-book text-red"></i> <span>Petunjuk Penggunaan</a></li>  
                            <li class="{{ (request()->is('tata_tertib*')) ? 'active' : '' }}"><a href="{{ url('tata_tertib') }}"><i class="fa fa-book text-red"></i> <span>Tata tertib</a></li>  
                            <li class="{{ (request()->is('video*')) ? 'active' : '' }}"><a href="{{ url('video')}}"><i class="fa fa-image text-red" ></i> <span>Video</span></a></li>
                            <li class="{{ (request()->is('job_sheet*')) ? 'active' : '' }}"><a href="{{ url('job_sheet')}}"><i class="fa fa-list text-yellow"></i> <span>Job Sheet</a></li>  
                            <li class="#"><a href="{{ $link_ujian->url }}" target="_blank"><i class="fa fa-list text-blue"></i> <span>Link Ujian</a></li>  
                        @endif

                    </ul>
                </section>
            </aside><!-- Styles -->

		  @yield('konten')

		             
		  <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.0.1
                </div>
               
            </footer>
            
        </div>
       
        <script src="{{ asset('/assets/core-admin/core-component/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-plugin/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-plugin/iCheck/icheck.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-dist/js/demo.js') }}"></script>
        
        
        <script>
            $(document).ready(function () {
              $('.sidebar-menu').tree();
              $('.preloader').fadeOut();

              $("#rowpage").change(function(){
					var row = $("#rowpage").val();
					$.ajax({
						type      : "POST",
						url       : "{{ asset('/admin/setting/setRows",
						data      : {row: row},
						success   : function(msg){
							location.reload();
						}
					});
				});

                //Select2
                $('.select2').select2();
                //Date picker
                
                $('.datepicker').datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd'
                })
                
                //Date range picker
                $('.reservation').daterangepicker()
                
                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass   : 'iradio_minimal-blue'
                });

                //Colorpicker
                $('.colorpicker').colorpicker();

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: true
                });

            })
        </script>    
    </body>
</html>