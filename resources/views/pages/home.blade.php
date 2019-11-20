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
						<div class="logo"></div>
						<div class="text">
							<div class="caption">Venez découvrir l'expérience</div>
							<div class="title">Chien de Traîneau</div>
						</div>
					</div>
				</div>

				<div class="crevoux"></div>

			</div>
		</div>
	</div>

@endsection
