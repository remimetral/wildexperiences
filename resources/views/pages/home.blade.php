@extends('layouts.switcher')

@section('description'){{ strip_tags(ucfirst(Lang::get('meta.description'))) }}@stop

@section('title'){{ strip_tags(ucfirst(Lang::get('meta.title.home'))) }}@stop

@section('content')

	<input class="page_title" type="hidden" value="{{ strip_tags(ucfirst(Lang::get('meta.title.home'))) }}">
	<input class="page_id" type="hidden" value="{{ $page_id }}">
	<input class="page_menu_id" type="hidden" value="{{ $page_id }}">
	<input class="page_lang_url_id" type="hidden" value="{{ route($page_id.'-'.$langreverse) }}">

	<div class="container_page {{ $page_id }}">
		<div class="bg_page">
			@include('components/carousel/bootstrap')
			<div class="trame"></div>
			<div class="gradient"></div>
		</div>
		<div class="content_scroll">
			<div class="content">

				<div class="row">
					<div class="small-12 columns">
						<div class="bg_logo">
							<div class="logo"></div>
						</div>
						<div class="text">
							<div class="caption">Venez découvrir l'expérience</div>
							<a class="ajax" href="{{ route('activities-'.$lang) }}">
								<div class="title">Chiens de Traîneau</div>
							</a>
						</div>
					</div>
				</div>

				<a href="https://www.crevoux.fr" target="_blank">
					<div class="crevoux"></div>
				</a>

			</div>
		</div>
	</div>

@endsection
