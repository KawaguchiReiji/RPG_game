<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>RPG風バトル</title>
</head>
<body bgcolor="black">
<div align="center">
<?php
if(isset($_POST['player_lv'])){
   $player_lv=$_POST['player_lv'];
}else{
   $player_lv=1;
}
if(isset($_POST['player_hp'])){
   $player_hp=$_POST['player_hp'];
}else{
   $player_hp=rand(8,12);
}
if(isset($_POST['monster_hp'])){
   $monster_hp=$_POST['monster_hp'];
}else{
   $monster_hp=rand(5,15);
}
if(isset($_POST['win'])){
   $win = $_POST['win'];
} else {
   $win = 0;
}
if(isset($_POST['b_suu'])){
   $b_suu = $_POST['b_suu'];
} else {
   $b_suu = 1;
}
if(isset($_POST['cost'])){
   $cost = $_POST['cost'];
} else {
   $cost = 1;
}
if(isset($_POST['level'])){
   $level = $_POST['level'];
} else {
   $level = 0;
}
if(isset($_POST['hp'])){
   $hp=$_POST['hp'];
}else{
   $hp=$player_hp;
}
if(isset($_POST['attack'])){
   $attack=$_POST['attack'];
}else{
   $attack=rand(3,6);
}
if(isset($_POST['ranking'])){
   $ranking=$_POST['ranking'];
}else{
   $ranking=$ranking;
}
if($ranking <= $win){
   $ranking = $win;
}
if(isset($_POST['lasttime'])){
   $lasttime=$_POST['lasttime'];
}else{
   $lasttime=$lasttime;
}
if($lasttime <= $win){
   $lasttime = $win;
}

// 画面表示内容
echo '<font color=white><font size="5">勇者NS' . '<br>';
echo 'LV:'. $player_lv . '<br>';
echo 'HP:'. $player_hp . '<br>';
echo '<br>';
echo '<font color=Gold>ランキング１位：'.$ranking.'勝</font><br>';
echo '前回：'.$lasttime.'勝';
echo '<br>';
echo '<br>';
echo '<br>';
echo '現在：'.$win . '勝';
echo '<br>';
echo '<br>';

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
echo '<input type="hidden" name="ranking" value="'.$ranking.'">';
echo '<input type="hidden" name="lasttime" value="'.$lasttime.'">';
echo '<input type="submit" name="start" value="冒険開始！！">';
echo '</form>';
echo '<br>';
echo '<form action="battle_top.php" method="POST">';
echo '<input type="hidden" value= name="player_lv">';
echo '<input type="hidden" value= name="player_hp">';
echo '<input type="hidden" value= name="win">';
echo '<input type="hidden" name="ranking" value="'.$ranking.'">';
echo '<input type="hidden" name="lasttime" value="'.$lasttime.'">';
echo '<input type="submit" value="はじめから">';
echo '</form>';
?>
</body>
</div>