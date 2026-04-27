<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;
class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $skills = [
        ['en' => 'Pace', 'ar' => 'السرعة'],
        ['en' => 'Shooting', 'ar' => 'التسديد'],
        ['en' => 'Passing', 'ar' => 'التمرير'],
        ['en' => 'Dribbling', 'ar' => 'المراوغة'],
        ['en' => 'Tackling', 'ar' => 'الالتحام'],
        ['en' => 'Heading', 'ar' => 'الضربات الرأسية'],
        ['en' => 'Stamina', 'ar' => 'التحمل'],
        ['en' => 'Agility', 'ar' => 'الرشاقة'],
        ['en' => 'Strength', 'ar' => 'القوة'],
        ['en' => 'Jumping', 'ar' => 'القفز'],
        ['en' => 'Crossing', 'ar' => 'العرضيات'],
        ['en' => 'Finishing', 'ar' => 'الإنهاء'],
        ['en' => 'Long Shots', 'ar' => 'التسديدات البعيدة'],
        ['en' => 'Free Kicks', 'ar' => 'الركلات الحرة'],
        ['en' => 'Penalties', 'ar' => 'الركلات الجزاء'],
        ['en' => 'Composure', 'ar' => 'الهدوء'],
        ['en' => 'Aggression', 'ar' => 'العدوانية'],
        ['en' => 'Vision', 'ar' => 'الرؤية'],
        ['en' => 'Acceleration', 'ar' => 'التسارع'],
        ['en' => 'Balance', 'ar' => 'التوازن'],
        ['en' => 'Ball Control', 'ar' => 'التحكم بالكرة'],
        ['en' => 'Crossing', 'ar' => 'العرضيات'],
        ['en' => 'Diving', 'ar' => 'الغطس'],
        ['en' => 'Handling', 'ar' => 'الالتقاط'],
        ['en' => 'One on Ones', 'ar' => 'المواجهات الفردية'],
        ['en' => 'Positioning', 'ar' => 'التموضع'],
        ['en' => 'Reflexes', 'ar' => 'ردود الفعل'],
        ['en' => 'Saving', 'ar' => 'التصدي'],
        ['en' => 'Throwing', 'ar' => 'الرمي'],
        ['en' => 'Interceptions', 'ar' => 'الاعتراضات'],
    ];

    foreach ($skills as $skill) {
        Skill::create([
            'name' => [
                'en' => $skill['en'],
                'ar' => $skill['ar'],
            ],
          
        ]);
    }
    }
}
