<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
  

    //protected $signature = 'rapido:makeUserRevisor';
    protected $signature = 'rapido:makeUserRevisor {email}';

    protected $description = 'Asigna el rol de revisor a un usuario';
    public function __construct()
    {
        parent::__construct();
    }

    
    public function handle()
    {
        //$email = $this->ask("Introducir el correo del usuario");
        //$user = User::where('email', $email)->first();
        $user = User::where('email',$this->argument('email'))->first();
        
        if(!$user){
            $this->error("Usuario no encontrado");
            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info("El usuario $user->name ya es un revisor");
    }
}
