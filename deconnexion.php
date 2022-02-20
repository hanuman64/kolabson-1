<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 24/05/2019
 * Time: 14:18
 */
session_start(); // on va manipuler les $_SESSION
session_destroy(); // supprime le $_SESSION
header('Location: index.php');
