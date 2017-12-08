@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>广告更新</h3>
@endsection

@section('content')

              
<div class="row">
<div class="col-lg-6">
    
        <div class="panel-body">
            <form role="form" action="/print/{{$print->id}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">上传图片</label>
                    <input type="file" name="img">
                </div> 
                {{csrf_field()}}        
                {{method_field('PUT')}}     
                <button type="submit" class="btn btn-primary">更新成功</button>
            </form>
        </div>
    
</div>
</div>
                  
@endsection