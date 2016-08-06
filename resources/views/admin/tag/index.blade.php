@extends('admin.common.layout')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">标签</h3>
        </div>
        <div class="box-body ">
            <div class="row">
                <div class="col-sm-8">
                    @foreach($tags as $key=>$tag)
                    <a href="{{route('admin.articles.index')}}?tag={{$tag}}" class="btn btn-primary" type="button">{{$tag}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
