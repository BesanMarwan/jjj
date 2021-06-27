<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $permissions=[
              'الرئيسية',

              'الاقسام',
              'اضافة قسم',
              'حذف قسم',
              'تعديل قسم',

              'الاخبار',
              'اضافة خبر',
              'تعديل الاخبار',
              'حدف خبر',

              'الصفحات الثابتة',
              'اضافة الصفحة',
              'حدف الصفحة',
              'تعديل الصفحات',

              ' الايميلات',
              ' عرض الايميل',
              ' حدف الايميلات ',

              'المستخدمين',
              'اضافة مستخدم',
              'تعديل صلاحية مستخدم',
              'حذف مستخدم',

              'صلاحيات المستخدمين',
              'عرض صلاحية',
              'اضافة صلاحية',
              'تعديل صلاحية',
              'حذف صلاحية',

              'الاعدادات',
              'عرض الاعدادات',
              'تعديل الاعدادات',
              'الاشعارات',


      ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }


    }
}
