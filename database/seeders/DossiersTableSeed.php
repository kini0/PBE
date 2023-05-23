<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DossiersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creation des fauts dossier
        //creat des fauts jurys pour le projet
        for ($i = 0; $i < 10; $i++)
        {
            \Illuminate\Support\Facades\DB::table('dossiers')->insert([
                'nom'=> "Candidat1$i",
                "prenom"=> "FondationBenianh$i",
                "age" => "20 ans",
                "phone" => "0506371229",
                "aetabl"=> "ASTC",
                "diplome" => "Master",
                "residence" => "Cocody$i",
                "detabl"=> "UEA",
                "filiere" => "IA",
                "pays"=> "Côte d Ivory",
                "user_id" => "$i",
                "certificat"=> "1.png",
                "cv" => "480.jpg",
                "recu"=> "Emmanuelle-ORO.jpg",
                "lrecommandation" => "M.AGBE222.jpg",
                "ldemande"=> "Sans-titre-4 (1).jpg",
                "lmotivation" => "Test lourd législation Rhcom 1 A.pdf",
                "imgdiplome"=> "Vertical-logo-dark-background-en.png",
                "note" => "WhatsApp Image 2022-05-20 at 11.36.49.jpeg",
                "projet"=> "zyro-image (2).png",
            ]);
        }
    }
}
