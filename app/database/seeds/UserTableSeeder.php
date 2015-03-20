<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/9/2014
 * Time: 12:45 PM
 */
class UserTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();

        DB::table('users')->delete();

        $user = new User;
        $user->username = 'admin';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('foobar');
        $user->save();

        // alternative to eloquent we can also use direct database-methods
        /*
        User::create(array(
            'username'  => 'admin',
            'password'  => Hash::make('password'),
            'email'     => 'admin@localhost'
        ));
        */
    }
}