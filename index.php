<?php

declare(strict_types=1);

ini_set('display_errors', value: '1');
ini_set ( option: 'display_startup_errors', value: '1');
error_reporting(error_level: E_ALL);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

// Use Case 1 Without Class
require 'useCase1NoClasses.php';

echo 'Use Case 1 No Class<br>';
echo '<br>Total price of basket without class: €' . $totalPrice;
echo '<br>Tax of basket without class: €' . $taxBasket;

echo '<br><br>';

// Use Case 1 With Class & Use Case 2
require 'BasketItem.php';

echo 'Use Case 1 With Class<br>';

$totalPriceBasket = 0;
$taxPriceBasket = 0;

$bananas = new BasketItem(6, 1, true);
$apples = new BasketItem(3, 1.5, true);
$bottlesOfWine = new BasketItem(2, 10, false);

$totalPriceBasket += $bananas->getTotalPrice() + $apples->getTotalPrice() + $bottlesOfWine->getTotalPrice();
$taxPriceBasket += $bananas->getTaxPrice() + $apples->getTaxPrice() + $bottlesOfWine->getTaxPrice();

echo '<br>Total price of basket with class: €' . $totalPriceBasket;
echo '<br>Tax of basket with class: €' . $taxPriceBasket;

echo '<br><br>';

echo 'Use Case 2 - Discount<br>';

$totalDiscountedPrice = $bananas->applyDiscountToItem(0.5) + $apples->applyDiscountToItem(0.5) + $bottlesOfWine->applyDiscountToItem(0.5);
echo '<br>Total discounted price of basket: €' . $totalDiscountedPrice;

echo '<br><br>';

// Use Case 3
require 'Student.php';

echo 'Use Case 3<br><br>';

require 'student-groups.php';

//$studentGroup1 = [];
//$studentGroup2 = [];
//
//for($group = 1; $group < 3; $group++) {
//    for($name = 1; $name < 11; $name++) {
//        if($group === 1) {
//            $studentGroup1[] = new Student('student' . $name . 'Group' . $group, rand(70, 100) / 10, $group);
//        }
//        else {
//            $studentGroup2[] = new Student('student' . $name . 'Group' . $group, rand(20, 100) / 10, $group);
//        }
//    }
//}

// Sort Students array by Grade on descending order
function cmp($a, $b): int
{
    return $a->grade < $b->grade ? 1 : -1;
}

usort($studentGroup1, "cmp");
usort($studentGroup2, "cmp");

// Calculate average scores for both groups
function calcAverageScore($array)
{
    $sumOfGrades = 0;
    $nrOfStudents = count($array);

    foreach ($array as $value) {
        $sumOfGrades += $value->grade;
    }

    $averageScore = $sumOfGrades / $nrOfStudents;

    echo 'Number of students: ' . $nrOfStudents . '<br>';
    echo 'Sum of grades: ' . $sumOfGrades . '<br>';
    echo 'Average score of this group: ' . $averageScore . '<br><br>';
}

calcAverageScore($studentGroup1);
calcAverageScore($studentGroup2);

// Move top and worst scoring student to the other group
function moveBestStudent($fromGroup, $toGroup)
{
    echo $fromGroup[0]->name . '\'s group is ' . $fromGroup[0]->group . '<br>';
    $fromGroup[0]->changeGroup();
    echo $fromGroup[0]->name . '\'s group after change is ' . $fromGroup[0]->group . '<br>';

    foreach($fromGroup as $student) {
        if($student->group === 2) {
            $index = array_search($student, $fromGroup);
            array_splice($fromGroup, $index, 1);
            $toGroup[] = $student;
        }
    }
}

function moveWorstStudent($fromGroup, $toGroup)
{
    $indexLastItem = count($fromGroup) - 1;
    echo $fromGroup[$indexLastItem]->name . '\'s group is ' . $fromGroup[$indexLastItem]->group . '<br>';
    $fromGroup[$indexLastItem]->changeGroup();
    echo $fromGroup[$indexLastItem]->name . '\'s group after change is ' . $fromGroup[$indexLastItem]->group . '<br>';
}

moveBestStudent($studentGroup1, $studentGroup2);
moveworstStudent($studentGroup2, $studentGroup1);

foreach($studentGroup1 as $student) {
    if($student->group === 2) {
        $index = array_search($student, $studentGroup1);
        array_splice($studentGroup1, $index, 1);
        $studentGroup2[] = $student;
    }
}

foreach($studentGroup2 as $student) {
    if($student->group === 1) {
        array_splice($studentGroup2, 0, 1);
        $studentGroup1[] = $student;
    }
}

echo '<br>';
echo 'Average scores after moving student: <br><br>';

calcAverageScore($studentGroup1);
calcAverageScore($studentGroup2);

echo '-Group 1 Students- <br>';
pre_r($studentGroup1);
echo '-Group 2 Students- <br>';
pre_r($studentGroup2);

// Use Case 4

echo 'Use Case 4<br><br>';
