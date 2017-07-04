<?php

use App\User as User;
use App\Role as Role;
use App\Permission as Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // build roles
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrator';
        $admin->description = 'administer the website and manage users';
        $admin->save();

        $teacher = new Role();
        $teacher->name = 'teacher';
        $teacher->display_name = 'Professors, Teachers, Faculty';
        $teacher->description = 'allows class creation';
        $teacher->save();

        $student = new Role();
        $student->name = 'student';
        $student->display_name = 'Student';
        $student->description = 'can join and attend classes';
        $student->save();

        $member = new Role();
        $member->name = 'new-member';
        $member->display_name = 'New Member';
        $member->description = 'Initial Status upon registration, has no abilities';
        $member->save();

        // build permissions
        $can_add_classes = new Permission();
        $can_add_classes->name = 'can_add_classas';
        $can_add_classes->display_name = 'Create Classes';
        $can_add_classes->description = 'add a class for students to join';
        $can_add_classes->save();

        $can_edit_users = new Permission();
        $can_edit_users->name = 'can_edit_users';
        $can_edit_users->display_name = 'User Permissions';
        $can_edit_users->description = 'can edit and promote users to other roles';
        $can_edit_users->save();

        $can_join_classes = new Permission();
        $can_join_classes->name = 'can_join_classes';
        $can_join_classes->display_name = 'Can Enroll';
        $can_join_classes->description = 'can enroll as student or observer';
        $can_join_classes->save();

        // UserTableSeeder will make a default account, here we will seed it with the admin role.
        // select the user.
        $user = User::where('name', '=', 'administrator')->first();
        // attach the 'admin' role to the 'administrator'
        $user->attachRole($admin); // parameter can be an Role object, array, or id

        // finally we attach the roles to the permissions.
        //admin has all
        $admin->attachPermissions(array($can_add_classes, $can_edit_users, $can_join_classes));

        // teacher can create classes
        $teacher->attachPermission($can_add_classes);

        // student can join classes
        $student->attachPermission($can_join_classes);

    }
}
