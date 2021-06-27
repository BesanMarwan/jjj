<?php

namespace App\Http\Controllers\Front;
use App\Models\Currency;
use App\Models\Weather;
use Illuminate\Support\Facades\Http;
use App\Events\PostViewer;
use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\StaticPage;
use DB;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories    =Category::select('id','name')->get();
        $postEcno_lg   =Post::where('category_id',2)->latest()->orderBy('id','desc')->first();
        $newEcnoId     =Post::where('category_id',2)->latest()->first()->id;
        $postEcno      =Post::where([['id', '<', $newEcnoId],['category_id',2]])->latest()->limit(2)->get();
        $postOpin_lg   =Post::where('category_id',8)->latest()->orderBy('id','desc')->first();
        $newOpinId     =Post::where('category_id',2)->latest()->first()->id;
        $postOpin      =Post::where([['id', '<>', $newOpinId],['category_id',8]])->latest()->limit(2)->get();
        $newCars       =Post::where('category_id',9)->limit(4)->orderBy('id')->get();
        $newEstate     =Post::where('category_id',5)->limit(6)->get();
        $newComp       =Post::where('category_id',4)->limit(4)->orderBy('id')->get();
        $newCook       =Post::where('category_id',3)->latest()->first();
        $newCookId     =Post::where('category_id',3)->latest()->first()->id;
        $preCook       =Post::where([['id', '<', $newCookId],['category_id',3]])->orderBy('id','desc')->limit(4)->get();
        $newTech       =Post::where('category_id',1)->latest()->first();
        $newTechId     =Post::where('category_id',1)->latest()->first()->id;
        $preTech       =Post::where([['id', '<', $newTechId],['category_id',1]])->orderBy('id','desc')->limit(4)->get();
        $newTrav       =Post::where('category_id',6)->latest()->first();
        $newTravId     =Post::where('category_id',6)->latest()->first()->id;
        $preTrav       =Post::where([['id', '<', $newTravId],['category_id',6]])->orderBy('id','desc')->limit(2)->get();
        $travpre3      =Post::count()-3;
        $preTrav3      =Post::where('id', '<', $travpre3)->orderBy('id','desc')->limit(4)->get();
        $moreRead      =Post::where('viewer_count', '>', 0)->orderBy('id','desc')->limit(3)->get();
        $postRand      =Post::select('id','title','created_at')->with('media')->inRandomOrder()->first();
        $id            =Post::select('id','title','created_at')->with('media')->inRandomOrder()->first()->id;
        $postRand2     =Post::select('id','title','created_at')->with('media')->inRandomOrder()->limit(2)->get();
        $latest        =Post::select('id','title','created_at')->with(['media','category'])->orderBy('id','desc')->limit(5)->get();

        //fetch api wheather and currency Transfer
        $weather       =Weather::select('id','temp')->first();
        $currency      =Currency::select('currency','equivalentILS')->get();


        return view('front.index',compact([
            'categories','postEcno_lg','postEcno','postOpin_lg','postOpin','newCars','newComp','newEstate','newCook','preCook',
            'newTech','preTech','newTrav','preTrav','preTrav3','moreRead','postRand','postRand2','latest','weather','currency'
                                              ]));
    }

    public function showCategory($id){
        try{
            $categories     =Category::select('id','name')->get();
            $category       =Category::findOrFail($id);
            //fetch api wheather and currency Transfer
            $weather       =Weather::select('id','temp')->first();
            $currency      =Currency::select('currency','equivalentILS')->get();

            if(! $category){
                return view('front.layouts.site');
            }
            return view('front.pages.category',compact(['categories','category','weather','currency']));

            }catch(\Exception $e){
                return redirect()->back();

            }
    }
    public function getPost($id){
        try{
            $categories     =Category::select('id','name')->get();
            $post           =Post::findOrFail($id);
//            $cat          =$post->category()->pluck('categories.id');

            //fetch api wheather and currency Transfer
            $weather       =Weather::select('id','temp')->first();
            $currency      =Currency::select('currency','equivalentILS')->get();

            $postRand1      =Post::where('id','!=',$id)->inRandomOrder()->first();
            $postRand3      =Post::where('id','!=',$id)->inRandomOrder()->Limit(3)->get();

            if(! $post){
                return view('front.index');
            }
            event(new PostViewer($post));
            return view('front.pages.post',compact(['categories','post','postRand1','postRand3','weather','currency']));

        }catch(\Exception $e){
            return redirect()->back();

        }
    }
    public function search(Request $request){
        $search         = $request->search;
        $posts          =Post::where('title', 'like', '%'.$search.'%')->select('id','title','created_at')->with('media')->get();
        $categories     =Category::select('id','name')->get();

        //fetch api wheather and currency Transfer
        $weather       =Weather::select('id','temp')->first();
        $currency      =Currency::select('currency','equivalentILS')->get();

        return view('front.pages.search',compact(['search','posts','categories','weather','currency']));

    }

   public function staticPage($slug){
       /* $staticPage     =StaticPage::where('id',1);
        $categories     =Category::select('id','name')->get();
        return $staticPage;*/
//        return view ('front.pages.staticPages',compact('staticPage','categories'));
    }



}

