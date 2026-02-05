<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cctv;

class CctvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cctvs = [
            [
                'name' => 'CCTV Malioboro',
                'lat' => -7.797068,
                'lng' => 110.370529,
                'stream_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'name' => 'CCTV Tugu Jogja',
                'lat' => -7.782845,
                'lng' => 110.367081,
                'stream_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'name' => 'CCTV Keraton',
                'lat' => -7.809444,
                'lng' => 110.364722,
                'stream_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'name' => 'CCTV Alun-Alun Selatan',
                'lat' => -7.816667,
                'lng' => 110.366667,
                'stream_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ]
        ];

        foreach ($cctvs as $cctv) {
            Cctv::create($cctv);
        }
    }
}
