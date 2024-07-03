<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;


use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
       
        $arrayTypes = [
            [
                'name'  => 'Data Scientist',
                'color' => 'green',
            ],
            [
                'name'  => 'DevOps',
                'color' => 'blue',
            ],
            [
                'name'  => 'Security',
                'color' => 'red',
            ],
            [
                'name'  => 'UX',
                'color' => 'gold',
            ],
            [
                'name'  => 'Blockchain',
                'color' => 'pink',
            ],
        ];
        $arrayTechnologies = [
            [
                'name'          => 'Python',
                'description'   => 'Spesso usato in ambito scientifico e di analisi dei dati, Python è fondamentale per i Data Scientist per lo sviluppo di algoritmi e modelli di apprendimento automatico.'
            ],
            [
                'name'          => 'Python R',
                'description'   => 'Simile a Python, R è ampiamente utilizzato nei campi dell\'analisi dei dati e della statistica, offrendo una vasta gamma di pacchetti per l\'analisi dei dati.'
            ],
            [
                'name'          => 'Java',
                'description'   => 'Una lingua di programmazione versatile e potente, Java è comunemente utilizzata in ambienti enterprise e per lo sviluppo di applicazioni web e mobili.'
            ],
            [
                'name'          => 'C++',
                'description'   => 'Conosciuta per la sua velocità e efficienza, C++ è spesso utilizzata in giochi, motori di rendering grafico e applicazioni di sistema.'
            ],
            [
                'name'          => 'JavaScript',
                'description'   => 'Essenziale per lo sviluppo front-end web, JavaScript è anche utilizzato in Node.js per lo sviluppo di backend e API.'
            ],
            [
                'name'          => 'Docker',
                'description'   => 'Uno strumento chiave per i DevOps, Docker consente di containerizzare applicazioni, facilitando la distribuzione e il deployment.'
            ],
            [
                'name'          => 'Kubernetes',
                'description'   => 'Un sistema open-source per l\'automazione del deployment, scalabilità e gestione dei container Docker.'
            ],
            [
                'name'          => 'Git',
                'description'   => 'Un sistema di controllo versione essenziale per lo sviluppo collaborativo, Git è ampiamente utilizzato in quasi tutti i progetti di sviluppo software.'
            ],
            [
                'name'          => 'Ethereum',
                'description'   => 'Una piattaforma blockchain che supporta la creazione di contratti intelligenti, molto utilizzata dai Blockchain Developers.'
            ],
            [
                'name'          => 'Apache Kafka',
                'description'   => 'Una piattaforma open-source per il processamento di flussi di dati in tempo reale, molto utilizzata in scenari di elaborazione di grandi volumi di dati in tempo reale.'
            ],
        ];


  foreach ($arrayTypes as $curType) {
    $type = new Type();
    $type->name = $curType['name'];
    $type->color = $curType['color'];
    $type->save();
}

foreach ($arrayTechnologies as $curTechnology) {
    $technology = new Technology();
    $technology->name = $curTechnology['name'];
    $technology->description = $curTechnology['description'];
    $technology->save();
}


for ($i = 0; $i < 50; $i++) {
    $project = new Project();
    $project->title = $faker->sentence(3);
    $project->type_id = $faker->numberBetween(1, count($arrayTypes));
    $project->description = $faker->text(255);
    $project->slug = Str::slug($project->title);
    $project->cover_image = $faker->imageUrl();
    $project->save();
    }
}
}
