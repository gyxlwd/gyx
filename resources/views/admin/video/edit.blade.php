@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>视频更新</h3>
@endsection

@section('content')
<script type="text/javascript" charset="utf-8" src="/plugings/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugings/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/plugings/ueditor/lang/zh-cn/zh-cn.js"></script>
              
<div class="row">
<div class="col-lg-6">
    
        <div class="panel-body">
            <form role="form" action="/video/{{$video->id}}" method="post" enctype="multipart/form-data">
             
                <div class="form-group">
                    <label for="exampleInputEmail1">视频名称</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">上传者</label>
                    <input type="text" class="form-control" name="username">
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">视频分类</label>
                    
                    <select type="text" class="form-control" name="fl">
                        <option value="0" name="fl">大类</option>
                        <option value='教育' name="fl">&nbsp;教育</option>
                        <option value='娱乐' name="fl">&nbsp;娱乐</option>
                        <option value='电影' name="fl">&nbsp;电影</option>
                        <option value='原创' name="fl">&nbsp;原创</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="exampleInputFile">选择视频</label>
                    <input type="file" name="goodspicture">
                </div> 
                <div class="form-group">
                  <label for="exampleInputFile">视频简介</label>
                   <input type="text" name="jiej" class="form-control" style="height:80px;">          
                </div> 
                {{csrf_field()}}
                {{method_field('PUT')}}        
                <button type="submit" class="btn btn-primary">确认更新</button>
            </form>
        </div>
    
</div>
</div>
 
 <script>
    var ue = UE.getEditor('editor',{
        // toolbars: [
        //     ['fullscreen', 'source', 'undo', 'redo', 'bold']
        // ]
    });
 </script>                 
@endsection