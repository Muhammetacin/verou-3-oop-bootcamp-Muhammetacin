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

echo $studentGroup1[5]->name . '\'s group is ' . $studentGroup1[5]->group . '<br>';
$studentGroup1[5]->changeGroup();
echo $studentGroup1[5]->name . '\'s group after change is ' . $studentGroup1[5]->group;

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

echo '<br><br>';
echo 'Average scores after moving student: <br><br>';

calcAverageScore($studentGroup1);
calcAverageScore($studentGroup2);

echo '<br><br>';

echo '-Group 1 Students-<br>';
pre_r($studentGroup1);
echo '-Group 2 Students-<br>';
pre_r($studentGroup2);

echo '<br>';

// Use Case 4

echo 'Use Case 4<br><br>';