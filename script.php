<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="height=device-height">
    <title>Карта</title>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
    <link rel="SHORTCUT ICON" href="./assets/ficus-icon.png" type="image/x-icon">
    <script src="user.js"></script>
    <script src="./main.js" type="application/javascript"></script>
</head>
<body>
    <div class="centriter" style="margin-top: 200px">
        <span class="naming">Обрабатываю...</span>
    </div>
</body>
</html>


<?php
    $link = mysqli_connect("localhost", "e950792h_homectf", "Mi-MoRgUn-IvAn-117", "e950792h_homectf");
    mysqli_set_charset($link, "utf8");
    if ($link == false){
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "\n Сообщи об этой ошибке разработчику (ссылка на дискорд есть на странице соревнования");
    }


    for($i = 1; $i < 21; $i++) {
        if (isset($_POST['sendtask'.$i]))
        {
            $sql = "SELECT `id`, `cost`, `flag` FROM `tasks` WHERE `id`=".$i;
            $result = mysqli_query($link, $sql);
            $result = mysqli_fetch_array($result);
            if($_POST['task'.$i] == $result['flag']) {

                    $sql = 'SELECT `cost` FROM `tasks` WHERE `id`='.$i;
                    $cost = mysqli_query($link, $sql);//получаю цену таска
                    $cost = mysqli_fetch_array($cost);
                    $sql = "SELECT `money` FROM `homeCTF` WHERE `cookie-key`='all'";
                    $mon = mysqli_query($link, $sql); //получаю количество денег команды
                    $mon = mysqli_fetch_array($mon);
                    $mon = $cost['cost'] + $mon['money'];


                    $sql = "UPDATE `homeCTF` SET `money`={$mon} WHERE `cookie-key`='all'";
                    //обновляю количество денег команды
                    mysqli_query($link, $sql);
                    echo '<script>location.replace("./right.html");</script>'; exit;


            }
            else {
                echo '<script>location.replace("./wrong.html");</script>'; exit;
            }
        }
    }



    for($i = 1; $i < 5; $i++) {
        for($j = 1; $j < 4; $j++){
            if(isset($_POST['boost'.$i.'code'.$j])) {

                $sql = "SELECT `money` FROM `homeCTF` WHERE `cookie-key`='all'";
                $money = mysqli_query($link, $sql);
                $money = mysqli_fetch_array($money);
                $money = $money['money'];

                if ($i == 1) {
                    if ($money >= 150) {
                        $money = $money - 150;
                    }
                    else {
                        echo '<script>location.replace("./noten.html");</script>'; exit;
                    }
                }

                if ($i == 2) {
                    if ($money >= 280) {
                            $money = $money - 280;
                    }
                    else {
                        echo '<script>location.replace("./noten.html");</script>'; exit;
                    }
                }

                if ($i == 3) {
                    if ($money >= 200) {
                        $money = $money - 200;
                     }
                    else {
                        echo '<script>location.replace("./noten.html");</script>'; exit;
                    }
                }

                if ($i == 4) {
                    if ($money >= 380) {
                        $money = $money - 380;
                    }
                    else {
                        echo '<script>location.replace("./noten.html");</script>'; exit;
                    }
                }

                if($timelasts < 0) $timelasts = 0;

                $sql = "UPDATE `homeCTF` SET `money`=".$money." WHERE `cookie-key`='all'";
                mysqli_query($link, $sql);



                echo '<script>location.replace("./succ.html");</script>'; exit;
            }

        }

    }

    if(isset($_POST['obnal'])) {
        $sql = "SELECT `money` FROM `homeCTF` WHERE `cookie-key`='all'";
        $money = mysqli_query($link, $sql);
        $money = mysqli_fetch_array($money);
        $money = $money['money'];

        $clicks = $_COOKIE['xkty'];
        $clicks = round($clicks / 5);

        $money = $money + $clicks;
        $sql = "UPDATE `homeCTF` SET `money`=".$money." WHERE `cookie-key`='all'";
        mysqli_query($link, $sql);

        echo '<script>location.replace("./index.php");</script>'; exit;
    }


    if(isset($_POST['end'])) {
        if($_POST['first'] == '11b_forever' && $_POST['second'] == 'what_are_your_impressions_of_the_game' && $_POST['third'] == 'omg_u_will_win') {
            echo '<script>location.replace("./win.html");</script>'; exit;

        }
        else {
            echo '<script>location.replace("./wrong.html");</script>'; exit;
        }

    }

    if(isset($_POST['get'])){
         $sql = "SELECT `time1`, `time2`, `time3`, `time1update`, `time2update`, `time3update` FROM `time` WHERE `pass`='".$_COOKIE['key']."'";

         $result = mysqli_query($link, $sql);
         $result = mysqli_fetch_array($result);
         if($result['time1'] - (time() - $result['time1update']) > 0 || $result['time2'] - (time() - $result['time2update']) > 0 || $result['time3'] - (time() - $result['time3update']) > 0) {


            echo '<script>location.replace("./notnow.html");</script>'; exit;

         }

         else {

            $sql = "INSERT INTO `result`(`winner`, `time`) VALUES (".$_COOKIE['key'].", ".time().")";
            mysqli_query($link, $sql);


            echo '<script>location.replace("./pltcmrjlslkzpfdthitybz.html");</script>'; exit;
         }


    }


?>
