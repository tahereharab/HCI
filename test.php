<?php

include'inflect.php';

function loaddict($filename){
$dict_arr=array();
$items = array();
$fp=fopen($filename, 'r');
while (!feof($fp)){	

    $line=fgets($fp);
    if($line != ""){
    $items = explode(",", $line);
    $dict_arr[$items[0]] = $items[1];
}
}
fclose($fp);
return $dict_arr;
}

$fp=fopen('toystory.srt', 'r');

$dict = loaddict("dict_fa.txt");
$items = array();
while (!feof($fp)){	

      $line=fgets($fp);
      $items = explode(" ", $line);
       foreach ($items as $item) {
       	$item = trim( preg_replace( "/[^0-9a-z]+/i", " ", $item ) );
		    $item = strtolower ($item);
		    $item = singularize($item);
		if(isset($dict[$item])){   
			echo $item." ---found it!!!!"."</br>"; 
		}
       }
  }

//include'sub.php';
//$wlist = fopen('word_list_fa.txt', 'r');
//$item = "Sheriff.";


//echo $item."</br>";

//var_dump($dict);

//if(isset($dict[$item])){ 
	 //echo "found it!!!";
	//}

//if( strpos(file_get_contents('word_list_fa.txt'),$item.':') === FALSE)
	  // if(!exec('grep '.escapeshellarg($item).' '.'word_list_fa.txt')) 
   //              {
   //              	//fwrite($wlist, "boooood");
   //              	echo "not found";
   //              }
   //              else
   //              {
   //              	echo " found";
   //              }
?>