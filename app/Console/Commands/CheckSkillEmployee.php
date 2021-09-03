<?php

namespace App\Console\Commands;

use App\Console\Employee\EmployeeFactory;
use App\Console\Employee\Interfaces\IEmployee;
use App\Console\Employee\Interfaces\Skill;
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
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->description = sprintf(
                            "Check skill employee. Command: employee:can {type} {skill}
                               - {type} - is the  employee list {%s, %s, %s, %s}
                               - {skill} - is the employee able to perform this skill
                               - skill list {%s, %s, %s, %s, %s}",
                            EmployeeFactory::Programmer
                            , EmployeeFactory::Designer
                            , EmployeeFactory::Manager
                            , EmployeeFactory::Tester
                            , Skill::COMMAND_SKILL_NAME_WRITE_CODE 
                            , Skill::COMMAND_SKILL_NAME_TEST_CODE
                            , Skill::COMMAND_SKILL_NAME_COMMUNICATE
                            , Skill::COMMAND_SKILL_NAME_DRAW
                            , Skill::COMMAND_SKILL_NAME_SET_TASK
                        );
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
