<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = ['name' => 'admin',
        'jk' => 'Laki-laki',
        'no_tlp' => '085236135592',
        'email' => 'admin_smk_@gmail.com',
        'password' => bcrypt('rahasia'),
        'role' => 'admin'];
        User::insert($data);

        {
            //
            $data = ['name' => 'panitia',
            'jk' => 'Laki-laki',
            'no_tlp' => '085236135592',
            'email' => 'panitia_smk_@gmail.com',
            'password' => bcrypt('rahasia'),
            'role' => 'panitia'];
            User::insert($data);
        }
        {
            //
            $data = ['name' => 'siswa',
            'jk' => 'Laki-laki',
            'no_tlp' => '085236135592',
            'email' => 'siswa_smk_@gmail.com',
            'password' => bcrypt('rahasia'),
            'role' => 'siswa'];
            User::insert($data);
        }
    }
}
