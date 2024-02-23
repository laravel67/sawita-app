<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pupuk;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Category::factory(10)->create();
        // Pupuk::factory(20)->create();
        // Garden::factory(5)->create();
        // Pupuk::factory()->create([
        //     'name'=> 'NPK',
        // ]);
        $pupuks = [
            [
                'name' => 'Pupuk NPK',
                'category_id' => 1,
                'satuan' => 'karung',
                'manfaat' => 'Nitrogen (N): Membantu pertumbuhan vegetatif dan pembentukan daun baru. Phosphorus (P): Mendukung pertumbuhan akar dan pembentukan bunga. Potassium (K): Meningkatkan kualitas buah dan ketahanan tanaman terhadap penyakit.',
                'penggunaan' => 'Dapat diberikan secara teratur dengan cara disemprotkan atau dilarutkan dalam air irigasi sesuai dosis yang direkomendasikan.',
            ],
            [
                'name' => 'Pupuk KCL',
                'category_id' => 1,
                'satuan' => 'karung',
                'manfaat' => 'Memberikan tambahan kalium yang penting untuk proses fotosintesis, pembentukan buah, dan toleransi terhadap stres.',
                'penggunaan' => 'Biasanya diberikan dengan cara dilarutkan dalam air irigasi atau diterapkan secara langsung di sekitar pangkal tanaman.',
            ],
            [
                'name' => 'Pupuk Dolomit',
                'category_id' => 2,
                'satuan' => 'karung',
                'manfaat' => 'Memperbaiki keseimbangan pH tanah dan mengurangi keasaman tanah. Memberikan kalsium dan magnesium yang diperlukan untuk pertumbuhan tanaman yang sehat.',
                'penggunaan' => 'Biasanya diberikan dengan cara dilarutkan dalam air irigasi atau diterapkan secara langsung di sekitar pangkal tanaman.',
            ],
            [
                'name' => 'Pupuk Kandang/Kompos',
                'category_id' => 3,
                'satuan' => 'karung',
                'manfaat' => 'Memperbaiki struktur tanah dan meningkatkan kesuburan tanah. Menyediakan nutrisi secara bertahap untuk pertumbuhan tanaman.',
                'penggunaan' => 'Disebar merata di sekitar pangkal tanaman atau dicampur dengan tanah saat penanaman.',
            ],
            [
                'name' => 'Pupuk Organik Cair',
                'category_id' => 3,
                'satuan' => 'karung',
                'manfaat' => 'Meningkatkan kandungan bahan organik dalam tanah. Membantu menjaga kelembaban tanah. Merangsang aktivitas mikroba tanah.',
                'penggunaan' => 'Dapat disiramkan langsung ke tanah atau digunakan sebagai pupuk daun dengan cara disemprotkan pada daun tanaman.',
            ],
            [
                'name' => 'Pupuk Kandang Ayam',
                'category_id' => 3,
                'satuan' => 'karung',
                'manfaat' => 'Memberikan nutrisi esensial seperti nitrogen, fosfor, dan kalium. Meningkatkan struktur tanah dan kelembaban.',
                'penggunaan' => 'Dapat dicampur dengan tanah atau digunakan sebagai pupuk dasar sebelum penanaman.',
            ],
            [
                'name' => 'Pupuk Mikroorganisme Lokal (MOL)',
                'category_id' => 3,
                'satuan' => 'karung',
                'manfaat' => 'Meningkatkan aktivitas mikroorganisme tanah. Memperbaiki struktur tanah dan meningkatkan ketersediaan unsur hara.',
                'penggunaan' => 'Dapat disemprotkan langsung ke tanaman atau dicampurkan dengan air irigasi.',
            ],
            [
                'name' => 'Pupuk Daun',
                'category_id' => 3,
                'satuan' => 'karung',
                'manfaat' => 'Memberikan nutrisi tambahan langsung pada daun tanaman. Membantu tanaman dalam situasi stres atau kekurangan nutrisi.',
                'penggunaan' => 'Disemprotkan langsung pada daun tanaman pada pagi atau sore hari.',
            ],
            [
                'name' => 'Pupuk Kalium Humat',
                'category_id' => 3,
                'satuan' => 'karung',
                'manfaat' => 'Meningkatkan retensi air dan pertukaran ion di dalam tanah. Merangsang pertumbuhan akar dan meningkatkan efisiensi nutrisi.',
                'penggunaan' => 'Biasanya dilarutkan dalam air dan disemprotkan pada tanaman atau dicampurkan dengan air irigasi.',
            ],
        ];
        foreach ($pupuks as $pupuk) {
            Pupuk::create($pupuk);
        }
        $categories = [
            [
                'name' => 'Pupuk Anorganik',
            ],
            [
                'name' => 'Pupuk Mineral',
            ],
            [
                'name' => 'Pupuk Organik',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
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
