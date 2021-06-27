<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use DB;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:المستخدمين'        , ['only' => ['index'         ]]);
        $this->middleware('permission:اضافة مستخدم'      , ['only' => ['create','store']]);
        $this->middleware('permission:تعديل صلاحية مستخدم', ['only' => ['update','edit' ]]);
        $this->middleware('permission:حذف مستخدم'        , ['only' => ['destroy'       ]]);
    }

    public function index()
    {
        $users =User::select('id','user_image','name','username','bio','email','status','created_at')->paginate(10);
        return view('admin.pages.users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.pages.users.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $user_image='';
        try {
            $user              = new User();
            $user->name        = $request->name;
            $user->username    = $request->username;
            $user->email       = $request->email;
            $user->password    = bcrypt($request->password);
            $user->bio         = $request->bio;
            $user->status      = $request->status;
            $user->roles_name  =$request->input('roles_name')[0];
            if ($request->has('user_image')) {
                $user_image    = uploadImage('users', $request->user_image);
            }
            $user->user_image  = $user_image;
            $user->save();
            $user->assignRole($request->input('roles_name')[0]);
            if(! $user ){
                toastr()->errors(' فشل عملية اضافة المستخدم :( ');
                return redirect()->route('users.index');
            }
            toastr()->success('تم اضافة المستخدم بنجاح');
            return redirect()->route('users.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $user = User::find($id);
            return view('admin.pages.users.show', compact('user'));
            if(! $user) {
                toastr()->error('هذا المستخدم غير موجود :(');
                return redirect()->route('users.index');
            }
        }catch(\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function editProfile($id)
    {
        try{
            $user      =User::findOrFail($id);
            return view('admin.pages.users.editProfile',compact('user'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateProfile(Request  $request)
    {
        try {
            $user = User::findOrFail(auth()->user()->id);
            $user->update([
                'name'        =>  $request->name,
                'username'    => $request->username,
                'email'       => $request->email,
                'password'    => bcrypt($request->password),
                'bio'         => $request->bio,
                ]);
            if ($request->has('user_image')) {
                $user_image    = uploadImage('users', $request->user_image);
                $image = public_path($user_image);
                unlink($user_image);
                $user->update([
                   'user_image' =>$user_image
                ]);
            }
            toastr()->success('تم التعديل ع بياناتك  بنجاح');
            return redirect()->route('users.show',auth()->user()->id);
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{
            $user      =User::findOrFail($id);
            $roles     = Role::pluck('name','name')->all();
            $userRole  = $user->roles->pluck('name','name')->all();
            return view('admin.pages.users.edit',compact('user','roles','userRole'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'roles_name'    =>$request->input('roles_name')[0],
                'status'        => $request->status,
            ]);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles_name')[0]);
            toastr()->success('تم التعديل ع صلاحيات المستخدم  بنجاح');
            return redirect()->route('users.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {

        try {
            $user = User::findOrFail($request->id)->delete();
            if (!$user) {
                toastr()->error('فشل عمليه الحدف! ..');
                return redirect()->route('users.index');
            }
            toastr()->error('تم حدف المستخدم بنجاح ..');
            return redirect()->route('users.index');
        }catch(\Exception $exception){
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);

        }

    }

}
