<?php

namespace App\Console\Commands;

use App\Console\Employee\EmployeeFactory;
use App\Console\Employee\Interfaces\IEmployee;
use Illuminate\Console\Command;

class CheckSkillEmployee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:can {type} {skill}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Check skill employee. Command: employee:can {type} {skill}
                               - {type} - is the  employee list {programmer, designer, manager, tester}
                               - {skill} - is the employee able to perform this skill
                               - skill list {writeCode, testTheCode, communicateWithTheManager, draw, setTask}";

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
     */
    public function handle()
    {
        /**@var $employee IEmployee; **/
        $employee = (new EmployeeFactory($this->argument('type')))->getEmployee();
        if (is_object($employee)) {
            if ($skill = $this->argument('skill')) {
                $status = $employee->skill($skill) ? "true" : "false";
                $this->info(" status " . $status);
            } else {
                $this->info("employee skill - not found");
            }
        } else {
            $this->info("employee - " . $this->argument('type') . " not found");
        }

    }
}
