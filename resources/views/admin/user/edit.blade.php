@extends('admin.common.layout')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">用户信息编辑</h3>
    </div>
    <div class="box-body　box-primary">
        <div class="row">
            <div class="col-sm-12">
                <div class="nav-tabs-custom">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <form method="post" action="{{route('admin.users.update',$user->id)}}" id="form" enctype="multipart/form-data" class="form-horizontal">
                                    @include('admin.common.errors')
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>头像:</label>
                                        <div class="col-sm-4">
                                            <img id="picture-preview" src="@if($user->avatar){{url($user->avatar)}}@endif" width="50%" height="50%">
                                            <label class="btn btn-info btn-file">
                                                <input name="avatar" type="file" accept="image/*" data-image-preview="#picture-preview">
                                                选择
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>昵称:</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="nickname" value="{{$user->nickname}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">名字</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">生日:</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="birthday" value="{{$user->birthday}}" class="datetime form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>性别:</label>
                                        <div class="col-sm-4">
                                            <div>
                                                <select name="gender" class="selectpicker" data-width="auto">
                                                    <option value="secret" @if($user->gender =='secret') selected="selected" @endif>保密</option>
                                                    <option value="male" @if($user->gender =='male') selected="selected" @endif>男</option>
                                                    <option value="female" @if($user->gender =='female') selected="selected" @endif>女</option>
                                                </select>
                                            </div>
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
