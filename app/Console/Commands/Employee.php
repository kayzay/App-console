<?php

namespace App\Console\Commands;

use App\Console\Employee\EmployeeFactory;
use Illuminate\Console\Command;

class Employee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "";

    /**
     * Create a new command instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->description = sprintf(
                                "Describe the skill of the employee. Command: employee {type}
                                    - {type} type it is type employee {%s, %s, %s, %s}",
                                    EmployeeFactory::Programmer
                                    , EmployeeFactory::Designer
                                    , EmployeeFactory::Manager
                                    , EmployeeFactory::Tester
                            );
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
       
        $employee = (new EmployeeFactory($this->argument('type')))->getEmployee();

        if ($employee !== null) {
            foreach ($employee->workSkills() as $item) {
                $this->info(" - " . $item);
            }
        } else {
            $this->info("employee - " . $this->argument('type') . " not found");
        }
    }
}
