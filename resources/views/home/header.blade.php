<!-- Init Header -->
<header id="header">
	@if (request() -> segment(1) !== 'contact')
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="appinfo">
							<h1>
								<p>
									School Manager
								</p>
							</h1>
						</div>
					</div>

					<div class="col-sm-6">
					</div>

					<div class="col-sm-2">
						<div class="social-icons pull-right">
							<ul class="nav nav-pills">
								<li class="nav-item">
									<a class="nav-link" href="/">
										<i class="fab fa-facebook"></i>
									</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="/">
										<i class="fab fa-twitter"></i>
									</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="/">
										<i class="fab fa-google-plus"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
	<!-- End Header Top -->

	<!-- Init Header Middle -->
	<div class="header-middle">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<!--<a href="/"><img src="{{ asset('images') }}" alt="" /></a>-->
					</div>
				</div>

				<div class="col-sm-8">
					<div class="login-menu pull-right">
						<ul class="nav navbar-nav">
							<!-- Authentication Links -->
							@guest
								@if (Route::has('login'))
									<li class="nav-item">
										<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
									</li>
								@endif

								@if (Route::has('register'))
									<li class="nav-item">
										<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
									</li>
								@endif
							@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->name }}
									</a>

									<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('logout') }}"
										    onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>
								</li>
							@endguest

							@if ($person !== "")
								<li>
									<a href="{{ URL::asset('/perfil/' . $school . '/person/' . $person -> id . '/type/' . $type_user) }}">
										<i class="fa"></i> Bienvenido, <b>{{ $person -> name }} {{ $person -> surnames }}</b>
									</a>
								</li>
								<!-- <li>
									<a href="{{ URL::asset('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										<i class="fa"></i> Logout
									</a>
								</li>
								<form id="logout-form" action="{{ URL::asset('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form> -->
							@else
								<li>
									<a href="{{ URL::asset('/prelogin') }}">
										<i class="fa fa-lock"></i> Login
									</a>
								</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Header Middle -->
</header>
<!-- End Header -->