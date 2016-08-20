@extends('admin.common.layout')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">博客设置</h3>
    </div>
    <div class="box-body　box-primary">
        <div class="row">
            <div class="col-sm-12">
                <div class="nav-tabs-custom">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <form method="post" action="{{route('admin.users.blog.update')}}" id="form" enctype="multipart/form-data" class="form-horizontal">
                                    @include('admin.common.errors')
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>自定义博客地址</label>
                                        <div class="col-sm-6">
                                            {{env('ADMIN')}}<input type="text" name="blog_url" value="{{$user->blog_url}}" required=""  placeholder="拼接博客地址" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>用来拼接 URL 的，如：sheldon</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">一句话格言</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="brief" value="{{$user->description->brief}}"  placeholder="一句话格言" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>如：失败是成功之母</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">博客关键字</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="keyword" value="{{$user->description->keyword}}"   placeholder="博客关键字" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>如：后端开发, 个人博客,Liunx,Php,Mysql</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">博客描述</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="description" value="{{$user->description->description}}"  placeholder="博客描述" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>如：无所谓做什么，只要是当前最感兴趣的事！随心、随性、随缘！</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">保存</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
