<?php

namespace App\Console\Commands;

use App\Http\Controllers\UserController;
use Illuminate\Console\Command;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'skill:user {user}';

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
        $userRoles = $userController->userRoles($this->argument('user'));
        $userRolesOutput = '';
        if (!empty($userRoles)) {
            foreach ($userRoles as $userRole){
                $userRolesOutput .= "\n".$userRole."\n";
            }
        } else {
            $userRolesOutput = "\nPlease enter a valid value.\n";
        }

        return $this->info($userRolesOutput);
    }
}
