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
//************************************
function loadsubtitles($filename , $filename2 , $language){
$smart_path = "smart_sub_".$language.".srt";
$fw = fopen($smart_path, 'w');

$wlist_path = "word_list_".$language.".txt";
$wlist = fopen($wlist_path, 'w');

$dictPath = "";
switch ($language) {
  case 'IT':
    $dictPath = "dict_it.txt";
    break;
  case 'FA':
  $dictPath = "dict_fa.txt";
  break;
  case 'DE':
    $dictPath = "dict_du.txt";
    break;
  default:
    $dictPath = "dict_fa.txt";
    break;
}

$dict = loaddict($dictPath);
$items = array();
$fp=fopen($filename, 'r');
$fp2=fopen($filename2, 'r');

$lines = file($filename);
//$lines2 = file($filename2);
$i = 0;
//$j = 0;
while (!feof($fp)){	

      $line=fgets($fp);
      $line2=fgets($fp2);

      //$line2 = mb_convert_encoding($line2,'UTF-8','UTF-16');
      //echo $line2;


//echo "<hr>";
      $items = explode(" ", $line);
      $newline = "";
            foreach ($items as $item) {
            	 $stem = trim( preg_replace( "/[^0-9a-z]+/i", " ", $item ) );
               $stem = strtolower ($stem);
               $stem = singularize($stem);

                if(isset($dict[$stem])){                	
	               $newline = $newline .'<div class="tooltip"><mark>'.$item.'</mark><span class="tooltiptext">'.str_replace(PHP_EOL, "",$dict[$stem]).'</span></div>';

                  //write in word list************
                if( strpos(file_get_contents($wlist_path),$stem) == false)
                {
                  $newItem = $stem.": ".$dict[$stem];
                  fwrite($wlist, $newItem);
                }else{}

                //*******************************
                }else{
                	$newline = $newline." ".$item;
                }	

            } //foreach

        
       //$line = implode(" ", $items);
       //find translation of sentence *********************
        //echo strlen($line2);    
        //echo "\n";
        if(preg_match('/\\d/', $line2) == FALSE && strlen($line2) != 1)
        {
            $newline = trim($newline, ' ');
            $newline = str_replace(array("\r","\n"), "", $newline);
            $newline = $newline.'<div class="tooltip2"> &#9734;</img><span class="tooltiptext">'.$line2.'</span></div>...';

            if($i+1 < sizeof($lines)){
               $nextline=$lines[$i+1];
               //echo $nextline."#####";
               //echo strlen($nextline)."-----";
               if(strlen($nextline) === 1)
               {
                  $newline = $newline.PHP_EOL;
               }

            }
        }
       //**************************************************    
       $newline = ltrim($newline, ' '); 
       //str_replace("\n", "", $newline);
       $newline = str_replace("\r", "", $newline);
       //echo $newline;
       fwrite($fw, $newline);
      //echo $newline."</br>";
       $i++;
       //$j++;

    } //while
    fclose($fp);
    fclose($fw);
    fclose($wlist);
    echo "Smart Subtitle Created!";
    header("location:player.php?m=".$_POST['movie_select']."&s=".$smart_path."&w=".$wlist_path);
    
}
 //************************************


$subtitle = loadsubtitles($_POST['eng_sub_select'], $_POST['oth_sub_select'] , $_POST['lang']);

?>


