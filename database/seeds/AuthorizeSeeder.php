<?php

use Illuminate\Database\Seeder;

class AuthorizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = [
            "slug" => "admin",
            "name" => "Admin",
            "permissions" => [
                "admin" => true
                ]
            ];
            Sentinel::getRoleRepository()->createModel()->fill($role_admin)->save();
            //$adminrole = Sentinel::findRoleByName('Admin');
            //$user_admin = ["first_name"=>"M", "last_name"=>"Admin",
            //"email"=>"madmin@mail.com", "password"=>"12345678"];
            //$adminuser = Sentinel::registerAndActivate($user_admin);
            //$adminuser->roles()->attach($adminrole);
            ///// this for seed data writer

            $role_applicant = [
            "slug" => "applicant",
            "name" => "applicant",
                "permissions" => [
                "users.index" => true,
                "users.create" => true,
                "users.store" => true,
                "users.show" => true,
                "users.edit" => true,
                "users.update" => true,
                "users.destroy" => true,
                "app_submission" => true
                ]
            ];
            Sentinel::getRoleRepository()->createModel()->fill($role_applicant)->save();
            //$writerrole = Sentinel::findRoleByName('Writer');
            //$user_writer = ["first_name"=>"Oda", "last_name"=>"E",
            //"email"=>"oda@e.com", "password"=>"12345678"];
            //$writeruser = Sentinel::registerAndActivate($user_writer);
    }
}
