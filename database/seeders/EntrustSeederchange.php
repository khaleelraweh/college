<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelstatistics;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Dictionary : 
     *              01- Roles 
     *              02- Users
     *              03- AttachRoles To  Users
     *              04- Create random customer and  AttachRole to customerRole
     * 
     * 
     * @return void
     */
    public function run()
    {

        //colleges and Institutes menu
        $manageCollegeMenus = Permission::create(['name' => 'manage_college_menus', 'display_name' => ['ar'    =>  'إدارة الأقسام العليمة', 'en'   =>  'Scientific Departments'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageWebMenus->id, 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '90',]);
        $manageCollegeMenus->parent_show = $manageCollegeMenus->id;
        $manageCollegeMenus->save();
        $showCollegeMenus    =  Permission::create(['name' => 'show_college_menus',  'display_name' => ['ar'    =>  ' إدارة الأقسام العلمية',   'en'    =>  'Manage Scientific Departments'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '1', 'appear' => '1']);
        $createCollegeMenus  =  Permission::create(['name' => 'create_college_menus', 'display_name'  => ['ar'  =>  ' إضافة قسم علمي  ',   'en'    =>  'Add Scientific Departments'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.create', 'icon' => null, 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $displayCollegeMenus =  Permission::create(['name' => 'display_college_menus', 'display_name'  => ['ar'  =>  'عرض كلية قسم علمي ',   'en'    =>  'Display Scientific Departments'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.show', 'icon' => null, 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $updateCollegeMenus  =  Permission::create(['name' => 'update_college_menus', 'display_name'  => ['ar'  =>  'تعديل كلية قسم علمي ',   'en'    =>  'Edit Scientific Departments'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.edit', 'icon' => null, 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $deleteCollegeMenus  =  Permission::create(['name' => 'delete_college_menus', 'display_name'  => ['ar'  =>  'حذف كلية قسم علمي ',   'en'    =>  'Delete Scientific Departments'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.destroy', 'icon' => null, 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
    }
}
