@extends('layouts.switcher')

@section('description'){{ strip_tags(ucfirst(Lang::get('meta.description'))) }}@stop

@section('title'){{ strip_tags(ucfirst(Lang::get('meta.title.activities'))) }}@stop

@section('content')

<input class="page_title" type="hidden" value="{{ strip_tags(ucfirst(Lang::get('meta.title.activities'))) }}">
<input class="page_id" type="hidden" value="{{ $page_id }}">
<input class="page_menu_id" type="hidden" value="{{ $page_id }}">
<input class="page_lang_url_id" type="hidden" value="{{ route($page_id.'-'.$langreverse) }}">

<div class="container_page {{ $page_id }}">
	<div class="bg_page"></div>
	<div class="content_scroll">
		<div class="content">
			<div class="container">
				<div class="logo"></div>
				<div class="winter">
					<div class="cover" data-type="winter">
						<div class="row">
							<div class="columns">
								<div class="title">Hiver</div>
							</div>
						</div>
					</div>
					<div class="text">
						<div class="row">
							<div class="columns">
								<h1>{{ $winter->title }}</h1>
								<img src="{{ Voyager::image( $winter->image ) }}" style="width:100%">
								<p>{!! $winter->body !!}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="summer">
					<div class="cover" data-type="summer">
						<div class="row">
							<div class="columns">
								<div class="title">Été</div>
							</div>
						</div>
					</div>
					<div class="text">
						<div class="row">
							<div class="columns">
								<h1>{{ $summer->title }}</h1>
								<img src="{{ Voyager::image( $summer->image ) }}" style="width:100%">
								<p>{!! $summer->body !!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
