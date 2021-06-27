<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:الاقسام', ['only' => ['index']]);
        $this->middleware('permission:اضافة قسم', ['only' => ['store']]);
        $this->middleware('permission:تعديل قسم', ['only' => ['update']]);
        $this->middleware('permission:حذف قسم', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.categories.index',compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $messages=[
            'name.required'=>'يرجى ادخال اسم القسم لاضافته ..',
            'name.unique'=>'هذا القسم موجود مسبقا ..',
        ];
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ],$messages);

        try {
            //$validated = $request->validated();
            $category             = new Category();
            $category->name        = $request->name;
            $category->description = $request->description;
            $category->save();
            if(! $category ){
                toastr()->errors(' فشل عملية اضافة القسم :( ');
                return redirect()->route('admin.categories.index');
            }
            toastr()->success('تم اضافة القسم بنجاح');
            return redirect()->route('admin.categories.index');
        }

        catch (\Exception $e){
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
                'name.required'=>'يرجى ادخال اسم القسم لاضافته ..',
                'name.unique'=>'هذا القسم موجود مسبقا ..',
            ];
            $request->validate([
                'name' => 'required',
            ],$messages);

            $category = Category::findOrFail($request->id);
            $category->update([
                'name'        =>  $request->name,
                'description' => $request->description,
            ]);
            toastr()->success('تم التعديل ع القسم بنجاح');
            return redirect()->route('admin.categories.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
                $category = category::findOrFail($request->id)->delete();
                if (!$category) {
                    toastr()->error('فشل عمليه الحدف! ..');
                    return redirect()->route('admin.categories.index');
                }
               toastr()->error('تم حدف القسم بنجاح ..');
                return redirect()->route('admin.categories.index');
            }catch(\Exception $exception){
                return redirect()->back()->withErrors(['error' => $exception->getMessage()]);

            }

    }
}

?>
