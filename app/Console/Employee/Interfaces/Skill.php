<?php

namespace App\Console\Employee\Interfaces;

abstract class Skill
{
    protected $employeeSkills;

    const WRITE_CODE = 'write code';
    const TEST_CODE = 'test the code';
    const COMMUNICATE = 'communicate with the manager';
    const DRAW = 'draw';
    const SET_TASK = 'set tasks';


    const COMMAND_SKILL_NAME_WRITE_CODE = 'writeCode';
    const COMMAND_SKILL_NAME_TEST_CODE = 'testTheCode';
    const COMMAND_SKILL_NAME_COMMUNICATE = 'communicateWithTheManager';
    const COMMAND_SKILL_NAME_DRAW = 'draw';
    const COMMAND_SKILL_NAME_SET_TASK = 'setTask';

}
