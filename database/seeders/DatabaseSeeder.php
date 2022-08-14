<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\kr;
use App\Models\Bank;
use App\Models\DatI;
use App\Models\News;
use App\Models\Role;
use App\Models\User;
use App\Models\DatII;
use App\Models\JobDesk;
use App\Models\BankName;
use App\Models\BankAdmin;
use App\Models\BankGroup;
use App\Models\BankOwner;
use App\Models\OfficeStatus;
use App\Models\BankOperational;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        OfficeStatus::create([
            'office_status' => 'Kantor Cabang Pembantu (Dalam Negeri)'
        ]);
        OfficeStatus::create([
            'office_status' => 'Kantor Cabang (Dalam Negeri)'
        ]);
        OfficeStatus::create([
            'office_status' => 'Kantor Fungsional'
        ]);
        OfficeStatus::create([
            'office_status' => 'Kantor Kas'
        ]);
        OfficeStatus::create([
            'office_status' => 'Kantor Cabang Pembantu (Dalam Negeri) Bank Umum Syariah'
        ]);
        OfficeStatus::create([
            'office_status' => 'Kantor Fungsional Bank Umum Syariah'
        ]);

        BankOperational::create([
            'bank_operational' => 'Bank Konvensional'
        ]);
        BankOperational::create([
            'bank_operational' => 'Bank Syariah'
        ]);

        BankOwner::create([
            'bank_owner' => 'Bank Pemerintah'
        ]);

        DatI::create([
            'dat_i_code' => '58',
            'dat_i_name' => 'Kalimantan Tengah'
        ]);

        DatII::create([
            'dat_i_i_code' => '5804',
            'dat_i_i_name' => 'Kab. Murung Raya'
        ]);

        DatII::create([
            'dat_i_i_code' => '5808',
            'dat_i_i_name' => 'Kab. Barito Utara'
        ]);

        kr::create([
            'kr' => 'KR 9'
        ]);

        JobDesk::create([
            'job_desk' => 'Bank Devisa'
        ]);
        BankName::create([
            'bank_name' => 'PT. Bank Rakyat Indonesia (Persero), Tbk'
        ]);
        BankName::create([
            'bank_name' => 'PT. Bank Mandiri (Persero), Tbk'
        ]);
        Bank::create([
            "id_bank"=> "002",
            "bank_name_id"=> "1",
            "office_status_id"=> "2",
            "bank_operational_id"=> "1",
            "bank_owner_id"=> "1",
            "dat_i_id"=> "1",
            "dat_i_i_id"=> "2",
            "kr_id"=> "1",
            "job_desk_id"=> "1",
            "bank_name"=> "Kot. Palangka Raya admin 1",
            "bank_address"=> "Jl. Patimura",
            "bank_maps"=> "http=>//maps.google.com",
            "bank_pos_code"=> "73112",
            "bank_no_phone"=> "0812312341234",
            "bank_no_permission"=> "IZIN/01/01",
            "bank_date_permission"=> "01 Agustus 2022",
            "bank_date_operation"=> "03 Agustus 2022",
            "bank_status"=> "active",
        ]);
        Bank::create([
            "id_bank"=> "002",
            "bank_name_id"=> "1",
            "office_status_id"=> "2",
            "bank_operational_id"=> "1",
            "bank_owner_id"=> "1",
            "dat_i_id"=> "1",
            "dat_i_i_id"=> "2",
            "kr_id"=> "1",
            "job_desk_id"=> "1",
            "bank_name"=> "Kot. Palangka Raya admin 2",
            "bank_address"=> "Jl. Patimura",
            "bank_maps"=> "http=>//maps.google.com",
            "bank_pos_code"=> "73112",
            "bank_no_phone"=> "0812312341234",
            "bank_no_permission"=> "IZIN/01/01",
            "bank_date_permission"=> "01 Agustus 2022",
            "bank_date_operation"=> "03 Agustus 2022",
            "bank_status"=> "active",
        ]);
        Bank::create([
            "id_bank"=> "002",
            "bank_name_id"=> "2",
            "office_status_id"=> "2",
            "bank_operational_id"=> "1",
            "bank_owner_id"=> "1",
            "dat_i_id"=> "1",
            "dat_i_i_id"=> "2",
            "kr_id"=> "1",
            "job_desk_id"=> "1",
            "bank_name"=> "Kot. Palangka Raya bank 1",
            "bank_address"=> "Jl. Patimura",
            "bank_maps"=> "http=>//maps.google.com",
            "bank_pos_code"=> "73112",
            "bank_no_phone"=> "0812312341234",
            "bank_no_permission"=> "IZIN/01/01",
            "bank_date_permission"=> "01 Agustus 2022",
            "bank_date_operation"=> "03 Agustus 2022",
            "bank_status"=> "active",
        ]);
        Role::create([
            'id'    => 1,
            'role'  => 'superadmin',
        ]);
        Role::create([
            'id'    => 2,
            'role'  => 'admin-bank',
        ]);
        Role::create([
            'id'    => 3,
            'role'  => 'bank',
        ]);

        User::create([
            'name'  => 'superadmin',
            'email'  => 'admin@gmail.com',
            'password' => Hash::make("password"),
            'role_id'  => 1,
        ]);
        User::create([
            'name'  => 'admin-mandiri',
            'email'  => 'admin@gmail.com',
            'password' => Hash::make("password"),
            'role_id'  => 2,
        ]);
        User::create([
            'name'  => 'bank1',
            'email'  => 'admin@gmail.com',
            'password' => Hash::make("password"),
            'role_id'  => 3,
        ]);

        User::create([
            'name'  => 'admin-bri',
            'email'  => 'admin@gmail.com',
            'password' => Hash::make("password"),
            'role_id'  => 2,
        ]);

        BankAdmin::create([//admin bank bri
            'bank_id' => 3,
            'user_id' => 2,
            'phone_number' => '08080808'
        ]);
        BankAdmin::create([//admin mandiri
            'bank_id' => 1,
            'user_id' => 4,
            'phone_number' => '08080808'
        ]);
        
        BankAdmin::create([// bawahan bank bri
            'bank_id' => 2,
            'user_id' => 3,
            'phone_number' => '08080808'
        ]);
        News::create([
            'title' => 'title -aaa',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom',
            'date' => '2 Agustus 2020',
            'photo_path' => 'image/media/s.png'
        ]);
        News::create([
            'title' => 'title -bbb',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom',
            'date' => '2 Agustus 2020',
            'photo_path' => 'image/media/s.png'
        ]);
        News::create([
            'title' => 'title -ccc',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom
             Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Officia laborum, sequi, amet tenetur assumenda sint quaerat natus 
             autem reprehenderit obcaecati eum quam! Tempore accusamus vero nam ullam, 
             magni voluptatibus errom',
            'date' => '2 Agustus 2020',
            'photo_path' => 'image/media/s.png'
        ]);
    }


}
