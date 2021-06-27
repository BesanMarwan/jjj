<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\StaticPage;

class StaticPageController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:الصفحات الثابتة', ['only' => ['index']]);
        $this->middleware('permission:اضافة الصفحة', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل الصفحات', ['only' => ['edit','update']]);
        $this->middleware('permission:حدف الصفحة', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $staticPages = StaticPage::select('id','title','content','created_at')->get();
        return view('admin.pages.staticPages.index',compact('staticPages'));
    }

    public function create(){
        return view('admin.pages.staticPages.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $messages=[
            'title.required'=>'يرجى ادخال عنوان الصفحة لاضافاتها ..',
            'title.unique'=>'هذه الصفحة موجودة مسبقا ..',
            'content.required'=>'يجب ادخال محتوى للصفحة ليتم اضافتها',
        ];
        $request->validate([
            'title' => 'required|unique:static_pages|max:255',
            'content'=>'required',
            'slug'=>'required',

        ],$messages);

        try {
            //$validated = $request->validated();
            $staticPage          = new StaticPage();
            $staticPage->title   = $request->title;
            $staticPage->content = $request->content;
            $staticPage->slug    = $request->slug;
            $staticPage->save();
            if(! $staticPage ){
                toastr()->errors(' فشل عملية اضافة الصفحة :( ');
                return redirect()->route('admin.pages.index');
            }
            toastr()->success('تم اضافة الصفحة بنجاح');
            return redirect()->route('admin.pages.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }
    public function edit($id)
    {
        try {
            $staticPage = StaticPage::findOrFail($id);
            return view('admin.pages.staticPages.edit', compact(['staticPage']));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
       try {

            $messages=[
                'title.required'=>'يرجى ادخال عنوان الصفحة لاضافاتها ..',
                //'title.unique'=>'هذه الصفحة موجودة مسبقا ..',
               // 'content.required'=>'يجب ادخال محتوى للصفحة ليتم اضافتها',

            ];
           /* $request->validate([
                'title' => 'required|unique:static_pages|max:255',
                //'content'=>'required',
            ],$messages);*/

            $staticPage = StaticPage::findOrFail($request->id);
            $staticPage->update([
                'title'   =>  $request->title,
                'content' =>$request->content,
                'slug'    => $request->slug,

            ]);
            toastr()->success('تم التعديل ع الصفحة بنجاح');
            return redirect()->route('admin.pages.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage().$request->content]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {

            try {
                $staticPage = StaticPage::findOrFail($request->id)->delete();
                if (!$staticPage) {
                    toastr()->error('فشل عمليه الحدف! ..');
                    return redirect()->route('admin.pages.index');
                }
                toastr()->error('تم حدف الصفحة بنجاح ..');
                return redirect()->route('admin.pages.index');

            }catch(\Exception $exception){
                return redirect()->back()->withErrors(['error' => $exception->getMessage()]);

            }



    }
}
