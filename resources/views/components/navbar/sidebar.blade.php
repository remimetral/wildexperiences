<div class="side-menu sidebar-inverse">
	<nav class="navbar navbar-default" role="navigation" id="navigation">
		<div class="side-menu-container">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{-- route('voyager.dashboard') --}}">
					<div class="logo"></div>
					<div class="title">Wild Experiences</div>
				</a>
			</div>
		</div>
		<ul class="nav navbar-nav mr-auto">
			@foreach($items as $item)
				<li class="nav-item">
					<a class="nav-link {{ strtolower($item->title) }} ajax" href="{{ route($item->route.'-'.$lang) }}">
						<span class="icon {{ $item->icon_class }}"></span>
			            <span class="title">{{ Lang::get('navigation.title.'.strtolower($item->title)) }}</span>
					</a>
				</li>
			@endforeach
			@if ($lang == 'en')
				<li class="nav-item lang">
					<a class="nav-link lang" href="{{ route('home-fr') }}">FR</a>
				</li>
			@else
				<li class="nav-item lang">
					<a class="nav-link lang" href="{{ route('home-en') }}">EN</a>
				</li>
			@endif
		</ul>
	</nav>
</div>
