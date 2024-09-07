<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\kriteria;
use App\Models\Subkriteria;
use App\Models\RekrutmenModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::Create([
            'name' => 'Admin KC',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '1',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Brenda Karen',
            'username' => 'Brenda',
            'email' => 'brendakaarenn@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '081239262246',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Kristina Putri Arfiani',
            'username' => 'Keke',
            'email' => 'kristinaputriarfiani@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085869673670',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Oktava Anggara',
            'username' => 'Okta',
            'email' => 'anggara.oktava@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '089692891461',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Aliyah Zuhria Andra Susilowati',
            'username' => 'Andra',
            'email' => 'zuhriaandra@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '087734785705',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Rosehasna Aurellia Putri Wirastomo',
            'username' => 'Rose',
            'email' => 'rosewirastomo@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '087801012212',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Akmal',
            'username' => 'Mal',
            'email' => 'aakmaall16@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '081378973816',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'ADINDA SABRINA AUFA',
            'username' => 'Adinda',
            'email' => 'adindasa95@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '081270579045',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Ivana Prilianita',
            'username' => 'Ivana',
            'email' => 'ivanaprilianita1904@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085158200291',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Fiona Aurelia',
            'username' => 'Fiona',
            'email' => 'fionaaurelia99@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '087736557825',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Kevin Timothy Kilapong',
            'username' => 'Kevin',
            'email' => 'Kilapong.kevin@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '0182265709',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Cindy Nataly Wijaya',
            'username' => 'Cindy',
            'email' => 'cindynatalyw@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '08993653098',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Fauziah Susanti',
            'username' => 'Uci',
            'email' => 'fauziasusanti84@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '081283253085 ',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Ahmad Guntur Nanrang Jr',
            'username' => 'Guntur',
            'email' => 'ahmadguntur214@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '081283253085 ',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Bima Kurniawan',
            'username' => 'Bima',
            'email' => 'bimadezzer38@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '089633630610 ',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Riady Whisnu Nugroho',
            'username' => 'wisnu',
            'email' => 'riadywhisnu@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '089670451607',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'WILMA DESY RAMADHANI',
            'username' => 'BEO',
            'email' => 'Wilmadesyramadhani03@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '081221317366',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Shofie Nurul Azmi',
            'username' => 'Shofie',
            'email' => 'shof.studio@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085726388867',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Fauziah Rizky',
            'username' => 'Kiky',
            'email' => 'fauziahrizky22@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '082337734028',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Alfarel Jalusena',
            'username' => 'Farel',
            'email' => 'alfareljalusena@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '083183372742',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Ramadhani Aditya Nur',
            'username' => 'Ramdon',
            'email' => 'ramadhaniadityanur99@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '082110019123',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);

        User::Create([
            'name' => 'Muhammad Fahmi Fadhillah',
            'username' => 'Fadel',
            'email' => 'fahmifadhillah66@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '0895376954303',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Ivansio Don Van MCleen Gurning',
            'username' => 'Ivan',
            'email' => 'gurningivansio@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '0895342664596',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);

        User::Create([
            'name' => 'Faddiya Millagra Humaera',
            'username' => 'Milla',
            'email' => 'millagra2014@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '089643602092',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Ramdhani Satrio',
            'username' => 'Rio',
            'email' => 'ramadhanisatriob@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '089667727852',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Muhammad Latip Bayu Saputra',
            'username' => 'Latip',
            'email' => 'latifbayusaputra@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '082138619127',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Raditya Daffa Lasmana',
            'username' => 'Daffa',
            'email' => 'lasmanadaffa@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '081238721147',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]); 
        
        User::Create([
            'name' => 'Rulysa Nur Rahmadhanik',
            'username' => 'Rulysa',
            'email' => 'rulysarmdk@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085891987310',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Azalea Astina Yutari',
            'username' => 'Aza',
            'email' => 'azaleastina661@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '089649176022',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Thara Zahira Merdy',
            'username' => 'Thara',
            'email' => 'tharazahira19@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '0811160165',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'farrell adhitama',
            'username' => 'farrell',
            'email' => 'farrelladhitama@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '088980028786',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Katarina Pingkan Yusari',
            'username' => 'Pingkan',
            'email' => 'pingkankatarina@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085965913685',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Aulia Afifah',
            'username' => 'Aulia',
            'email' => 'auliaafifah21@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '082242089955',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Made Tarita Kezaravijaya Yuana',
            'username' => 'Tarita',
            'email' => 'madetaritayuana@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '089530455654',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Tasya Puspita Zahra',
            'username' => 'Tasya',
            'email' => 'ztasya930@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '087883762739',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Alvito Abimanyu',
            'username' => 'Vito',
            'email' => 'alvitoabsmanyu@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '081238980217',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Amadeo Ahnaf',
            'username' => 'Ahnaf',
            'email' => 'amadeoahnaf@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '089526581890',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Brian Hayom Satwika',
            'username' => 'Brian',
            'email' => 'brianhayom@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '085100435531',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Bintang Jihad Mahardhika',
            'username' => 'Bintang',
            'email' => 'bintangjihad@mail.ugm.ac.id',
            'gender' => 'Laki - laki',
            'phone' => '082324761686',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Muhammad Dwi Septiawan',
            'username' => 'Dwi',
            'email' => 'Dwiseptiawanm@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '089514392752',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Putu Paramarthika Vidya',
            'username' => 'Para',
            'email' => 'paravidya31@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '082147429301',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Josheline Salim',
            'username' => 'Sheline',
            'email' => 'joshelinesalim.js@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '0168607485',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Damian Sallis',
            'username' => 'Damian',
            'email' => 'damiansallis48@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '082133726287',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Cintya Tresna Walidain',
            'username' => 'Cintya',
            'email' => 'cintyatresna10@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '082127031746',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Insan Rahman Halim',
            'username' => 'Insan',
            'email' => 'insanrahman64@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '089509208158',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'grace senty stefania',
            'username' => 'grace',
            'email' => 'sentygrace@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085892452729',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Josephine',
            'username' => 'Epin',
            'email' => 'joanthonias@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '082325669197',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Zulfa Khoirun Nisa',
            'username' => 'Fafa',
            'email' => 'zulfakhoirunns@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '0895382839533',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Johanna Ratuwani Sundah',
            'username' => 'Zoe',
            'email' => 'jjoannasoe@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '082117896713',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Trasty Chris Masjira',
            'username' => 'Trasty',
            'email' => 'trust2612@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '0895377323718',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Anwar Fajar',
            'username' => 'Anwar',
            'email' => 'anwarpkl210@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '0895358926191',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Aurora Gracia',
            'username' => 'Rora',
            'email' => 'auroragracia21@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '081310284511',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Akbar Reva Mufadhol',
            'username' => 'Akbar',
            'email' => 'akbarrevam123@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '082116652065',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Mohammad Ibnu Sahal Mahfudz',
            'username' => 'Sahal',
            'email' => 'sahalmahfudz835@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '088217448574',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Salma Haniya Afdal',
            'username' => 'Hani',
            'email' => 'salmahaniyaa@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '081277168228',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Rizky Surya Nugraha',
            'username' => 'Kisur',
            'email' => 'rizkysuryanugraha51@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '089678587190',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Tiara Anggraini',
            'username' => 'Raa',
            'email' => 'tiaraa.anggie26@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085877723389',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Gagah Alam Putra Erwin',
            'username' => 'Gagah',
            'email' => 'gagah.alam@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '08111283012',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Muhammad Ishaq',
            'username' => 'Isaq',
            'email' => 'isaqnosedai19@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '085217601980',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Nur Indah Shinta Devi',
            'username' => 'Shinta',
            'email' => 'nurindahsd.work@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085772668847',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Anak Agung Putri Tita Manikasari',
            'username' => 'Tita',
            'email' => 'putritita22@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '082144734645',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Amalia Salsabila Ashifa',
            'username' => 'Lia',
            'email' => 'amaliasalsabila13@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085804801431',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Muhammad Syahrian Zulkarnain',
            'username' => 'Ian',
            'email' => 'syahrianzulkarnain@gmail.com',
            'gender' => 'Laki - laki',
            'phone' => '085712575678',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Dela Isnaini Sendra Pramesti',
            'username' => 'Sendra',
            'email' => 'depertaata@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '081317825842',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Rima Anggiyani',
            'username' => 'Rima',
            'email' => 'rimaanggiyani16@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '085604044494',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::Create([
            'name' => 'Abygail Hendra Praditya',
            'username' => 'Abygail',
            'email' => 'hendraabygail@gmail.com',
            'gender' => 'Perempuan',
            'phone' => '081398538915',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);

        RekrutmenModel::Create([
            'name' => 'Account Executive',
            'kuota' => '2',
            'status' => false
        ]);
        
        RekrutmenModel::Create([
            'name' => 'Content Creator',
            'kuota' => '1',
            'status' => false
        ]);
        
        RekrutmenModel::Create([
            'name' => 'Graphic Designer',
            'kuota' => '2',
            'status' => false
        ]);
        
        RekrutmenModel::Create([
            'name' => 'Human Resource Executives',
            'kuota' => '2',
            'status' => false
        ]);
        
        RekrutmenModel::Create([
            'name' => 'Strategic Planner',
            'kuota' => '2',
            'status' => false
        ]);

        RekrutmenModel::Create([
            'name' => 'Social Media Specialist',
            'kuota' => '2',
            'status' => false
        ]);

        kriteria::Create([
            'criteria_name' => 'Wawancara',
            'store_nilai' => true
        ]);

        kriteria::Create([
            'criteria_name' => 'Challenge',
            'store_berkas' => true,
            'store_nilai' => true
        ]);
        
        kriteria::Create([
            'criteria_name' => 'Portofolio',
            'store_berkas' => true,
            'store_nilai' => true
        ]);
        
        kriteria::Create([
            'criteria_name' => 'CV',
            'store_berkas' => true,
            'store_nilai' => true
        ]);
        
        kriteria::Create([
            'criteria_name' => 'Experience',
            'store_text' => true,
            'store_nilai' => true
        ]);

        kriteria::Create([
            'criteria_name' => 'Domisili',
            'store_text' => true,
            'store_nilai' => true
        ]);

        kriteria::Create([
            'criteria_name' => 'Pendidikan',
            'store_text' => true,
            'store_nilai' => true
        ]);

        kriteria::Create([
            'criteria_name' => 'Umur',
            'store_text' => true,
            'store_nilai' => true
        ]);
        

        Subkriteria::Create([
            'kriteria_id' => 1,
            'subctr_name' => 'A'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 1,
            'subctr_name' => 'B'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 1,
            'subctr_name' => 'C'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 1,
            'subctr_name' => 'D'
        ]);
        
        Subkriteria::Create([
            'kriteria_id' => 2,
            'subctr_name' => 'A'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 2,
            'subctr_name' => 'B'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 2,
            'subctr_name' => 'C'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 2,
            'subctr_name' => 'D'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 3,
            'subctr_name' => 'A'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 3,
            'subctr_name' => 'B'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 3,
            'subctr_name' => 'C'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 3,
            'subctr_name' => 'D'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 4,
            'subctr_name' => 'A'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 4,
            'subctr_name' => 'B'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 4,
            'subctr_name' => 'C'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 4,
            'subctr_name' => 'D'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 5,
            'subctr_name' => 'A'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 5,
            'subctr_name' => 'B'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 5,
            'subctr_name' => 'C'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 5,
            'subctr_name' => 'D'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 6,
            'subctr_name' => 'A'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 6,
            'subctr_name' => 'B'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 6,
            'subctr_name' => 'C'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 6,
            'subctr_name' => 'D'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 7,
            'subctr_name' => 'A'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 7,
            'subctr_name' => 'B'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 7,
            'subctr_name' => 'C'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 7,
            'subctr_name' => 'D'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 8,
            'subctr_name' => 'A'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 8,
            'subctr_name' => 'B'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 8,
            'subctr_name' => 'C'
        ]);

        Subkriteria::Create([
            'kriteria_id' => 8,
            'subctr_name' => 'D'
        ]);
        // Subkriteria::Create([
        //     'kriteria_id' => 1,
        //     'subctr_name' => 'Menguasai'
        // ]);

        // Subkriteria::Create([
        //     'kriteria_id' => 1,
        //     'subctr_name' => 'Cukup'
        // ]);

        // Subkriteria::Create([
        //     'kriteria_id' => 1,
        //     'subctr_name' => 'Tidak menguasai'
        // ]);

        // Subkriteria::Create([
        //     'kriteria_id' => 2,
        //     'subctr_name' => 'Ok banget'
        // ]);

        // Subkriteria::Create([
        //     'kriteria_id' => 2,
        //     'subctr_name' => 'Good'
        // ]);
        
        // Subkriteria::Create([
        //     'kriteria_id' => 2,
        //     'subctr_name' => 'Nah'
        // ]);
        
        // Subkriteria::Create([
        //     'kriteria_id' => 5,
        //     'subctr_name' => 'Ok banget'
        // ]);

        // Subkriteria::Create([
        //     'kriteria_id' => 5,
        //     'subctr_name' => 'Good'
        // ]);
        
        // Subkriteria::Create([
        //     'kriteria_id' => 5,
        //     'subctr_name' => 'Nah'
        // ]);
    }
}
