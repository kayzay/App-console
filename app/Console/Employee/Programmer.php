<?php


namespace App\Console\Employee;

use App\Console\Employee\Interfaces\IEmployee;
use App\Console\Employee\Interfaces\Skill;

class Programmer extends Skill implements IEmployee
{

    public function __construct()
    {
        $this->employeeSkills = [
          Skill::COMMAND_SKILL_NAME_WRITE_CODE => Skill::WRITE_CODE
          , Skill::COMMAND_SKILL_NAME_TEST_CODE => Skill::TEST_CODE
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
