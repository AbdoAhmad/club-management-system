<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $positions = [
            ['en' => 'Goalkeeper', 'ar' => 'حارس مرمى'],
            ['en' => 'Goalkeeper - Sweeper', 'ar' => 'حارس مرمى - ليبرو'],
            ['en' => 'Defender', 'ar' => 'مدافع'],
            ['en' => 'Full-Back', 'ar' => 'ظهير'],
            ['en' => 'Right-Back', 'ar' => 'ظهير ايمن'],
            ['en' => 'Left-Back', 'ar' => 'ظهير ايسر'],
            ['en' => 'Centre-Back', 'ar' => 'قلب دفاع'],
            ['en' => 'Right -Centre-Back', 'ar' => 'قلب دفاع ايمن'],
            ['en' => 'Left-Centre-Back', 'ar' => 'قلب دفاع ايسر'],
            ['en' => 'Ball-Playing Defender', 'ar' => 'مدافع - صانع لعب'],
            ['en' => 'Wing-Back', 'ar' => 'ظهير جناح'],
            ['en' => 'Right-Wing-Back', 'ar' => 'ظهير جناح ايمن'],
            ['en' => 'Left-Wing-Back', 'ar' => 'ظهير جناح ايسر'],
            ['en' => 'Midfielder', 'ar' => 'لاعب وسط'],
            ['en' => 'Right Midfielder', 'ar' => 'لاعب وسط ايمن'],
            ['en' => 'Left Midfielder', 'ar' => 'لاعب وسط ايسر'],
            ['en' => 'Defensive Midfielder', 'ar' => 'لاعب وسط دفاعي'],
            ['en' => 'Central Midfielder', 'ar' => 'لاعب وسط مركزي'],
            ['en' => 'Central Attacking Midfielder', 'ar' => 'لاعب وسط مهاجم مركزي'],
            ['en' => 'Deep-Lying Playmaker', 'ar' => 'صانع لعب متأخر'],
            ['en' => 'Attacking Midfielder', 'ar' => 'لاعب وسط مهاجم'],
            ['en' => 'Winger', 'ar' => 'جناح'],
            ['en' => 'Right Winger', 'ar' => 'جناح ايمن'],
            ['en' => 'Left Winger', 'ar' => 'جناح ايسر'],
            ['en' => 'Forward', 'ar' => 'مهاجم'],
            ['en' => 'Striker', 'ar' => 'رأس حربة'],
            ['en' => 'Centre-Forward', 'ar' => 'مهاجم مركزي'],
            ['en' => 'Second Striker', 'ar' => 'مهاجم ثاني'],
            ['en' => 'Sweeper', 'ar' => 'ليبرو'],
        ];

        $codes = [
            'GK',
            'GKS',
            'DF',
            'FB',
            'RWB',
            'LWB',
            'CB',
            'RCB',
            'LCB',
            'BPD',
            'WB',
            'RWB',
            'LWB',
            'MF',
            'RMF',
            'LMF',
            'DMF',
            'CM',
            'CAM',
            'DLM',
            'AM',
            'WG',
            'RW',
            'LW',
            'FW',
            'ST',
            'CF',
            'SS',
            'SW',
        ];

        foreach ($positions as $index => $position) {
            Position::create([
                'name' => [
                    'en' => $position['en'],
                    'ar' => $position['ar'],
                ],
                'code' => $codes[$index] ?? null,
            ]);
        }

    }
}
