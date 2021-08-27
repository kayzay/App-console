<?php


namespace App\Console\Employee;

use App\Console\Employee\Interfaces\IEmployee;
use App\Console\Employee\Interfaces\Skill;

class Designer extends Skill implements IEmployee
{
    public function __construct()
    {
        $this->employeeSkills = [
           Skill::COMMAND_SKILL_NAME_DRAW => Skill::DRAW
            , Skill::COMMAND_SKILL_NAME_COMMUNICATE => Skill::COMMUNICATE
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
