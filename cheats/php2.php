<?php
$n=$_POST['num'];
$c=0;
$a=2;
$b=3;
$s=0;
if($n>=2&&$n<=100)
{
    for($i=2;$i<$n;$i++)
    {
        if($n%$i==0)
        $c++;
    }
    if($n==2||$c==0)
    {
        echo ("No. is prime");
        if($n==2)
        echo ($a);
        else
        {
            echo "$a $b ";
            while($s<=$n)
            {
                $s=$a+$b;
                $a=$b;
                $b=$s;
                echo "$s " ;
            }
        }
    }
    else
    {
        echo ("No. is not prime");
        echo ("<br");
        $f=1;
        for($i=1;$i<=$n;$i++)
        {
            $f=$f*$i;
        }
        echo ($f);
    }
}
?>