<?php
 
 $k = '*';
 for($i=1; $i<=10; $i++){
     echo'<br>';
     if($i>=5){
         for($l=5 ; $l<=$i ; $l++){
             if($l>=5){
                  echo $k;
             }
        }
     }else{
         echo '.';
     }
     
 }


echo'<br>';

// for($i=1; $i<=5; $i++) {
// for($j=5; $j>=$i; $j--)
// {
// echo '*';
// }
// echo '<br>';
// }
 
 
?>