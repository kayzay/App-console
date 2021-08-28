<?php


namespace App\Console\Employee;



use App\Console\Employee\Interfaces\IEmployee;

class EmployeeFactory
{

    const Programmer = 'programmer';
    const Designer = 'designer';
    const Manager = 'manager';
    const Tester = 'tester';


    private $employeeList = [
        self::Programmer => Programmer::class
        , self::Designer  => Designer::class
        , self::Manager => Manager::class
        , self::Tester => Tester::class
    ];

    private $item = null;

    public function __construct($name)
    {
        if (isset($this->employeeList[$name]))
        {
            $this->item = new $this->employeeList[$name]();
        }
    }

    /**
     * @return IEmployee|null
     */
    public function getEmployee()
    {
        return $this->item;
    }

}
