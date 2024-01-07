<?php

class Student
{
    public $name = "名前だよ";
}

$student = new Student("student"); //new Student("student")を追記

print_r($student->name . PHP_EOL);