<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>RPG風バトル</title>
</head>
<body bgcolor="black">
<div align="center">
<?php
$player_lv=$_POST['player_lv'];
$player_hp=$_POST['player_hp'];
$monster_hp = $_POST['monster_hp'];
$win=$_POST['win'];
$b_suu=$_POST['b_suu'];
$ranking=$_POST['ranking'];
$lasttime=$_POST['lasttime'];
$level=$_POST['level'];
$cost=$_POST['cost'];
$hp=$_POST['hp'];
$attack=$_POST['attack'];
$msg='ーーーーーーーバトルーーーーーーー';
$msg2='';
$msg3='';
$msg4='';
$num=rand(1,6);

if (isset($_POST['start'])){
    $msg2 = 'モンスターが現れた！！';
	if(($b_suu%20)==0){
        $num=7;
        echo '<img src="maou.PNG" width="300" alt="魔王">';
        $monster_hp=rand(($player_lv+30),($player_lv+50));
        $msg2 = '魔王　が現れた！！';
    }else{
            if($num==1){
                echo '<img src="suraimu.PNG" width="250" alt="スライム">';
                $monster_hp=rand(($player_lv+1),($player_lv+6));
            }else if($num==2){
                echo '<img src="suraimu2.PNG" width="250" alt="スライム2">';
                $monster_hp=rand(($player_lv+1),($player_lv+6));
            }else if($num<=4){
                echo '<img src="goburin.PNG" width="250" alt="ゴブリン">';
                $monster_hp=rand(($player_lv+7),($player_lv+10));
            }else if($num==5){
                echo '<img src="madousi.PNG" width="250" alt="魔道士">';
                $monster_hp=rand(($player_lv+10),($player_lv+14));
            }else if($num==6){
                echo '<img src="minotaurosu.PNG" width="250" alt="ミノタウロス">';
                $monster_hp=rand(($player_lv+13),($player_lv+17));
            }
    }
}
if (isset($_POST['next'])){
    $b_suu++;
    $msg2 = 'モンスターが現れた！！';
    if(($b_suu%20)==0){
        $num=7;
        echo '<img src="maou.PNG" width="300" alt="魔王">';
        $monster_hp=rand(($player_lv+30),($player_lv+50));
        $msg2 = '魔王　が現れた！！';
    }else{
        if($num==1){
            echo '<img src="suraimu.PNG" width="250" alt="スライム">';
            $monster_hp=rand(($player_lv+1),($player_lv+6));
        }else if($num==2){
            echo '<img src="suraimu2.PNG" width="250" alt="スライム2">';
            $monster_hp=rand(($player_lv+1),($player_lv+6));
        }else if($num<=4){
            echo '<img src="goburin.PNG" width="250" alt="ゴブリン">';
            $monster_hp=rand(($player_lv+7),($player_lv+10));
        }else if($num==5){
            echo '<img src="madousi.PNG" width="250" alt="魔道士">';
            $monster_hp=rand(($player_lv+10),($player_lv+14));
        }else if($num==6){
            echo '<img src="minotaurosu.PNG" width="250" alt="ミノタウロス">';
            $monster_hp=rand(($player_lv+13),($player_lv+17));
        }
    }
}

if (isset($_POST['battle'])){
    $attack=rand(($player_lv+1),($player_lv+6));
    $monster_hp = $monster_hp - $attack;
    $msg2 = '勇者NSの攻撃！'.'<br>'.'モンスターに'.'<font color=yellow>'.$attack.'のダメージ</font>与えた！'.'<br>';

    $num=$_POST['num'];
    if ($monster_hp <= 0) {
        if($num==1){
    		echo '<img src="suraimu_KO.PNG" width="250" alt="スライムKO">';
        }else if($num==2){
            echo '<img src="suraimu2_KO.PNG" width="250" alt="スライム2KO">';
        }else if($num<=4){
    		echo '<img src="goburin_KO.PNG" width="250" alt="ゴブリンKO">';
        }else if($num==5){
    		echo '<img src="madousi_KO.PNG" width="250" alt="魔道士KO">';
        }else if($num==6){
    		echo '<img src="minotaurosu_KO.PNG" width="250" alt="ミノタウロスKO">';
        }else if($num==7){
    		echo '<img src="maou_KO.PNG" width="300" alt="魔王KO">';
        }
    }else{
        if($num==1){
                echo '<img src="suraimu.PNG" width="250" alt="スライム">';
        }else if($num==2){
            echo '<img src="suraimu2.PNG" width="250" alt="スライム2">';
        }else if($num<=4){
                echo '<img src="goburin.PNG" width="250" alt="ゴブリン">';
        }else if($num==5){
                echo '<img src="madousi.PNG" width="250" alt="魔道士">';
        }else if($num==6){
                echo '<img src="minotaurosu.PNG" width="250" alt="ミノタウロス">';
        }else if($num==7){
                echo '<img src="maou.PNG" width="300" alt="魔王">';
        }
    }

    if ($monster_hp <= 0) {
    $msg4= "モンスターを倒した！";
    if($num==7){
        $msg4="魔王　を倒した！！";
    }
    $win++;
    $level++;
       if($num==5){
          $level=$level+3;
       }else if($num==4){
          $level=$level+2;
       }
    }else{
    if($num == 7){
    $m_attack = rand(8,($player_lv+8));
    }else if($num >= 5){
    $m_attack = rand(2,($player_lv+4));
    }else{
    $m_attack = rand(0,($player_lv+2));
    }
    
    $player_hp = $player_hp - $m_attack;
    if($player_hp <= 0){
       $player_hp = 0;
       $msg4= '<br>'.'やられてしまった...';
    }
    $msg3 = 'モンスターの攻撃！'.'<br>'.'<font color=red>'.$m_attack.'のダメージ</font>を受けた！';
    }
}

if (isset($_POST['levelup'])){
    $num=$_POST['num'];
    if ($monster_hp <= 0) {
        if($num==1){
    		echo '<img src="suraimu_KO.PNG" width="250" alt="スライムKO">';
        }else if($num==2){
            echo '<img src="suraimu2_KO.PNG" width="250" alt="スライム2KO">';
        }else if($num<=4){
    		echo '<img src="goburin_KO.PNG" width="250" alt="ゴブリンKO">';
        }else if($num==5){
    		echo '<img src="madousi_KO.PNG" width="250" alt="魔道士KO">';
        }else if($num==6){
    		echo '<img src="minotaurosu_KO.PNG" width="250" alt="ミノタウロスKO">';
        }else if($num==7){
    		echo '<img src="maou_KO.PNG" width="300" alt="魔王KO">';
        }
    }else{
        if($num==1){
                echo '<img src="suraimu.PNG" width="250" alt="スライム">';
        }else if($num==2){
            echo '<img src="suraimu2.PNG" width="250" alt="スライム2">';
        }else if($num<=4){
                echo '<img src="goburin.PNG" width="250" alt="ゴブリン">';
        }else if($num==5){
                echo '<img src="madousi.PNG" width="250" alt="魔道士">';
        }else if($num==6){
                echo '<img src="minotaurosu.PNG" width="250" alt="ミノタウロス">';
        }else if($num==7){
                echo '<img src="maou.PNG" width="300" alt="魔王">';
        }
    }
    if($cost <= $level){
        $level = $level-$cost;
        $player_lv++;
        $player_hp=rand(($hp+2),($hp+5));
        $hp = $player_hp;
        $msg3 = '<font color=lightgreen>レベルアップ！！　　〜HP回復〜</font>';
        $cost++;
    }
}

// 画面表示内容
echo '<font color=white><font size="4">'.'<br>';
echo '<font size="5">'.$b_suu.'戦目<br>';
if($num==7){
    echo '<font color=MediumOrchid>'.$msg.'</font>';
}else{
    echo $msg ;
}

echo '</font><br>' ;
echo $msg2 ;
echo '<br>' ;
echo $msg3 ;
echo '<br>';
echo '<font size="5">'.$msg4;
echo '<br>';
if($num==7){
    echo '<font color=MediumOrchid>'.$msg5 = 'ーーーーーーーーーーーーーーーーー'.'</font>';
}else{
    echo $msg5 = 'ーーーーーーーーーーーーーーーーー' ;
}

echo '</font><br>';
echo '<font size="5">勇者NS' . '<br>' ;
echo 'LV:'. $player_lv . '<br>' ;
echo 'HP:'. $player_hp . '</font><br>'.'<br>';
//echo 'モンスター　HP:'. $monster_hp . '<br>';

if($monster_hp <= 0){
    echo '<form action="battle.php" method="POST">';
    echo '<input type="hidden" name="player_lv" value="'.$player_lv.'">';
    echo '<input type="hidden" name="player_hp" value="'.$player_hp.'">';
    echo '<input type="hidden" name="monster_hp" value="'.$monster_hp.'">';
    echo '<input type="hidden" name="level" value="'.$level.'">';
    echo '<input type="hidden" name="cost" value="'.$cost.'">';
    echo '<input type="hidden" name="hp" value="'.$hp.'">';
    echo '<input type="hidden" name="attack" value="'.$attack.'">';
    echo '<input type="hidden" name="win" value="'.$win.'">';
    echo '<input type="hidden" name="b_suu" value="'.$b_suu.'">';
    echo '<input type="hidden" name="num" value="'.$num.'">';
    echo '<input type="hidden" name="ranking" value="'.$ranking.'">';
    echo '<input type="hidden" name="lasttime" value="'.$lasttime.'">';
    echo '<input type="submit" name="next" value="次のバトルへ">';
    echo '</form>';
    
    if ($level >= $cost){
    echo '<form action="battle.php" method="POST">';
    echo '<input type="hidden" name="player_lv" value="'.$player_lv.'">';
    echo '<input type="hidden" name="player_hp" value="'.$player_hp.'">';
    echo '<input type="hidden" name="monster_hp" value="'.$monster_hp.'">';
    echo '<input type="hidden" name="level" value="'.$level.'">';
    echo '<input type="hidden" name="cost" value="'.$cost.'">';
    echo '<input type="hidden" name="hp" value="'.$hp.'">';
    echo '<input type="hidden" name="attack" value="'.$attack.'">';
    echo '<input type="hidden" name="win" value="'.$win.'">';
    echo '<input type="hidden" name="b_suu" value="'.$b_suu.'">';
    echo '<input type="hidden" name="num" value="'.$num.'">';
    echo '<input type="hidden" name="ranking" value="'.$ranking.'">';
    echo '<input type="hidden" name="lasttime" value="'.$lasttime.'">';
    echo '<input type="submit" name="levelup" value="レベルアップ">';
    echo '</form>';
    }
    echo '<br>';
    echo '<br>';
}else if ($player_hp > 0){
    echo '<form action="battle.php" method="POST">';
    echo '<input type="hidden" name="player_lv" value="'.$player_lv.'">';
    echo '<input type="hidden" name="player_hp" value="'.$player_hp.'">';
    echo '<input type="hidden" name="monster_hp" value="'.$monster_hp.'">';
    echo '<input type="hidden" name="level" value="'.$level.'">';
    echo '<input type="hidden" name="cost" value="'.$cost.'">';
    echo '<input type="hidden" name="hp" value="'.$hp.'">';
    echo '<input type="hidden" name="attack" value="'.$attack.'">';
    echo '<input type="hidden" name="win" value="'.$win.'">';
    echo '<input type="hidden" name="b_suu" value="'.$b_suu.'">';
    echo '<input type="hidden" name="num" value="'.$num.'">';
    echo '<input type="hidden" name="ranking" value="'.$ranking.'">';
    echo '<input type="hidden" name="lasttime" value="'.$lasttime.'">';
    echo '<input type="hidden" name="battle" value="たたかう">';
    echo '<input type="image" name="battle" src="sword.PNG" width="150" alt="たたかう"　>';
    echo '</form>';
    
    if ($level >= $cost){
    echo '<form action="battle.php" method="POST">';
    echo '<input type="hidden" name="player_lv" value="'.$player_lv.'">';
    echo '<input type="hidden" name="player_hp" value="'.$player_hp.'">';
    echo '<input type="hidden" name="monster_hp" value="'.$monster_hp.'">';
    echo '<input type="hidden" name="level" value="'.$level.'">';
    echo '<input type="hidden" name="cost" value="'.$cost.'">';
    echo '<input type="hidden" name="hp" value="'.$hp.'">';
    echo '<input type="hidden" name="attack" value="'.$attack.'">';
    echo '<input type="hidden" name="win" value="'.$win.'">';
    echo '<input type="hidden" name="b_suu" value="'.$b_suu.'">';
    echo '<input type="hidden" name="num" value="'.$num.'">';
    echo '<input type="hidden" name="ranking" value="'.$ranking.'">';
    //echo '<input type="hidden" name="lasttime" value="'.$lasttime.'">';
    echo '<input type="submit" name="levelup" value="レベルアップ">';
    echo '</form>';
    }
    echo '<br>';
    echo '<br>';
}else{
    echo '<form action="battle_top.php" method="POST">';
    echo '<input type="hidden" value= name="player_lv">';
    echo '<input type="hidden" value= name="player_hp">';
    echo '<input type="hidden" value= name="win">';
    echo '<input type="hidden" name="ranking" value="'.$ranking.'">';
    echo '<input type="hidden" name="lasttime" value="'.$lasttime.'">';
    echo '<input type="submit" value="はじめから">';
    echo '</form>';
}
echo '<form action="battle_top.php" method="POST">';
echo '<input type="hidden" name="win" value="'.$win.'">';
echo '<input type="hidden" name="b_suu" value="'.$b_suu.'">';
echo '<input type="hidden" name="ranking" value="'.$ranking.'">';
echo '<input type="hidden" name="lasttime" value="'.$lasttime.'">';
echo '<input type="hidden" name="player_lv" value="'.$player_lv.'">';
echo '<input type="hidden" name="player_hp" value="'.$player_hp.'">';
echo '<input type="hidden" name="monster_hp" value="'.$monster_hp.'">';
echo '<input type="hidden" name="level" value="'.$level.'">';
echo '<input type="hidden" name="cost" value="'.$cost.'">';
echo '<input type="hidden" name="hp" value="'.$hp.'">';
echo '<input type="hidden" name="attack" value="'.$attack.'">';
echo '<input type="submit" name="battle" value="スタート画面へ">';
echo '</form>';
?>
</body>
</div>