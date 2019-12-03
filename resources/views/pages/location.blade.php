@extends('layouts.switcher')

@section('description'){{ strip_tags(ucfirst(Lang::get('meta.location'))) }}@stop

@section('title'){{ strip_tags(ucfirst(Lang::get('meta.title.pack'))) }}@stop

@section('content')

	<input class="page_title" type="hidden" value="{{ strip_tags(ucfirst(Lang::get('meta.title.location'))) }}">
	<input class="page_id" type="hidden" value="{{ $page_id }}">
	<input class="page_menu_id" type="hidden" value="{{ $page_id }}">
	<input class="page_lang_url_id" type="hidden" value="{{ route($page_id.'-'.$langreverse) }}">

	<div class="container_page {{ $page_id }}">
		<div class="bg_page"></div>
		<div class="content_scroll">
			<div class="content">
				<div class="container">
					<div class="text">
						<div class="row">
							<div class="large-12 columns">
								<h1>{{ $location->title }}</h1>
								<!--<img src="{{ Voyager::image( $location->image ) }}" style="width:100%">-->
								<p>{!! $location->body !!}</p>
							</div>
						</div>
					</div>
					<div id="maps" class="maps">
						<!--<maps></maps>-->
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
