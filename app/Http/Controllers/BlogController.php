<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller 
{
    function index(Request $request){
        // $title  = $request->title;
        // $blogs = DB::table('blogs')->where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'desc')->paginate(10);
        // return view('blog', ['blogs' => $blogs, 'title' => $title]);

        //Eloquent ORM Methode
        $title = $request->title;

        //untuk menampilkan data di softdeletes
        // $blogs = Blog::where('title', 'LIKE', '%'.$title.'%')->withTrashed()->orderBy('id', 'desc')->paginate(10); 

        $blogs = Blog::where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'desc')->paginate(10); 
        return view('blog', ['blogs' => $blogs, 'title' => $title]);

    }

    function add(){
        return view('blog-add');
    }

    function create(Request $request){

        $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required'
        ]); 

        // DB::table('blogs')->insert([
        //     'title' => $request->title,
        //     'description' => $request->description
        // ]);
        Blog::create($request->all());

        Session::flash('message', 'add new blog success');

        return redirect()->route('blog');
    }

    function show($id){
        $blog = Blog::findOrFail($id);
        // if(!$blog){
            //     abort(404);
            // }
        return view('blog-detail',['blog' => $blog]);
    }

    function edit($id){
        $blog = Blog::findOrFail($id);
        return view('blog-edit',['blog' => $blog]);
    }
    
    function update(Request $request, $id){

        $request->validate([
            'title' => 'required|unique:blogs,title,'.$id.'|max:255',
            'description' => 'required'
        ]); 

        $blog = Blog::findOrFail($id);
        $blog->update($request->all());

        Session::flash('message', 'edit new blog success');

        return redirect()->route('blog');
    }

    function delete($id){
        // $blog = DB::table('blogs')->where('id', $id)->delete();

        Blog::findOrFail($id)->delete();

        Session::flash('message', 'delete blog success');

        return redirect()->route('blog');
    }

    function restore($id){
        $blog = Blog::withTrashed()->findOrFail($id)->restore();
    }
}
?>