<?php
    $link = mysqli_connect("localhost", "e950792h_homectf", "Mi-MoRgUn-IvAn-117", "e950792h_homectf");
    mysqli_set_charset($link, "utf8");


    $sql = "SELECT * FROM `win` WHERE `cookie-key`='".$_COOKIE['key']."'";


    $sql = "SELECT `tasks`, `money` FROM `homeCTF` WHERE `cookie-key`='".$_COOKIE['key']."'";
    $result = mysqli_query($link, $sql);

    $money = $result['money'];
    $tasks = $result['tasks'];

    setcookie("money", $money);
    setcookie("tasks", $tasks);


    $sql = "SELECT `time1`, `time1update`, `time2`, `time2update`, `time3`, `time3update` FROM `time` WHERE `pass`='".$_COOKIE['key']."'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);

    setcookie("code1", $row['time1'] - (time() - $row['time1update']));
    setcookie("code2", $row['time2'] - (time() - $row['time2update']));
    setcookie("code3", $row['time3'] - (time() - $row['time3update']));

    setcookie("xkty", 0);






?>