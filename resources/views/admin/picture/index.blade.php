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
                                        <select name="name" class="selectpicker" data-width="auto">
                                            @foreach($pictuteNames as $pictuteName)
                                                <option value="{{$pictuteName->name}}">{{$pictuteName->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否显示</label>
                                    <div class="col-sm-8">
                                        <select name="status" class="selectpicker" data-width="auto">
                                            <option value="active">显示</option>
                                            <option value="inactive">不显示</option>
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
                    <div class="row">
                        @foreach($attachments as $attachment)
                          <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                              <img src="{{url($attachment->relative_path)}}" alt="{{$attachment->relative_path}}">
                              <div class="caption">
                                <p>
                                    <a href="#" class="btn btn-primary" data-confirm="Are you sure?">删除</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
