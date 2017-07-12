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
        $student->description = 'can join and attend courses';
        $student->save();

        $member = new Role();
        $member->name = 'new-member';
        $member->display_name = 'New Member';
        $member->description = 'Initial Status upon registration, has no abilities';
        $member->save();

        // build permissions
        $add_courses = new Permission();
        $add_courses->name = 'add_courses';
        $add_courses->display_name = 'Create Courses';
        $add_courses->description = 'add a course for students to join';
        $add_courses->save();

        $edit_users = new Permission();
        $edit_users->name = 'edit_users';
        $edit_users->display_name = 'User Permissions';
        $edit_users->description = 'can edit and promote users to other roles';
        $edit_users->save();

        $join_courses = new Permission();
        $join_courses->name = 'join_courses';
        $join_courses->display_name = 'Can Enroll';
        $join_courses->description = 'can enroll as student or observer';
        $join_courses->save();

        // UserTableSeeder will make default accounts, here we will seed it with the admin role.
        // select the admin
        $user = User::where('name', '=', 'administrator')->first();
        // attach the 'admin' role to the 'administrator'
        $user->attachRole($admin);

        // select the teacher
        $user = User::where('name', '=', 'teacher')->first();
        // attach teacher role
        $user->attachRole($teacher);

        // select the student
        $user = User::where('name', '=', 'student')->first();
        // attach student role
        $user->attachRole($student);

        // finally we attach the roles to the permissions.
        //admin has all
        $admin->attachPermissions(array($add_courses, $edit_users, $join_courses));

        // teacher can create courses
        $teacher->attachPermission($add_courses, $join_courses);

        // student can join courses
        $student->attachPermission($join_courses);

    }
}
