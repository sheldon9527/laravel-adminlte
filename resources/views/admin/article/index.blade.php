@extends('admin.common.layout')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">所有文章</h3>
        </div>
        <div class="box-body ">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search">筛选 <span class="caret"></span></button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-search" role="menu">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">标题</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="标题" name="title" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">状态</label>
                                    <div class="col-sm-8">
                                        <select name="status" class="selectpicker" data-width="auto">
                                            <option value="">--</option>
                                            <option value="active">显示</option>
                                            <option value="inactive">不显示</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">置顶</label>
                                    <div class="col-sm-8">
                                        <select name="is_front" class="selectpicker" data-width="auto">
                                            <option value="">--</option>
                                            <option value="1">置顶</option>
                                            <option value="0">不置顶</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">类别</label>
                                    <div class="col-sm-8">
                                        <select  class="selectpicker" name="category_id">
                                            <option value="">--</option>
                                            @foreach($categories as $catefory)
                                            <option value="{{$catefory->id}}">{{$catefory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </form>
                        </div>
                    </div>
                    @include('admin.common.search-tips')
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="infos" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr role="row">
                            <td>文章id</td>
                            <td>系统类别</td>
                            <td>标题</td>
                            <td>标签</td>
                            <td>状态</td>
                            <td>置顶</td>
                            <td>创建时间</td>
                            <td>操作</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr role="row">
                                <td>{{$article->id}}</td>
                                <td>@if($article->category){{$article->category->name}}@else <span class="text-red">未分类</span>@endif</td>
                                <td><a href="{{route('admin.articles.show',$article->id)}}">{{$article->title}}</a></td>
                                <td>
                                    @foreach($article->tags()->get() as $tag)
                                    <button type="button" class="btn-primary">{{$tag->name}}</button>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($article->status == 'active')
                                        <span class="text-info"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    @else
                                        <span class="text-danger"><i class="fa fa-close" aria-hidden="true"></i></span>
                                    @endif
                                </td>
                                <td>
                                    @if ($article->is_front)
                                        <span class="text-info"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    @else
                                        <span class="text-danger"><i class="fa fa-close" aria-hidden="true"></i></span>
                                    @endif
                                </td>
                                <td>{{$article->created_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">操作
                                        <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu slim-menu">
                                            <li><a href="{{route('admin.articles.edit',$article->id)}}">编辑</a></li>
                                            <li><a href="{{route('admin.articles.show',$article->id)}}">详情</a></li>
                                            @if($article->is_front == 1)
                                            <li><a href="{{route('admin.articles.update.status',$article->id)}}?is_front=0" data-method="post"　 data-confirm="确定不置顶?">不置顶</a></li>
                                            @else
                                            <li><a href="{{route('admin.articles.update.status',$article->id)}}?is_front=1" data-method="post"　 data-confirm="确定置顶?">置顶</a></li>
                                            @endif
                                            @if($article->status == 'active')
                                            <li><a href="{{route('admin.articles.update.status',$article->id)}}?status=inactive" data-method="post"  data-confirm="确定不显示?">不展示</a></li>
                                            @else
                                            <li><a href="{{route('admin.articles.update.status',$article->id)}}?status=active" data-method="post"  data-confirm="确定显示?">展示</a></li>
                                            @endif
                                            <li><a href="{{route('admin.articles.destory',$article->id)}}}}"  data-method="delete" data-confirm="确定删除?">删除</a></li>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        {!! $articles->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
