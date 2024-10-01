<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Task;
use App\Models\User;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


     public function run()
     {
         // Crear la compañía 'Netcommerce'
         $company = Company::create([
             'name' => 'Netcommerce',
         ]);

         // Crear un usuario ejemplo
         $user = User::create([
             'name' => 'Akira', // Asume que tienes un campo 'name' en la tabla 'users'
             'email' => 'akira@example.com',
             'password' => bcrypt('password'), // O usa un valor de contraseña segura
         ]);

         // Crear tareas relacionadas a la compañía y al usuario
         Task::create([
             'name' => 'task 1',
             'description' => 'task content',
             'company_id' => $company->id,
             'user_id' => $user->id,
             'is_completed' => 0,
             'start_at' => '2023-08-04 00:00:00',
             'expired_at' => '2023-08-07 00:00:00',
         ]);

         Task::create([
             'name' => 'task 2',
             'description' => 'task content',
             'company_id' => $company->id,
             'user_id' => $user->id,
             'is_completed' => 1,
             'start_at' => '2023-08-04 00:00:00',
             'expired_at' => null,
         ]);

         // Crear más compañías sin tareas si es necesario
         Company::create(['name' => 'Netcommerce']);
         Company::create(['name' => 'Netcommerce']);

         // Usar la fábrica para crear 5 compañías adicionales con datos falsos
         Company::factory(5)->create();
     }
}
