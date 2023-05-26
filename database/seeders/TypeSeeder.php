<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

         // creo un array con le tipologie di progetto
         $types = ['Back End', 'Front End', 'Full Stack', 'UI', 'UX'];

         // ciclo l'array
         foreach($types as $type){
            
             $newType = new Type();
 
             $newType->title = $type;
             $newType->slug = Str::slug($newType->title, '-');
             $newType->description = $faker->text(100);
 
             $newType->save();
 
        }
    }
}
