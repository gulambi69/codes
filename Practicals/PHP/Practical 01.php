<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Practice</title>
</head>
<body>
<?php
$i=0;
$j=0;
for($i=0;$i<4;$i++){
for($j=4;$j>$i;$j--){
if($i==0 && $j==4)
continue;
echo "*";
}
for($j=2*$i-1;$j>0;$j--){
echo "&nbsp; ";
}
for($j=4;$j>$i;$j--){
echo "*";
}
echo "</br>";
}
$sp=7;
for($i=2;$i<5;$i++){
for($j=0;$j<$i;$j++){
echo "*";
}
for($j=0;$j<$sp;$j++){
echo "&nbsp; ";
$sp-=2;
}
for($j=0;$j<$i;$j++){
if($i==4 && $j==$i-1)
continue;
echo "*";
}
echo "</br>";
}
?>
</body>
</html>