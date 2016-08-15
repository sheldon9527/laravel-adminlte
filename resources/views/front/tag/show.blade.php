@extends('front.layout')
@section('content')
<div class="container body-wrap">
	<section class="tags-wrap">
		<h2 class="tags-title">标签</h2>
		<ul class="tag-list">
			@foreach($tags as $tag)
			<li class="tag-list-item">
				<a class="tag-list-link" href="{{route('front.articles.index',$user->blog_url)}}?tag={{$tag}}">#{{$tag}}</a>
				<span class="tag-list-count">2</span>
			</li>
			@endforeach
		</ul>
	</section>
</div>
@endsection
