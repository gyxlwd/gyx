<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cates = DB::select("select id,name,parentid,concat(path,'_',id) as paths from cates order by paths");

        foreach ($cates as $key => $value) {
            $count = count(explode('_',$value->paths))-2;

            $value->name = str_repeat('|----',$count).$value->name;
        }

        return view('admin.cate.index',['cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = DB::table('cates')->get();
        return view('admin.cate.create',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        
        if($data['parentid'] == 0) {
            $data['path'] = '0';
        }else{
            $p = DB::table('cates')->where('id',$data['parentid'])->first();
            $data['path'] = $p->path.'_'.$p->id;
        }
        //将数据插入到数据库中
        if(DB::table('cates')->insert($data)) {
            return redirect('/cate')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = DB::table('cates')->where('id',$id)->first();
        $path = $cate->path .'_'.$cate->id;
        $res = DB::table('cates')->where('path','like',$path.'%')->delete();

        if(DB::table('cates')->where('id',$id)->delete()) {
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        };
    }
}
