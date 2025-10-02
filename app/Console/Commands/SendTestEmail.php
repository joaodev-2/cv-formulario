<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationReceived;
use App\Models\JobApplication;
use Illuminate\Support\Carbon;

class SendTestEmail extends Command
{
    protected $signature = 'email:test';
    protected $description = 'Envia um e-mail de teste usando o mailable JobApplicationReceived';

    public function handle()
    {
        $application = new JobApplication([
            'name' => 'João da Silva',
            'desired_role' => 'Desenvolvedor Laravel',
            'education' => 'Ensino Superior em Ciência da Computação',
            'phone' => '(21) 99999-9999',
            'linkedin_url' => 'https://linkedin.com/in/joaosilva',
        ]);

        $application->created_at = Carbon::now(); 


        Mail::to('destinatario@teste.com')
            ->send(new JobApplicationReceived($application));

        $this->info('✅ E-mail de teste enviado com sucesso!');
    }
}
