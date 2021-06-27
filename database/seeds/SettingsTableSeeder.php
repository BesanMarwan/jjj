<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['display_name' => 'اسم الموقع', 'key' => 'site_title', 'value' => 'on Time', 'type' => 'text', 'section' => 'عام', 'ordering' => 1]);
        Setting::create([ 'display_name' => 'لوجو الموقع ', 'key' => 'site_logo', 'value' => 'images/logo.png', 'details' => null, 'type' => 'image', 'section' => 'عام', 'ordering' => 2]);
        Setting::create([ 'display_name' => 'وصف الموقع', 'key' => 'site_description', 'value' => 'هو موقع اخباري يقوم على توفير خدمة للأخبار تسهل على المستفيدين عناء البحث عن المعلومات الإخبارية فى خضم العديد من المواقع الإخبارية ، و تعمل على تنظيم المعلومات الإخبارية وتقسيمها إلى قطاعات موضوعية تناسب إحتياجات كل مستفيد .

', 'details' => null, 'type' => 'textarea', 'section' => 'عام', 'ordering' => 3]);
        Setting::create([ 'display_name' => 'البريد الالكتروني للموقع', 'key' => 'site_email', 'value' => 'besanmarwan2000@gmail.com', 'details' => null, 'type' => 'text', 'section' => 'عام', 'ordering' => 5]);
        Setting::create([ 'display_name' => 'حاله الموقع', 'key' => 'site_status', 'value' => 'Active', 'details' => null, 'type' => 'text', 'section' => 'عام', 'ordering' => 6]);
        Setting::create([ 'display_name' => 'رقم الخاص بالموقع', 'key' => 'phone_number', 'value' => '05123456789', 'details' => null, 'type' => 'text', 'section' => 'عام', 'ordering' => 7]);

        Setting::create([ 'display_name' => 'رابط الفيسبوك', 'key' => 'facebook_id', 'value' => 'https://www.facebook.com/', 'details' => null, 'type' => 'text', 'section' => 'حسابات التواصل', 'ordering' => 1]);
        Setting::create([ 'display_name' => 'رابط التويتر', 'key' => 'twitter_id', 'value' => 'https://twitter.com/', 'details' => null, 'type' => 'text', 'section' => 'حسابات التواصل', 'ordering' => 2]);
        Setting::create([ 'display_name' => 'رابط الانستغرام', 'key' => 'instagram_id', 'value' => 'https://instagram.com/', 'details' => null, 'type' => 'text', 'section' => 'حسابات التواصل', 'ordering' => 3]);
        Setting::create([ 'display_name' => ' رابط اليوتيوب', 'key' => 'youtube_id', 'value' => 'https://www.youtube.com/', 'details' => null, 'type' => 'text', 'section' => 'حسابات التواصل', 'ordering' => 4]);
        Setting::create([ 'display_name' => ' رابط الواتساب', 'key' => 'whatsapp_id', 'value' => 'https://www.youtube.com/', 'details' => null, 'type' => 'text', 'section' => 'حسابات التواصل', 'ordering' => 5]);

    }
}
