<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class PermissionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'user.view'],
            ['name' => 'user.create'],
            ['name' => 'user.update'],
            ['name' => 'user.delete'],

            ['name' => 'language.view'],
            ['name' => 'language.create'],
            ['name' => 'language.update'],
            ['name' => 'language.delete'],

            ['name' => 'role.view'],
            ['name' => 'role.create'],
            ['name' => 'role.update'],
            ['name' => 'role.delete'],

            ['name' => 'configuration.view'],
            ['name' => 'configuration.create'],
            ['name' => 'configuration.update'],
            ['name' => 'configuration.delete'],

            ['name' => 'news.view'],
            ['name' => 'news.create'],
            ['name' => 'news.update'],
            ['name' => 'news.delete'],

            ['name' => 'newsCategory.view'],
            ['name' => 'newsCategory.create'],
            ['name' => 'newsCategory.update'],
            ['name' => 'newsCategory.delete'],


            ['name' => 'PackageOption.view'],
            ['name' => 'PackageOption.create'],
            ['name' => 'PackageOption.update'],
            ['name' => 'PackageOption.delete'],

            ['name' => 'Package.view'],
            ['name' => 'Package.create'],
            ['name' => 'Package.update'],
            ['name' => 'Package.delete'],

            ['name' => 'Slider.view'],
            ['name' => 'Slider.create'],
            ['name' => 'Slider.update'],
            ['name' => 'Slider.delete'],

            ['name' => 'SliderService.view'],
            ['name' => 'SliderService.create'],
            ['name' => 'SliderService.update'],
            ['name' => 'SliderService.delete'],


            ['name' => 'book.view'],
            ['name' => 'book.delete'],

            ['name' => 'faq.view'],
            ['name' => 'faq.create'],

            ['name' => 'subscriber.view'],
            ['name' => 'subscriber.create'],

            ['name' => 'page.view'],
            ['name' => 'page.create'],


            



        ];

        $insert_data = [];
        $time_stamp = Carbon::now();
        foreach ($data as $d) {
            $d['guard_name'] = 'admin';
            $d['created_at'] = $time_stamp;
            $insert_data[] = $d;
        }
        Permission::insert($insert_data);
    }
}
