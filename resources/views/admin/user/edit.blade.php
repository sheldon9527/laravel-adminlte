@extends('admin.common.layout')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">基本信息</h3>
    </div>
    <div class="box-body　box-primary">
        <div class="row">
            <div class="col-sm-12">
                <div class="nav-tabs-custom">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <form method="post" action="{{route('admin.users.update')}}" id="form" enctype="multipart/form-data" class="form-horizontal">
                                    @include('admin.common.errors')
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>头像:</label>
                                        <div class="col-sm-6">
                                            <img id="picture-preview" src="@if($user->avatar){{url($user->avatar)}}@endif" width="50%" height="50%">
                                            <label class="btn btn-info btn-file">
                                                <input name="avatar" type="file" accept="image/*" data-image-preview="#picture-preview">
                                                选择
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>昵称:</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="nickname" value="{{$user->nickname}}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>用户昵称</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">名字</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>就是您的名字哟</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>GitHub Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="gitHub_name" value="{{$user->gitHub_name}}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>请跟 GitHub 上保持一致</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>微博 ID</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="sina_id" value="{{$user->sina_id}}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>用来拼接 URL 的，如：2940709051</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">LinkedIn</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="linked_in" value="{{$user->linked_in}}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>你的 <a href="https://www.linkedin.com">LinkedIn</a>
                                                主页完整 URL 地址，如：https://www.linkedin.com/in/yeesheldon</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Twitter 帐号</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="twitter" value="{{$user->twitter}}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <p>用来拼接 URL 如：sheldon9527yxd</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>性别:</label>
                                        <div class="col-sm-6">
                                            <div>
                                                <select name="gender" class="selectpicker" data-width="auto">
                                                    <option value="secret" @if($user->gender =='secret') selected="selected" @endif>保密</option>
                                                    <option value="male" @if($user->gender =='male') selected="selected" @endif>男</option>
                                                    <option value="female" @if($user->gender =='female') selected="selected" @endif>女</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>你的性别</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-2">
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
