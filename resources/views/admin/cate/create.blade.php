@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>分类添加</h3>
@endsection

@section('content')

              
<div class="row">
<div class="col-lg-6">
    
      	<div class="panel-body">
          	<form role="form" action="/cate" method="post" enctype="multipart/form-data">
              	<div class="form-group">
                    <label for="exampleInputEmail1">分类名称</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
              	</div>
                <div class="form-group">
                    <label for="exampleInputEmail1">父级分类</label>
                    <select  class="form-control" name="parentid">
                      <option value="0">顶级分类</option>
                      @foreach($cates as $k=>$v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                      @endforeach
                    </select>
                </div>
	            
                {{csrf_field()}}        
                <button type="submit" class="btn btn-primary">添加</button>
            </form>
        </div>
    
</div>
</div>
                  
@endsection