@extends('admin.common.layout')

@section('content')
    <div class="box box-primary">
        <div class="box-body ">
            <div class="row">
                <div class="box-header box-body">
                    <i data-toggle="modal" data-target="#addRootModal" class="pull-left btn btn-primary fa fa fa-plus"></i>
                </div>
                <div class="col-sm-12 box-body">
                    <div class="row">
                        @foreach($pictuteNames as $album)
                          <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <small class="label pull-left bg-green">{{$album->name}}</small>
                                @if($album->status == 'active')
                                    <small class="label pull-right bg-green">{{$album->attachmentCount()}}</small>
                                @else
                                    <small class="label pull-right bg-red">{{$album->attachmentCount()}}</small>
                                @endif
                                @if($album->attachmentOne())
                                    <img src="{{url($album->attachmentOne()->relative_path)}}" alt="{{$album->attachmentOne()->relative_path}}">
                                @else
                                    <img src="/images/album.png" alt="/images/album.png">
                                @endif
                                <!-- {{$album->description}} -->
                                  <div class="caption">
                                    <a href="{{route('admin.albums.delete',$album->id)}}" data-method='DELETE' data-confirm="Are you sure?"  class="btn btn-primary"><i class="fa fa-times"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#editAlbumModal"
                                    data-name="{{$album->name}}" data-description="{{$album->description}}"  data-status="{{$album->status}}"  data-front="{{$album->is_front}}" data-href="{{route('admin.albums.update',$album->id)}}"
                                      class="btn btn-primary edit-album"><i class="fa fa-pencil-square-o"></i></a>
                                    <li data-toggle="modal" data-target="#addPictureModal"  class="btn bg-green pull-right"><i class="fa fa-plus"></i></li>
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-red">*</span>状态</label>
                            <div class="col-sm-8">
                                <input type="radio" name="status" value="active">
                                <label for="" class="padding_right" >激活</label>
                                <input type="radio" name="status" value="inactive" checked="checked">
                                <label for="" class="padding_right" >禁用</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-red">*</span>是否置顶</label>
                            <div class="col-sm-8">
                                <input type="radio" name="is_front" value=1 >
                                <label for="" class="padding_right" >是</label>
                                <input type="radio" name="is_front" value=0 checked="checked">
                                <label for="" class="padding_right" >否</label>
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
    <!-- update Modal -->
    <div class="modal fade" id="editAlbumModal" tabindex="-1" role="dialog" aria-labelledby="editAlbumModal">
        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" >
            <input type="hidden" name="_method" value="PUT" >
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-red">*</span>状态</label>
                            <div class="col-sm-8">
                                <input type="radio" name="status" value="active" data-name='active'>
                                <label for="" class="padding_right" >激活</label>
                                <input type="radio" name="status" value="inactive" data-name='inactive'>
                                <label for="" class="padding_right" >禁用</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-red">*</span>是否置顶</label>
                            <div class="col-sm-8">
                                <input type="radio" name="is_front" value=1 data-name=1>
                                <label for="" class="padding_right" >是</label>
                                <input type="radio" name="is_front" value=0 data-name=0>
                                <label for="" class="padding_right" >否</label>
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

<!-- addPictureModal -->
    <div class="modal fade" id="addPictureModal" tabindex="-1" role="dialog" aria-labelledby="addPictureModal">
        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-red">*</span>名称:</label>
                            <div class="col-sm-8">
                        
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
            // 修改
            $('.caption').on('click', '.edit-album', function () {
                var name = $(this).data('name');
                var description = $(this).data('description');
                var status = $(this).data('status');
                var is_front = $(this).data('front');
                var href = $(this).data('href');
                var $model = $('#editAlbumModal');

                $model.find('input[name=status]').each(function(){
                  if($(this).data('name') == status){
                      $(this).attr('checked','checked');
                  }
                });
                $model.find('input[name=is_front]').each(function(){
                  if($(this).data('name') == is_front){
                      $(this).attr('checked','checked');
                  }
                });
                $model.find('form').attr('action', href);
                $model.find('input[name=name]').val(name);
                $model.find('textarea[name=description]').val(description);
            });
        });
    </script>
    @endsection
