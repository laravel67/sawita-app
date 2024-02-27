<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pupuk;
use App\Models\Garden;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Garden::factory(5)->create();
        // $pupuks = [
        //     [
        //         'name' => 'Pupuk NPK',
        //         'category_id' => 1,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Nitrogen (N): Membantu pertumbuhan vegetatif dan pembentukan daun baru. Phosphorus (P): Mendukung pertumbuhan akar dan pembentukan bunga. Potassium (K): Meningkatkan kualitas buah dan ketahanan tanaman terhadap penyakit.',
        //     ],
        //     [
        //         'name' => 'Pupuk KCL',
        //         'category_id' => 1,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Memberikan tambahan kalium yang penting untuk proses fotosintesis, pembentukan buah, dan toleransi terhadap stres.',
        //     ],
        //     [
        //         'name' => 'Pupuk Dolomit',
        //         'category_id' => 2,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Memperbaiki keseimbangan pH tanah dan mengurangi keasaman tanah. Memberikan kalsium dan magnesium yang diperlukan untuk pertumbuhan tanaman yang sehat.',
        //     ],
        //     [
        //         'name' => 'Pupuk Kandang/Kompos',
        //         'category_id' => 3,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Memperbaiki struktur tanah dan meningkatkan kesuburan tanah. Menyediakan nutrisi secara bertahap untuk pertumbuhan tanaman.',
        //     ],
        //     [
        //         'name' => 'Pupuk Organik Cair',
        //         'category_id' => 3,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Meningkatkan kandungan bahan organik dalam tanah. Membantu menjaga kelembaban tanah. Merangsang aktivitas mikroba tanah.',
        //     ],
        //     [
        //         'name' => 'Pupuk Kandang Ayam',
        //         'category_id' => 3,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Memberikan nutrisi esensial seperti nitrogen, fosfor, dan kalium. Meningkatkan struktur tanah dan kelembaban.',
        //     ],
        //     [
        //         'name' => 'Pupuk Mikroorganisme Lokal (MOL)',
        //         'category_id' => 3,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Meningkatkan aktivitas mikroorganisme tanah. Memperbaiki struktur tanah dan meningkatkan ketersediaan unsur hara.',
        //     ],
        //     [
        //         'name' => 'Pupuk Daun',
        //         'category_id' => 3,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Memberikan nutrisi tambahan langsung pada daun tanaman. Membantu tanaman dalam situasi stres atau kekurangan nutrisi.',
        //     ],
        //     [
        //         'name' => 'Pupuk Kalium Humat',
        //         'category_id' => 3,
        //         'satuan' => 'karung',
        //         'manfaat' => 'Meningkatkan retensi air dan pertukaran ion di dalam tanah. Merangsang pertumbuhan akar dan meningkatkan efisiensi nutrisi.',
        //     ],
        // ];
        // foreach ($pupuks as $pupuk) {
        //     Pupuk::create($pupuk);
        // }
        // $categories = [
        //     [
        //         'name' => 'Pupuk Anorganik',
        //     ],
        //     [
        //         'name' => 'Pupuk Mineral',
        //     ],
        //     [
        //         'name' => 'Pupuk Organik',
        //     ],
        // ];

        // foreach ($categories as $category) {
        //     Category::create($category);
        // }
        User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin123@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        Setting::factory(1)->create();
    }
}
