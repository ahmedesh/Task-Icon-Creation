<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([ // دا بيانات مستخدم هتنزل تلقائي فالداتابيز ف حاله لو مفيش يوز بيكريتلي يوزر افتراضي بالداتا دي
//            DB::table('users')->insert([  // طريقه اخري
            'name'      => 'ads',
            'email'     => 'ahmedesh199@gmail.com',
            'password'  => bcrypt('ads123'),
        ]);
        Device::create([ // دا بيانات مستخدم هتنزل تلقائي فالداتابيز ف حاله لو مفيش يوز بيكريتلي يوزر افتراضي بالداتا دي
//            DB::table('users')->insert([  // طريقه اخري
            'user_id'      => 1,
        ]);
    }
}
