<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller 
{
    function index(){
        $blogs = DB::table('blogs')->get();
        // return $blogs;
        return view('blog', ['data' => $blogs]);
        // return 'sesuatu';
    }
}
?>