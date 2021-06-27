<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Post;
use App\Models\PostMedia;
use App\Models\Category;
use DB;
use App\Http\Requests\PostRequest;


class PostsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:الاخبار', ['only' => ['index']]);
        $this->middleware('permission:اضافة خبر', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل الاخبار', ['only' => ['edit','update']]);
        $this->middleware('permission:حدف خبر', ['only' => ['delete']]);

    }

    public function index(){
        $posts=Post::select('id','title','category_id','created_at')->get();
        return view('admin.pages.posts.index',compact('posts'));
    }

    public function create(){
        $categories=Category::select('id','name')->get();
        return view('admin.pages.posts.create',compact('categories'));
    }

    public function store(PostRequest $request){

       try{
//         $validated = $request->validated();
        //Store the post info
        DB::beginTransaction();
        $post               = new Post();
        $post->title        = $request->title;
        $post->content      = $request->cont;
        $post->meta_data    = $request->meta_data;
        $post->comment_able = $request->comment;
        $post->category_id  = $request->category;
        $post->user_id      =auth()->user()->id;
        $post->save();

        // maintain the photo and save it
        if ($request->has('uploadfile')) {
            $file     =$request->uploadfile;
            $filePath =uploadImage('posts', $file);
            $fileAlt  =$request->img_title;
            //save image
            $image=$post->media()->create([
            'file_name' => $filePath,
            'alt'       => $fileAlt,
            'file_size' => $file->getSize(),
            'file_type' => $file->getMimeType(),
            ]);
            if($image){
                DB::commit();
            }
            else{
                DB::rollback();

            }
        }

        if(! $post ){
            toastr()->errors(' فشل عملية اضافة الخبر :( ');
            return redirect()->route('admin.posts.index');
        }
        toastr()->success('تم اضافة الخبر بنجاح');
        return redirect()->route('admin.posts.index');
         } catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    public function edit($id){
        try{
        $post      =Post::findOrFail($id);
        $categories=Category::select('id','name')->get();

        return view('admin.pages.posts.edit',compact(['post','categories']));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    public function update(PostRequest $request,$id){
        try {
            $validated = $request->validated();
            //Store the post info
            DB::beginTransaction();
            $post = Post::findOrFail($request->id);
            $post =$post->update([
            'title'        => $request->title,
            'content'      => $request->cont,
            'meta_data'    => $request->meta_data,
            'comment_able' => $request->comment,
            'category_id'  => $request->category,
            'user_id'      =>auth()->user()->id,
                                ]);
            // maintain the photo and save it
            if ($request->has('uploadfile')) {
                $file     =$request->uploadfile;
                $filePath =uploadImage('posts', $file);
                $fileAlt  =$request->img_title;
                //save image
                $image=$post->media()->create([
                'file_name' => $filePath,
                'alt'       => $fileAlt,
                'file_size' => $file->getSize(),
                'file_type' => $file->getMimeType(),
                ]);
                if($image){
                    DB::commit();
                }
                else{
                    DB::rollback();

                }
            }

            if(! $post ){
                toastr()->errors(' فشل عملية تعديل الخبر :( ');
                return redirect()->route('admin.posts.index');
            }
            toastr()->success('تم تعديل الخبر بنجاح');
            return redirect()->route('admin.posts.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function delete(Request $request){
         try {
        $post = Post::findOrFail($request->id);
        if (!$post) {
            toastr()->error('فشل عمليه الحدف! ..');
            return redirect()->route('admin.categories.index');
        }
        /// to delete image from folder
             foreach($post->media as $media) {
                 $image = public_path($media->file_name);
                 unlink($image);
             }

        $post->delete();
        toastr()->error('تم حدف الخبر بنجاح ..');
        return redirect()->route('admin.post.index');
      }catch(\Exception $exception){
        return redirect()->back()->withErrors(['error' => $exception->getMessage()]);

       }
    }


}
