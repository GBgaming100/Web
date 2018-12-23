<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 4/10/2018
 * Time: 9:21 AM
 */

function randomNumb()
{
    if ($_SESSION['statusGame'] == 0) {
        if (isset($_POST['maxNumber'])) {
            $randomNumber = rand(1, $_POST['maxNumber']);
        } else {
            $randomNumber = rand(1, 175);
            $randomNumber = rand(1, 175);
        }
        $_SESSION['maxNumber'] = $_POST['maxNumber'];
    }
}