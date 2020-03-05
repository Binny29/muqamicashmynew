		<!-- app-content-->
			<div class="app-content ">
				<div class="side-app">
					<div class="main-content">
						<div class="p-2 d-block d-sm-none navbar-sm-search">
							<!-- Form -->
							<form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
								<div class="form-group mb-0">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-search"></i></span>
										</div><input class="form-control" placeholder="Search" type="text">
									</div>
								</div>
							</form>
						</div>
						<!-- Top navbar -->
						<nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
							<div class="container-fluid">
								<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

								<!-- Horizontal Navbar -->
								

								<!-- Brand -->
								<a class="navbar-brand pt-0 d-md-none" href="index.html">
									<img src="assets/img/brand/logo-light.png" class="navbar-brand-img" alt="...">
								</a>
								<!-- Form -->
								<!-- <form class="navbar-search navbar-search-dark form-inline mr-3  ml-lg-auto">
									<div class="form-group mb-0">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-search"></i></span>
											</div><input class="form-control" placeholder="Search" type="text">
										</div>
									</div>
								</form> -->
								<!-- User -->
								<ul class="navbar-nav align-items-center ">
									<li class="nav-item d-none d-md-flex">
										<div class="dropdown d-none d-md-flex mt-2 ">
											<a class="nav-link full-screen-link pl-0 pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
										</div>
									</li>
									

									
									<li class="nav-item dropdown">
										<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
										<div class="media align-items-center">
											<span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="assets/img/faces/female/32.jpg"></span>
											<div class="media-body ml-2 d-none d-lg-block">
												<span class="mb-0 "><?php  echo $_SESSION['login_user'] ?></span>
											</div>
										</div></a>
										<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
											<div class=" dropdown-header noti-title">
												<h6 class="text-overflow m-0">Welcome!</h6>
											</div>
											
											<div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ni ni-user-run"></i> <span>Logout</span></a>
										</div>
									</li>
								</ul>
							</div>
						</nav>
						<!-- Top navbar-->