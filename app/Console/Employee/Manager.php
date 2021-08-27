<?php


namespace App\Console\Employee;

use App\Console\Employee\Interfaces\IEmployee;
use App\Console\Employee\Interfaces\Skill;

class Manager extends Skill implements IEmployee
{
    public function __construct()
    {
        $this->employeeSkills = [
           Skill::COMMAND_SKILL_NAME_SET_TASK => Skill::SET_TASK
        ];
    }

    public function workSkills()
    {
        return $this->employeeSkills;
    }

    public function skill($item)
    {
        return isset($this->employeeSkills[$item]);
    }

}
