@extends('layouts.switcher')

@section('description'){{ strip_tags(ucfirst(Lang::get('meta.description'))) }}@stop

@section('title'){{ strip_tags(ucfirst(Lang::get('meta.title.about'))) }}@stop

@section('content')

	<input class="page_title" type="hidden" value="{{ strip_tags(ucfirst(Lang::get('meta.title.about'))) }}">
	<input class="page_id" type="hidden" value="{{ $page_id }}">
	<input class="page_menu_id" type="hidden" value="{{ $page_id }}">
	<input class="page_lang_url_id" type="hidden" value="{{ route($page_id.'-'.$langreverse) }}">

	<div class="container_page {{ $page_id }}">
		<div class="bg_page"></div>
		<div class="content_scroll">
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="large-12 columns">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a velit sem. Fusce accumsan, metus ut laoreet pretium, massa lacus lobortis odio, et hendrerit risus ante vitae turpis. Pellentesque eu dignissim nisl, eget rutrum diam. Duis vitae risus urna. Cras dignissim elementum ipsum et blandit. Curabitur pellentesque, ligula vel pharetra convallis, purus lacus adipiscing arcu, non convallis massa tortor a nibh. Duis fermentum sem sed lectus venenatis volutpat. Nulla sed tortor et est consequat tincidunt. Integer quis fermentum sapien. Integer ac sem quis dolor vehicula lacinia. Sed rhoncus nisi non quam luctus pharetra. Donec tristique congue nisl, id interdum felis congue sed. Sed lobortis ultricies diam, a laoreet nisi euismod sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In consequat augue sit amet velit molestie, in viverra lorem mollis. Nullam ac nunc non augue rutrum tempus.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a velit sem. Fusce accumsan, metus ut laoreet pretium, massa lacus lobortis odio, et hendrerit risus ante vitae turpis. Pellentesque eu dignissim nisl, eget rutrum diam. Duis vitae risus urna. Cras dignissim elementum ipsum et blandit. Curabitur pellentesque, ligula vel pharetra convallis, purus lacus adipiscing arcu, non convallis massa tortor a nibh. Duis fermentum sem sed lectus venenatis volutpat. Nulla sed tortor et est consequat tincidunt. Integer quis fermentum sapien. Integer ac sem quis dolor vehicula lacinia. Sed rhoncus nisi non quam luctus pharetra. Donec tristique congue nisl, id interdum felis congue sed. Sed lobortis ultricies diam, a laoreet nisi euismod sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In consequat augue sit amet velit molestie, in viverra lorem mollis. Nullam ac nunc non augue rutrum tempus.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
