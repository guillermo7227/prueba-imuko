<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ReseedDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imuko:reseed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recreates the database and runs the seeders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('Recreando la base de datos...');
        Artisan::call('migrate:fresh');
        $this->info('Hecho.');

        $this->line('Alimentando la base de datos...');
        Artisan::call('db:seed');
        $this->info('Hecho.');
    }
}
