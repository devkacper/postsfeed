<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add user to database with parameters - name, email and password.';

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
        User::create([
            'name'      => $this->argument('name'),
            'email'     => $this->argument('email'),
            'password'  => bcrypt($this->argument('password')),
        ]);
    }
}
