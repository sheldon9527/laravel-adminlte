@extends('admin.common.layout')
@include('editor::head')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">写文章</h3>
                    <a href="{{route('admin.articles.index')}}" class="pull-right btn btn-primary" type="button">返回</a>
                </div>
                <div class="box-body">
                    <form method="post" action="{{route('admin.articles.store')}}"class="form-horizontal" enctype="multipart/form-data">
                        @include('admin.common.errors')
                        <div>
                            <div class="form-group">
                                <label><span class="text-red">*</span>标题</label>
                                <input type="text" name="title" value="" class="form-control" placeholder="标题" required="">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red">*</span>描述</label>
                                <textarea type="text" name="description" rows="3" cols="62" class="form-control" ></textarea>
                            </div>
							<div class="form-group">
								<label for=""><span class="text-red">*</span>内容</label>
								<div class="editor">
									<textarea rows="15" cols="165" id='myEditor' name="content" ></textarea>
								</div>
							</div>
                            <div class="form-group">
                                <label for=""><span class="text-red">*</span>标签</label>
                                <div>
                                    <input type="text" name="tag" value="" class="form-control" placeholder="标签,多个标签用英文逗号隔开" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""><span class="text-red">*</span>系统分类:</label>
                                <select id="test_select" name="category_id" class="selectpicker">
                                    <option value="0">请选择</option>
                                    @foreach($categories as $catefory)
                                    <option value="{{$catefory->id}}">{{$catefory->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label class="control-label"><span class="text-red">*</span>是否显示:</label>
                                    <select name="status" class="selectpicker" data-width="auto">
                                        <option value="active" selected="selected">显示</option>
                                        <option value="inactive">不显示</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label class="control-label"><span class="text-red">*</span>是否置顶:</label>
                                    <select name="is_front" class="selectpicker" data-width="auto">
                                        <option value="0" selected="selected">否</option>
                                        <option value="1">是</option>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
								<div>
									<button class="btn btn-primary" type="submit">保存</button>
								</div>
							</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
