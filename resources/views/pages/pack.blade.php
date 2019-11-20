@extends('layouts.switcher')

@section('description'){{ strip_tags(ucfirst(Lang::get('meta.description'))) }}@stop

@section('title'){{ strip_tags(ucfirst(Lang::get('meta.title.pack'))) }}@stop

@section('content')

	<input class="page_title" type="hidden" value="{{ strip_tags(ucfirst(Lang::get('meta.title.pack'))) }}">
	<input class="page_id" type="hidden" value="{{ $page_id }}">
	<input class="page_menu_id" type="hidden" value="{{ $page_id }}">
	<input class="page_lang_url_id" type="hidden" value="{{ route($page_id.'-'.$langreverse) }}">

	<div class="container_page {{ $page_id }}">
		<div class="bg_page"></div>
		<div class="content_scroll">
			<div class="content">
				<main>
					@foreach($posts as $dog)
						<figure class="figure" data-id="{{ $dog->id }}">
					    	<img src="{{ Voyager::image( $dog->image ) }}" style="width:100%" alt="{{ $dog->title }}">
					    </figure>
					@endforeach
				</main>
				<!--
				<div class="row full-width small-collapse">

					@foreach(Lang::get('pack.programmes') as $programme)

						<div class="block medium-4 columns">
							<div class="ico"><img src="{{ asset('assets/frontend/img/programme/' . $programme['ico']) }}"></div>
							<div class="title">{{ $programme['title'] }}</div>
							<div class="short_text">{{ $programme['short_text'] }}</div>
							<div class="show_more"><img src="{{ asset('assets/frontend/img/programme/ico_more.png') }}"></div>
						</div>

					@endforeach


				</div>
				-->
			</div>
		</div>
	</div>

@endsection
