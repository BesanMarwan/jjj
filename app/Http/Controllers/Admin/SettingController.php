<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Spatie\Valuestore\Valuestore;

class SettingController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:الاعدادات'      ,  ['only' => ['index']]);
        $this->middleware('permission:عرض الاعدادات'  , ['only' => ['index']]);
        $this->middleware('permission:تعديل الاعدادات', ['only' => ['edit','update']]);

    }

    public function index()
        {


            $section = (isset(\request()->section) && \request()->section != '') ? \request()->section : 'عام';
            $settings_sections = Setting::select('section')->distinct()->pluck('section');
            $settings = Setting::whereSection($section)->get();

            return view('admin.pages.setting.index', compact('section', 'settings_sections', 'settings'));

        }

        public function update(Request $request, $id)
        {
            for ($i = 0; $i < count($request->id); $i++) {
                $input['value'] = isset($request->value[$i]) ? $request->value[$i] : null;
                Setting::whereId($request->id[$i])->first()->update($input);
            }
            $this->generateCache();
            toastr()->success('تم تعديل الاعدادات بنجاح');


            return redirect()->route('admin.settings.index');
        }

        private function generateCache()
        {
            $settings = Valuestore::make(config_path('settings.json'));
            Setting::all()->each(function ($item) use ($settings) {
                $settings->put($item->key, $item->value);
            });
        }
}
