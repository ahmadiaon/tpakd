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
use App\Models\Grafik;
use App\Models\JobDesk;
use App\Models\BankName;
use App\Models\BankAdmin;
use App\Models\BankGroup;
use App\Models\BankOwner;
use App\Models\GrafikDua;
use App\Models\OfficeStatus;
use App\Models\BankOperational;
use Illuminate\Database\Seeder;
use App\Models\FinancialInformation;
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
            'id'    => 1,
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
            'id'    => 2,
            "id_bank"=> "002",
            "bank_name_id"=> "1",
            "office_status_id"=> "2",
            "bank_operational_id"=> "1",
            "bank_owner_id"=> "1",
            "dat_i_id"=> "1",
            "dat_i_i_id"=> "2",
            "kr_id"=> "1",
            "job_desk_id"=> "1",
            "bank_name"=> "Kot. Palangka Raya Anak 1 bank 1",
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
            'id'    => 3,
            "id_bank"=> "002",
            "bank_name_id"=> "1",
            "office_status_id"=> "2",
            "bank_operational_id"=> "1",
            "bank_owner_id"=> "1",
            "dat_i_id"=> "1",
            "dat_i_i_id"=> "2",
            "kr_id"=> "1",
            "job_desk_id"=> "1",
            "bank_name"=> "Kot. Palangka anak 2 bank 1",
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

        // Superadmin
        User::create([
            'id'    => 1,
            'name'  => 'superadmin',
            'email'  => 'admin@gmail.com',
            'password' => Hash::make("password"),
            'role_id'  => 1,
        ]);
         // admin bank
        User::create([
            'id'    => 2,
            'name'  => 'admin-bank-1',
            'email'  => 'adminbank1@gmail.com',
            'password' => Hash::make("password"),
            'role_id'  => 2,
        ]);
        // bank 1 
        User::create([
            'id'    => 3,
            'name'  => 'group-1-bank-1',
            'email'  => 'group_1_bank_1@gmail.com',
            'password' => Hash::make("password"),
            'role_id'  => 3,
        ]);
        //bank 2
        User::create([
            'id'    => 4,
            'name'  => 'group-1-bank-2',
            'email'  => 'group_1_bank_2@gmail.com',
            'password' => Hash::make("password"),
            'role_id'  => 3,
        ]);

        BankAdmin::create([//admin bank
            'bank_id' => 1,
            'user_id' => 2,
            'phone_number' => '08080808'
        ]);
        Grafik::create([//admin bank
            'id' => 1,
            'is_aktif' => 1
        ]);
        GrafikDua::create([//admin bank
            'id' => 1,
            'is_aktif' => 1
        ]);
        BankAdmin::create([//anak admin 1
            'bank_id' =>2,
            'user_id' => 3,
            'phone_number' => '08080808'
        ]);
        
        BankAdmin::create([// anak admin 2
            'bank_id' =>3,
            'user_id' => 4,
            'phone_number' => '08080808'
        ]);

        News::create([
            'title' => 'title -aaa',
            'slug'  => 'satu',
            'little_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
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
             'paragrafh_1'   => 'paragrafh 1',
             'paragrafh_2'   => 'paragrafh 2',
             'paragrafh_3'   => 'paragrafh 3',
            'date' => '2020-08-22',
            'photo_path' => 'image/media/s.png'
        ]);
        News::create([
            'title' => 'title -bbb',
            'slug'  => 'dua',
            'little_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
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
             'paragrafh_1'   => 'paragrafh 1',
             'paragrafh_2'   => 'paragrafh 2',
             'paragrafh_3'   => 'paragrafh 3',
             'date' => '2020-08-22',
            'photo_path' => 'image/media/s.png'
        ]);
        News::create([
            'title' => 'title -ccc',
            'slug'  => 'tiga',
            'little_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
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
             'date' => '2020-08-22',
            'paragrafh_1'   => 'paragrafh 1',
            'paragrafh_2'   => 'paragrafh 2',
            'paragrafh_3'   => 'paragrafh 3',
            'photo_path' => 'image/media/s.png'
        ]);

        FinancialInformation::create(
            [
                'id'    => 1,
                'title' => 'Ini Judul',
                'slug'  => 'kur',
                'financial' => 'KUR',
                'litte_description'=> 'Program Kredit Usaha Rakyat (KUR) adalah salah satu program pemerintah dalam meningkatkan akses pembiayaan kepada Usaha Mikro, Kecil, dan Menengah (UMKM) yang disalurkan melalui lembaga keuangan dengan pola penjaminan.',
                'paragrafh_1'   => 'paragrafh 1',
                'paragrafh_2'   => 'paragrafh 2',
                'paragrafh_3'   => 'paragrafh 3',
                'path_image'=>'image/media/s.png'
            ]);
            FinancialInformation::create(
                [
                    'id'    => 2,
                    'title' => 'Ini Judul',
                    'slug'  => 'k-pmr',
                    'financial' => 'K-PMR',
                    'litte_description'=> 'K-PMR Program Kredit Usaha Rakyat (KUR) adalah salah satu program pemerintah dalam meningkatkan akses pembiayaan kepada Usaha Mikro, Kecil, dan Menengah (UMKM) yang disalurkan melalui lembaga keuangan dengan pola penjaminan.',
                    'paragrafh_1'   => 'paragrafh 1',
                    'paragrafh_2'   => 'paragrafh 2',
                    'paragrafh_3'   => 'paragrafh 3',
                    'path_image'=>'image/media/s.png'
                ]);
            FinancialInformation::create(
                [
                    'id'    => 3,
                    'slug'  => 'buka-rekening',
                    'title' => 'Ini Judul',
                    'financial' => 'Buka Rekening',
                    'litte_description'=> 'Buka Rekening Program Kredit Usaha Rakyat (KUR) adalah salah satu program pemerintah dalam meningkatkan akses pembiayaan kepada Usaha Mikro, Kecil, dan Menengah (UMKM) yang disalurkan melalui lembaga keuangan dengan pola penjaminan.',
                    'paragrafh_1'   => 'paragrafh 1',
                    'paragrafh_2'   => 'paragrafh 2',
                    'paragrafh_3'   => 'paragrafh 3',
                    'path_image'=>'image/media/s.png'
                ]);
            FinancialInformation::create(
                [
                    'id'    => 4,
                    'slug'  => 'simple',
                    'title' => 'Ini Judul',
                    'financial' => 'SIMPLE',
                    'litte_description'=> 'SIMPLE adalah salah satu program pemerintah dalam meningkatkan akses pembiayaan kepada Usaha Mikro, Kecil, dan Menengah (UMKM) yang disalurkan melalui lembaga keuangan dengan pola penjaminan.',
                    'paragrafh_1'   => 'paragrafh 1',
                    'paragrafh_2'   => 'paragrafh 2',
                    'paragrafh_3'   => 'paragrafh 3',
                    'path_image'=>'image/media/s.png'
                ]);
            FinancialInformation::create(
                [
                    'id'    => 5,
                    'title' => 'Ini Judul',
                    'slug'  => 'qris',
                    'financial' => 'QRIS',
                    'litte_description'=> 'QRIS adalah lorem dalah salah satu program pemerintah dalam meningkatkan akses pembiayaa', 
                    'paragrafh_1'   => 'paragrafh 1',
                    'paragrafh_2'   => 'paragrafh 2',
                    'paragrafh_3'   => 'paragrafh 3',
                    'path_image'=>'image/media/s.png'
                ]);
            FinancialInformation::create(
                [
                    'id'    => 6,
                    'title' => 'Latar Belakang',
                    'slug'  => 'latar-belakang',
                    'financial' => 'Latar Belakang',
                    'litte_description'=> 'Laar Belakang adalah lorem dalah salah satu program pemerintah dalam meningkatkan akses pembiayaa', 
                    'paragrafh_1'   => 'paragrafh 1',
                    'paragrafh_2'   => 'paragrafh 2',
                    'paragrafh_3'   => 'paragrafh 3',
                    'path_image'=>'image/media/s.png'
                ]);
            FinancialInformation::create(
                [
                    'id'    => 7,
                    'title' => 'Dasar Pembentukan',
                    'slug'  => 'dasar-pembentukan',
                    'financial' => 'Dasar Pembentukan',
                    'litte_description'=> 'Laar Belakang adalah lorem dalah salah satu program pemerintah dalam meningkatkan akses pembiayaa', 
                    'paragrafh_1'   => 'paragrafh 1',
                    'paragrafh_2'   => 'paragrafh 2',
                    'paragrafh_3'   => 'paragrafh 3',
                    'path_image'=>'image/media/s.png'
                ]);
            FinancialInformation::create(
                [
                    'id'    => 8,
                    'title' => 'Road Map',
                    'slug'  => 'road-map',
                    'financial' => 'Road Map',
                    'litte_description'=> 'Laar Belakang adalah lorem dalah salah satu program pemerintah dalam meningkatkan akses pembiayaa', 
                    'paragrafh_1'   => 'paragrafh 1',
                    'paragrafh_2'   => 'paragrafh 2',
                    'paragrafh_3'   => 'paragrafh 3',
                    'path_image'=>'image/media/s.png'
                ]);
           
    }


}
