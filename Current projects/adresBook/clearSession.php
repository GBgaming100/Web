<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 9/11/2018
 * Time: 9:46 AM
 */

session_start();
session_destroy();

header('Location: /adresBook');