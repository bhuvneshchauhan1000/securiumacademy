<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PrintName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:name {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->info("Good Morning " . $this->argument('name') . " 😊 Have a nice day");
        return Command::SUCCESS;
    }
}
