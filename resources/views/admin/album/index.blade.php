@extends('admin.common.layout')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">相册</h3>
        </div>
        <div class="box-body ">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search">筛选 <span class="caret"></span></button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-search" role="menu">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">名称</label>
                                    <div class="col-sm-8">
                                        <select name="name" class="selectpicker" data-width="auto">
                                            @foreach($pictuteNames as $pictuteName)
                                                <option value="{{$pictuteName->name}}">{{$pictuteName->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">显示</label>
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
                        @foreach($pictuteNames as $album)
                          <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                            共有{{$album->attachmentCount()}}照片
                            @if($album->attachmentOne())
                            <img src="{{url($album->attachmentOne()->relative_path)}}" alt="{{$album->attachmentOne()->relative_path}}">
                            @else
                            <img src="images/album.png" alt="images/album.png">
                            @endif
                              <div class="caption">
                                <a href="#" class="btn btn-primary">删除</a>
                                <a href="#" class="btn btn-primary">编辑</a>
                                <li data-toggle="modal" data-target="#addRootModal"  class="btn btn-primary">添加</li>
                              </div>
                            </div>
                          </div>
                          @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addRootModal" tabindex="-1" role="dialog" aria-labelledby="addRootModal">
        <form action="{{route('admin.albums.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-red">*</span>名称:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" value="" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-red">*</span>描述:</label>
                            <div class="col-sm-8">
                                <textarea type="text" name="description" rows="3" cols="62" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        require(['jquery'], function($) {

            // 修改子分类
            $('#category-table').on('click', '.edit-node', function () {
                var node_name = $(this).data('node-name');
                var node_en_name = $(this).data('node-en-name');
                var node_icon = $(this).data('node-icon');
                var href = $(this).data('href');

                var $model = $('#editNodeModal');

                $model.find('form').attr('action', href);
                $model.find('input[name=name]').val(node_name);
                $model.find('input[name=en_name]').val(node_en_name);
                $model.find('#avatar-preview').attr('src',node_icon);
            });
        });
    </script>
    @endsection
