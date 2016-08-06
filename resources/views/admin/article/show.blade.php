@extends('admin.common.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">文章详情</h3>
                    <a href="{{route('admin.articles.index')}}" class="pull-right btn btn-primary" type="button">返回</a>
                </div>
                <div class="box-body">
                    <div>
                        <div class="form-group">
                            <label>标题</label>
                            <input type="text" value="{{$article->title}}" class="form-control" readonly>
                        </div>
						<div class="form-group">
							<label for="">内容</label>
                            <?php echo $article->content?>
						</div>
                        <div class="form-group">
                            <label for="">标签</label>
                            <div>
                                @foreach($article->tags()->get() as $tag)
                                <button type="button" class="btn-primary">{{$tag->name}}</button>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">锚点</label>
                            <div>
                                <input type="text" value="{{$article->catalog}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">系统分类:</label>
                            <input type="text" value="@if($article->category){{$article->category->name}}@else 未分类@endif" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <div>
                                <label class="control-label">是否显示:</label>
                                <input type="text" value="@if($article->active == 'active') 已显示@else 未显示 @endif" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <label class="control-label">是否置顶:</label>
                                <input type="text" value="@if($article->is_front == 1) 已置顶@else 未置顶 @endif" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{route('admin.articles.edit',$article->id)}}" class="pull-left btn btn-primary" type="button">编辑</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
