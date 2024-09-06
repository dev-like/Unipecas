<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'id' => 1,
         'nome' => 'Like Admin',
         'email' => 'dev@likepublicidade.com',
         'password' => bcrypt('admin'),
         'nivel' => 1,
       ]);
       DB::table('empresa')->insert([
         'id' => 1,
         'nomefantasia' =>'Unipeças Equipamentos Agrícolas',
         'rua' => 'Rodovia BR 010, Número 467',
         'bairro' => 'Entroncamento',
         'cidade' => 'Imperatriz',
         'estado' => 'MA',
         'missao' => 'Atender cada vez melhor com prioridade na extensão de um bom relacionamento com os nossos clientes, baseado em flexibilidade, amor pelo negócio e dedicação, buscando assim, a satisfação em primeiro lugar.',
         'visao' => 'Seremos a maior e melhor distribuidora de produtos agrícolas da cidade de Imperatriz-MA e com um mercado consolidado até 2020.',
         'valores' => 'Honestidade, competência, disposição para atender bem, responsabilidade e muita força de vontade para sempre atender as demandas que nos são passadas com agilidade e entrega de soluções.',
         'telefone' => '(99) 3524-8830',
                  
       ]);
    }
}
