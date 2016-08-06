@extends('admin.common.layout')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">分类目录</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                @include('admin.common.errors')
                <a data-toggle="modal" data-target="#addRootModal" class="pull-right btn btn-primary" type="button">添加分类</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="category-table" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>分类名称</th>
                        <th>创建时间</th>
                        <!-- <th>排序</th> -->
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($roots as $root)
                            <tr class="root info" data-root-id={{$root->id}}>
                                <td>{{$root->name}}</td>
                                <td>{{$root->created_at}}</td>
                                <!-- <td>
                                    <a  class="primary"><i class="glyphicon glyphicon-arrow-up btn-lg sort" aria-hidden="true" data-id="{{$root->id}}" data-operate="up"></i></a>
                                    <a  class="primary"><i class="glyphicon glyphicon-arrow-down btn-lg sort" aria-hidden="true" data-id="{{$root->id}}" data-operate="down" ></i></a>
                                </td> -->
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">操作
                                        <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu slim-menu">
                                            <li><a class="edit-node"
                                                data-toggle="modal"
                                                data-target="#editNodeModal"
                                                data-href="{{route('admin.categories.update', $root->id)}}"
                                                data-node-name="{{$root->name}}">修改</a></li>
                                            <li><a href="{{route('admin.categories.destroy', $root->id)}}" data-method="delete" data-confirm="确定删除分类吗，分类下面的文章会没有类别?">删除</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addRootModal" tabindex="-1" role="dialog" aria-labelledby="addRootModal">
    <form action="{{route('admin.categories.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">添加主分类</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称:</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="editNodeModal" tabindex="-1" role="dialog" aria-labelledby="addRootModal">
    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" >
        <input type="hidden" name="_method" value="PUT" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">修改分类</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称:</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    require(['jquery'], function($) {
		// 分类的排序
        $('#category-table').on('click', 'a .sort', function() {

            var $operate = $(this).data('operate');
            var $targetTr = $(this).closest('tr')

            if ($operate == 'up') {
                var $prev = $targetTr.prev();
                if (!$prev.length) {
                    return;
                }
            }
            if ($operate == 'down') {
                var $next = $targetTr.next();
                if (!$next.length) {
                    return;
                }
            }

            $id = $(this).data('id');
            $.ajax({
                url: '/manager/categories/' + $id,
                type: 'POST',
                data: {
                    orderby: $operate,
                    _method: 'PUT',
                }
            })
            .done(function(data) {
                if (data.success == 1) {
                    if ($operate == 'up') {
                        $targetTr.remove().insertBefore($prev);
                    } else {
                        $targetTr.remove().insertAfter($next);
                    }
                }
            });
        });

        // 修改分类
        $('#category-table').on('click', '.edit-node', function () {
            var node_name = $(this).data('node-name');
            var href = $(this).data('href');

            var $model = $('#editNodeModal');

            $model.find('form').attr('action', href);
            $model.find('input[name=name]').val(node_name);
        });
    });
</script>
@endsection
