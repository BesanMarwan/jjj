<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class AdminController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:الرئيسية', ['only' => ['index']]);
    }

        public function index(){
          $user    =User::count();
          $category=Category::count();
          $news    =Post::count();
          return view ('admin.dashboard',compact(['user','category','news']));
   }
}

?>
