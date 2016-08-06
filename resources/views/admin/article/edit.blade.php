@extends('admin.common.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    <form method="post" action="{{route('admin.articles.update',$article->id)}}"class="form-horizontal" enctype="multipart/form-data">
                        @include('admin.common.errors')
                        <input type="hidden" name="_method" value="PUT">
                        <div>
                            <div class="form-group">
                                <label><span class="text-red">*</span>标题</label>
                                <input type="text" name="title" value="{{$article->title}}" class="form-control" placeholder="标题" required="">
                            </div>
							<div class="form-group">
								<label for=""><span class="text-red">*</span>内容</label>
								<style>
  									#container{
										width: auto;
										min-height: 300px;
									}
								</style>
								<script id="container" name="content" type="text/plain">
                                <?php  echo $article->content; ?>
								</script>
							</div>
                            <div class="form-group">
                                <label for=""><span class="text-red">*</span>标签</label>
                                <div>
                                    <input type="text" name="tag" value="@foreach($article->tags as $tag){{$tag->name.','}}@endforeach" class="form-control" placeholder="标签,多个标签用英文逗号隔开" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">锚点</label>
                                <div>
                                    <input type="text" name="catalog" value="{{$article->catalog}}" class="form-control" placeholder="锚点,多个标签用英文逗号隔开">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""><span class="text-red">*</span>系统分类:</label>
                                <select id="test_select" name="category_id" class="selectpicker">
                                    <option value="0">请选择</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($article->category_id == $category->id) selected="selected" @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label class="control-label"><span class="text-red">*</span>是否显示:</label>
                                    <select name="status" class="selectpicker" data-width="auto">
                                        <option value="active" @if($article->status =='active') selected="selected" @endif>显示</option>
                                        <option value="inactive"  @if($article->status =='inactive') selected="selected" @endif>不显示</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label class="control-label"><span class="text-red">*</span>是否置顶:</label>
                                    <select name="is_front" class="selectpicker" data-width="auto">
                                        <option value="0" @if($article->status ==0) selected="selected" @endif>否</option>
                                        <option value="1" @if($article->status ==1) selected="selected" @endif>是</option>
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
<script type="text/javascript" src="/editor/ueditor.config.js"></script>
<script type="text/javascript" src="/editor/ueditor.all.js"></script>
<script type="text/javascript">
	var ue = UE.getEditor('container');
</script>
@endsection
