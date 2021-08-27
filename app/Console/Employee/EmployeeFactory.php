<?php


namespace App\Console\Employee;



use App\Console\Employee\Interfaces\IEmployee;

class EmployeeFactory
{

    private $employeeList = [
        'programmer' => Programmer::class
        , 'designer' => Designer::class
        , 'manager' => Manager::class
        , 'tester' => Tester::class
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
