<?php

namespace Database\Seeders;

use App\Models\WebMenu;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        WebMenu::create(['title'  => ['ar' => 'علوم الحاسوب', 'en' => 'Computer science'], 'icon'   => 'fa fa-home', 'created_by' => 'admin', 'status' => true, 'section'    =>  2, 'description'    =>  ['ar' => 'إعداد كفاءات متميزة في مجال علوم الحاسب من أجل المساهمة الفاعلة في تحقيق الأهداف الوطنية للتنمية وذلك من خلال توفير بيئة أكاديمية متكاملة تنمي المعارف والمهارات وتدعم الابتكار والبحث العلمي وخدمة المجتمع. ويقدم القسم حاليًا عددًا من البرامج الأكاديمية وتشمل: 1. برنامج علوم الحاسبات 2. برنامج علوم الذكاء الأصطناعي 3. برنامج هندسة البرمجيات', 'en'   =>  'Preparing distinguished competencies in the field of computer science in order to contribute effectively to achieving national development goals by providing an integrated academic environment that develops knowledge and skills and supports innovation, scientific research, and community service. The department currently offers a number of academic programs, including: 1. Computer Science Program 2. Artificial Intelligence Science Program 3. Software Engineering Program'], 'published_on' => $faker->dateTime(), 'parent_id' => null]);
        WebMenu::create(['title'  => ['ar' => 'نظم المعلومات', 'en' => 'Information systems'], 'icon'   => 'fa fa-home', 'created_by' => 'admin', 'status' => true, 'section'    =>  2, 'description' =>  ['ar' => 'إعداد كفاءات متميزة في مجال علوم الحاسب من أجل المساهمة الفاعلة في تحقيق الأهداف الوطنية للتنمية وذلك من خلال توفير بيئة أكاديمية متكاملة تنمي المعارف والمهارات وتدعم الابتكار والبحث العلمي وخدمة المجتمع. ويقدم القسم حاليًا عددًا من البرامج الأكاديمية وتشمل: 1. برنامج علوم الحاسبات 2. برنامج علوم الذكاء الأصطناعي 3. برنامج هندسة البرمجيات', 'en'   =>  'Preparing distinguished competencies in the field of computer science in order to contribute effectively to achieving national development goals by providing an integrated academic environment that develops knowledge and skills and supports innovation, scientific research, and community service. The department currently offers a number of academic programs, including: 1. Computer Science Program 2. Artificial Intelligence Science Program 3. Software Engineering Program'], 'published_on' => $faker->dateTime(), 'parent_id' => null]);
        WebMenu::create(['title'  => ['ar' => 'تقنية المعلومات', 'en' => 'Information technology'], 'icon'   => 'fa fa-home', 'created_by' => 'admin', 'status' => true, 'section'    =>  2, 'description' =>  ['ar' => 'إعداد كفاءات متميزة في مجال علوم الحاسب من أجل المساهمة الفاعلة في تحقيق الأهداف الوطنية للتنمية وذلك من خلال توفير بيئة أكاديمية متكاملة تنمي المعارف والمهارات وتدعم الابتكار والبحث العلمي وخدمة المجتمع. ويقدم القسم حاليًا عددًا من البرامج الأكاديمية وتشمل: 1. برنامج علوم الحاسبات 2. برنامج علوم الذكاء الأصطناعي 3. برنامج هندسة البرمجيات', 'en'   =>  'Preparing distinguished competencies in the field of computer science in order to contribute effectively to achieving national development goals by providing an integrated academic environment that develops knowledge and skills and supports innovation, scientific research, and community service. The department currently offers a number of academic programs, including: 1. Computer Science Program 2. Artificial Intelligence Science Program 3. Software Engineering Program'], 'published_on' => $faker->dateTime(), 'parent_id' => null]);
    }
}
