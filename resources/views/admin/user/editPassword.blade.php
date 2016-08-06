
@extends('admin.common.layout')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">修改密码</h3>
    </div>
    <div class="box-body　box-primary">
        <div class="row">
            <div class="col-sm-12">
                <div class="nav-tabs-custom">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <form method="post" action="{{route('admin.users.password.update')}}" id="form" enctype="multipart/form-data" class="form-horizontal">
                                    @include('admin.common.errors')
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>旧密码:</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="old_password" value="" placeholder="请输入旧密码" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>新密码</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="password" value="" placeholder="请输入新密码" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span class="text-red">*</span>确认新密码</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="password_confirmation" value="" placeholder="请确认新密码" class="form-control">
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
