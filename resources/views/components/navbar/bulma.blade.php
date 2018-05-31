<nav class="navbar is-transparent" role="navigation" aria-label="main navigation" id="navigation">
	<div class="navbar-brand">
		<a class="navbar-item" href="{{ url('/') }}">{{ config('app.name') }}</a>

		<a role="button" class="navbar-burger" data-target="navbarMenu" aria-label="menu" aria-expanded="false">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</a>
	</div>
	<div class="navbar-menu" id="navbarMenu">
		<div class="navbar-start">
			@foreach($items as $item)
				<a class="navbar-item {{ strtolower($item->title) }} ajax" href="{{ route($item->route.'-'.$lang) }}">
					{{ Lang::get('navigation.title.'.strtolower($item->title)) }}
				</a>
			@endforeach
		</div>

		<div class="navbar-end">
			@if (Auth::guest())
				<a class="navbar-item login ajax" href="{{ route('login') }}">{{ Lang::get('navigation.title.login') }}</a>
				<a class="navbar-item register ajax" href="{{ route('register') }}">{{ Lang::get('navigation.title.register') }}</a>
			@else
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link" href="{{ url('/') }}">
			          	{{ Auth::user()->name }}
			        </a>
					<div class="navbar-dropdown is-boxed">
						<a class="navbar-item" href="{{ config('voyager.user.redirect') }}">{{ Lang::get('navigation.title.admin') }}</a>
						<hr class="navbar-divider">
						<a class="navbar-item is-active" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</div>
				</div>
			@endif
			@if ($lang == 'en')
				<a class="navbar-item lang" href="{{ route('home-fr') }}">FR</a>
			@else
				<a class="navbar-item lang" href="{{ route('home-en') }}">EN</a>
			@endif
		</div>
	</div>
</nav>
