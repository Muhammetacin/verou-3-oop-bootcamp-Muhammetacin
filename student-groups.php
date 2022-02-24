<?php

function createGroups($group): array
{
    $studentsArray = [];

    for($name = 1; $name < 11; $name++) {
        $studentsArray[] = new Student('student' . $name . 'Group' . $group, rand(50, 100) / 10, $group);
    }

    return $studentsArray;
}

$studentGroup1 = createGroups(1);
$studentGroup2 = createGroups(2);