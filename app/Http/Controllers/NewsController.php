<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\News;

class NewsController extends Controller
{

    public function index()
    {
        $auth_user=Auth::user()->name;
        $news = News::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.news.index',compact('news','auth_user'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {

        $data = [
            'header' => $request->get('header'),
            'description' => $request->get('description'),
            'summary' => $request->get('summary'),
            'image' => $request->file('image')
        ];
        $rules = [
            'header' => 'required|min:5',
            'description' => 'required',
            'summary' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $data['image'] = Image::make($request->file('image')->getRealPath());
            $path = ('images/'.$filename);
            $data['image']->save($path);
            $data['image']=$filename;
        }
        $data['user_id'] = Auth::user()->id;
        News::create($data);


        return redirect()->to('user/news');

    }

//    public function show($id)
//    {
//
//        $new = News::where('id', $id)->first();
//        return view('admin.news.show',compact('new'));
//
//    }

    public function show_user_news($id)
    {

        $new= News::where('user_id',$id)->first();
        return  view('admin.news.show',compact('new'));
    }




}
