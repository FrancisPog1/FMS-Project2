<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

//use App\Models\ActivityType;
use App\Models\Designation;
use App\Models\FacultyType;
use App\Models\Program;
use App\Models\RequirementType;
use App\Models\Specialization;
use App\Models\AcademicRank;
use App\Models\RequirementBin;
use Illuminate\Support\Str;

class CreateAdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // For user role data inject
        $role = Role::create([
            'title' => 'Admin',
        ]);
        $role = Role::create([
            'title' => 'Faculty',
        ]);
        $role = Role::create([
            'title' => 'Staff',
        ]);
        $role = Role::create([
            'title' => 'Director',
        ]);


        // For users account data inject
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'acadhead@pupqc.com',
            'password' => bcrypt('pupqcfarms'),
            'foreign_role_id' => 1,
        ]);
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'faculty@pupqc.com',
            'password' => bcrypt('pupqcfarms'),
            'foreign_role_id' => 2,
        ]);
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'staff@pupqc.com',
            'password' => bcrypt('pupqcfarms'),
            'foreign_role_id' => 3,
        ]);
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'director@pupqc.com',
            'password' => bcrypt('pupqcfarms'),
            'foreign_role_id' => 4,
        ]);


        //--------------------------For Specialization----------------------------//
        $specialization = Specialization::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Human Resource Management',
            'description' => null,
            'created_by' => null,
        ]);
        $specialization = Specialization::create([
            'id' => Str::uuid()->toString(),
            'title' => 'General Psychology',
            'description' => null,
            'created_by' => null,
        ]);
        $specialization = Specialization::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Information Security',
            'description' => null,
            'created_by' => null,
        ]);


        //--------------------------For Requirement Type----------------------------//
        $requirement_type = RequirementType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'QUARTERLY ACCOMPLISHMENT REPORT (QAR)',
            'description' => null,
            'created_by' => null,
        ]);
        $requirement_type = RequirementType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'ONLINE CLASS SCREENSHOT ',
            'description' => null,
            'created_by' => null,
        ]);
        $requirement_type = RequirementType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'GRADESHEET',
            'description' => null,
            'created_by' => null,
        ]);
        $requirement_type = RequirementType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'CLASS RECORD',
            'description' => null,
            'created_by' => null,
        ]);
        $requirement_type = RequirementType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'COPY OF EXAMINATION ',
            'description' => null,
            'created_by' => null,
        ]);
        $requirement_type = RequirementType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'SYLLABI',
            'description' => null,
            'created_by' => null,
        ]);


        //--------------------------For Designation----------------------------//
        $Designation = Designation::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Research Professor',
            'description' => null,
            'created_by' => null,
        ]);
        $Designation = Designation::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Faculty Extentionist',
            'description' => null,
            'created_by' => null,
        ]);
        $Designation = Designation::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Disbursement Officer',
            'description' => null,
            'created_by' => null,
        ]);


        //--------------------------For Academic Rank----------------------------//
        $AcademicRank = AcademicRank::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Professor',
            'description' => null,
            'created_by' => null,
        ]);
        $AcademicRank = AcademicRank::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Instructor',
            'description' => null,
            'created_by' => null,
        ]);


        //--------------------------For Faculty Type----------------------------//
        $facultytype = FacultyType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Regular',
            'description' => null,
            'created_by' => null,
        ]);
        $facultytype = FacultyType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Part-time',
            'description' => null,
            'created_by' => null,
        ]);
        $facultytype = FacultyType::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Temporary',
            'description' => null,
            'created_by' => null,
        ]);


        //--------------------------For Program----------------------------//
        $program = Program::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Bachelor of Science in Information Technology (BSIT)',
            'description' => null,
            'created_by' => null,
        ]);
        $program = Program::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Bachelor of Science in Business Administration (BSBA)',
            'description' => null,
            'created_by' => null,
        ]);
        $program = Program::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Bachelor in Technology and Livelihood Education With Specialization
                            in Information and Communication Technology (BTLED-ICT)',
            'description' => null,
            'created_by' => null,
        ]);


        //-------------------Requiremen Bin-------------------------//
        $requirement_bin = RequirementBin::create([
            'id' => Str::uuid()->toString(),
            'title' => 'First Semester: Faculty Monitoring Report',
            'description' => 'This requirement bin must contain the documents that are used to track
                                the performance of faculty members during the first semester of this academic year.
                                Please comply with the requirements before the deadline',
            'start_datetime' => '2023-07-30 12:00:00',
            'end_datetime' => '2023-07-30 12:00:00',
            'status' => 'Ongoing',
        ]);
        $requirement_bin = RequirementBin::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Second Semester: Faculty Monitoring Report',
            'description' => 'This requirement bin must contain the documents that are used to track
                                the performance of faculty members during the second semester of this academic year.
                                Please comply with the requirements before the deadline',
            'start_datetime' => '2023-07-30 12:00:00',
            'end_datetime' => '2023-07-30 12:00:00',
            'status' => 'Ongoing',
        ]);

    }
}
