<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class permissison_controller extends Controller
{
    //

    public function add(){

   try{
      DB::statement('ALTER TABLE expense_categories  ADD COLUMN term TEXT');
    DB::statement('ALTER TABLE sales_items  ADD COLUMN image VARCHAR(200)');
   }catch(\Exception){


   }


   $check_settings  =  Setting::where('key'  ,  'email_smtp')->first();

   if(!isset($check_settings->id)){

   Setting::create(['key' => 'email_smtp', 'value' => 'message@cutrico.12dot8.mt', 'group' => Setting::GROUP_GENERAL]);
   Setting::create(['key' => 'password_smtp', 'value' => 'uY$*};v?9x8s', 'group' => Setting::GROUP_GENERAL]);
   Setting::create(['key' => 'host_smtp', 'value' => 'mail.cutrico.12dot8.mt', 'group' => Setting::GROUP_GENERAL]);
   Setting::create(['key' => 'port_smtp', 'value' => '567', 'group' => Setting::GROUP_GENERAL]);

   }

        $permissions = [

            [
                'name' => 'assign_installations',
                'type' => 'Installations',
                'display_name' => 'Assign Installations',
            ],


            [
                'name' => 'manage_installations',
                'type' => 'Installations',
                'display_name' => 'Manage Installations',
            ],

      [
                'name' => 'view_installations',
                'type' => 'Installations',
                'display_name' => 'View installations',
            ],
      [
                'name' => 'manage_products',
                'type' => 'Products',
                'display_name' => 'Manage Products',
            ],


      [
                'name' => 'manage_products_groups',
                'type' => 'Products',
                'display_name' => 'Manage Products Groups',
            ],



      [
                'name' => 'manage_open_warranties',
                'type' => 'Warranties',
                'display_name' => 'Manage Open Warranties',
            ],

      [
                'name' => 'manage_view_warranties',
                'type' => 'Warranties',
                'display_name' => 'Manage View Warranties',
            ],

      [
                'name' => 'manage_void_warranties',
                'type' => 'Warranties',
                'display_name' => 'Manage Void Warranties',
            ],

            [
                'name' => 'manage_new_projects',
                'type' => 'Projects',
                'display_name' => 'New Projects',
            ],


            [
                'name' => 'manage_job',
                'type' => 'Jobs',
                'display_name' => 'Job',
            ],





        ];


        foreach ($permissions as $permission) {
            //check first okay

            $check  =  Permission::where([['name'  ,  $permission['name'] ],
             ['type'  ,  $permission['type'] ],
              ['display_name' ,  $permission['display_name']]
              ] )->count();

            if($check  ==  0 ){

                Permission::create($permission);
            }

        }

        return "done";



    }
}
