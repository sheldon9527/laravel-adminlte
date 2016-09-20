@extends('admin.common.layout')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">图片</h3>
        </div>
        <div class="box-body ">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search">筛选 <span class="caret"></span></button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-search" role="menu">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">相册名称</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="相册名称" name="title" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否显示</label>
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
                                <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </form>
                        </div>
                    </div>
                    @include('admin.common.search-tips')
                </div>
                <div class="col-sm-12">

                </div>
            </div>
        </div>
    </div>
@endsection
