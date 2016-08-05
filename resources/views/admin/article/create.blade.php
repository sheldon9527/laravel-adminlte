@extends('admin.common.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    <form method="post" action="{{route('admin.articles.store')}}"class="form-horizontal" enctype="multipart/form-data">
                        @include('admin.common.errors')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span class="text-red">*</span>文章题目</label>
                                <input type="text" name="title" value="" class="form-control" placeholder="文章题目" required="">
                            </div>
							<div class="form-group">
								<label for=""><span class="text-red">*</span>文章简述</label>
								<div>
									<textarea class="form-control" rows="6" cols="40" name="description" placeholder="文章简述" required=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for=""><span class="text-red">*</span>文章内容</label>
								<style>
  									#container{
										width: auto;
										min-height: 600px;
									}
								</style>
								<script id="container" name="content" type="text/plain">
									这里写你的初始化内容
								</script>
							</div>
							<div class="form-group">
								<label for=""><span class="text-red">*</span>标签</label>
								<div>
									<input type="text" name="tag" value="" class="form-control" placeholder="文章标签,多个标签用英文逗号隔开(,)" required="">
								</div>
							</div>
							<div class="form-group">
								<div>
									<button class="btn btn-primary" type="submit">保存草稿</button>
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
