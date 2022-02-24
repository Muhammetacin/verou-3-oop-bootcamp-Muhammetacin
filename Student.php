<?php

use Couchbase\Group;

class Student
{
    public string $name;
    public float $grade;
    public int $group;

    public function __construct(string $name, float $grade, int $group)
    {
        $this->name = $name;
        $this->grade = $grade;
        $this->group = $group;
    }

    public function changeGroup(): int
    {
        return $this->group === 1 ? $this->group = 2 : $this->group = 1;
    }
}