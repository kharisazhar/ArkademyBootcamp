<?php
function fibo($insert1, $insert2){
    $sementara1 = 1;
    $sementara2 = 0;
    $result = "";
    for ($i=0; $i < $insert2; $i++) { 
        for($j = 0;$j < $insert1;$j++){
            if($j == 0 & $i == 0)
                $result .= "0, ";
            else if($j == 1 && $i == 0)
                $result .= "1, ";
            else{
                $result .= ($sementara2 + $sementara1).", ";
                $sementara = $sementara2;
                $sementara2 = $sementara1;
                $sementara1 = $sementara + $sementara1;
            }
        }
        $result .="<br>";
    }
    return $result;
}
echo fibo(4, 3);
?>