<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

	

  	<title>AdminLTE</title>


  	<!-- Google Font: Source Sans Pro -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<meta name="csrf-token" content="{{ csrf_token() }}">

  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  	{{-- Select --}}
	<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" id="app">
  	<!-- Navbar -->
  	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    	<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-comments"></i>
				<span class="badge badge-danger navbar-badge">
					3
				</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<a href="#" class="dropdown-item">
					
					<div class="media">
					<img src="#" alt="User Avatar" class="img-size-50 mr-3 img-circle">
					<div class="media-body">
						<h3 class="dropdown-item-title">
						Brad Diesel
						<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
						</h3>
						<p class="text-sm">Call me whenever you can...</p>
						<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
					</div>
					</div>
				
				</a>
				<div class="dropdown-divider"></div>
				
				
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
				</div>
			</li>
			
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-bell"></i>
				<span class="badge badge-warning navbar-badge">15</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">15 Notifications</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-envelope mr-2"></i> 4 new messages
					<span class="float-right text-muted text-sm">3 mins</span>
				</a>
				
				
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			</li>      
		</ul>
  	</nav>
  	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="#" class="brand-link">
		<img src="#"  class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
				<img src="#" class="img-circle elevation-2" alt="">
				</div>
				<div class="info">
				<a href="#" class="d-block">Alexander</a>
				</div>
			</div>

			<!-- SidebarSearch Form -->
			<div class="form-inline">
				<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
					<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="nav-item">
						<a href="{{ url('admin/home') }}" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
						<i class="nav-icon far fa-image"></i>
						<p>
							Home
							<i class="fas fa-angle-left right"></i>
						</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{route('slide')}}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Slide</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('parceira')}}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Praceira</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
						<i class="nav-icon far fa-image"></i>
						<p>
							Associação
							<i class="fas fa-angle-left right"></i>
						</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('infra.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Infraestrutura</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('inf.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Inf</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('memoria.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Memoria</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('me.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Memoria - Me</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('atual.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Administração</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('at.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Administração - At</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('team.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Historia - Team</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('historia.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Historia</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
						<i class="nav-icon far fa-image"></i>
						<p>
							Esporte
							<i class="fas fa-angle-left right"></i>
						</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('horarios.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Horarios</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('horas.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Horas</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('cultural.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Cultural</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('cul.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Cultural -cul</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('lazer.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Lazer</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('laz.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Lazer -Laz</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('olimpicos.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Olimpicos</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('oli.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Olimpicos - Oli</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('natacao.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Natação</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('nata.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Natação - Nata</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('basquete.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Basquete</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('basq.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Basquete - Basq</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('futebol.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Fetubol</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('bol.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Fetubol - Bol</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('amandores.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Amandores</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
						<i class="nav-icon far fa-image"></i>
						<p>
							Social
							<i class="fas fa-angle-left right"></i>
						</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{route('eventos.index')}}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Eventos</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('eve.index')}}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Eventos- eve</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('atividades.index')}}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Atividades</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('ati.index')}}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Atividades - Ati</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
						<i class="nav-icon far fa-image"></i>
						<p>
							Multimidia
							<i class="fas fa-angle-left right"></i>
						</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('galeria.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Galeria das Fotos</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('virtual.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Tour Virtual</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('downloads.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Downloads</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('videos.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Videos</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
						<i class="nav-icon far fa-image"></i>
						<p>
							Serviços
							<i class="fas fa-angle-left right"></i>
						</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('pilates.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Pilates</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('pi.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Pilates - Pi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('lojas.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Lojas</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('idioma.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Escola de Idioma</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('id.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Escola de Idioma - Id</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('ginastica.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Ginastica</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('gi.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Ginastica - Gi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('scretaria.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Scretaria</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('se.index') }}" class="nav-link">
									<i class="nav-icon far fa-image"></i>
									<p>Scretaria - Se</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
						<i class="nav-icon far fa-image"></i>
						<p>
							Futebol
							<i class="fas fa-angle-left right"></i>
						</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('pro.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Profissional</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('jobs.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Profissional - Jobs</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('base.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Categorias de base</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('ba.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Categorias - Ba</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('ffm.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Futebol Fem e Masc</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('ff.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Futebol - Ff</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('conquistas.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Conquistas</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('co.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Conquistas - Co</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('idolos.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Idolos</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('velho.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Velhos</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('arara.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Torcida Arara</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('ar.index') }}" class="nav-link">
								<i class="nav-icon far fa-image"></i>
								<p>Torcida Arara - ar</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
							
						<!-- Authentication -->
								
						<a class="nav-link" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
													<i class="fas fa-sign-out-alt"></i>
									<p>{{ __('Sair') }}</p>
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
								
					</li>     
				</ul>
			</nav>
		<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
	  	<div class="content">
		
    		@yield('content')

			

		</div>
  	</div>
  	<!-- /.content-wrapper -->

  	<footer class="main-footer">
		<div class="float-right d-none d-sm-block">
		<b>Version</b> 3.2.0
		</div>
		<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  	</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ mix('js/app.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- Select --}}
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>



<!-- bs-custom-file-input -->
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script>
    $(function () {
      bsCustomFileInput.init();
    });

    $('.select2').select2()

</script>

</body>
</html>
