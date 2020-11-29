<?php

namespace App\Console\Commands;

use App\Http\Controllers\UserController;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Console\Command;

class CheckUserRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'can:user {profession} {skill}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @param UserRepositoryInterface $userRepositories
     */
    public function handle(UserRepositoryInterface $userRepositories)
    {
        $userController = new UserController($userRepositories);
        $checkUserRoles = $userController->checkUserRoles($this->argument('profession'), str_replace('_', ' ', $this->argument('skill')));

        return $this->info(isset($checkUserRoles) ? !empty($checkUserRoles) ? 'true' : 'false' : "\nPlease enter a valid user profession.\n");
    }
}
