<?php
  	/*
  	 * Autor: Ľubomír Závodský (xzavod14)
  	 * Rok: 2021
  	 * Projekt: calcurator na isu
  	 *
  	 */

main();

function main(){
  global $argc;
  global $argv;
global $number;
global $desiatkova;
$desiatkova = 0;
echo $desiatkova;
controlinput();
if(!$number) echo "nebolo zadanne cislo";

$oddelenie = explode("=", $argv[1], 2);
echo $oddelenie[1];
$desiatkova =  $oddelenie[1];
floatval($desiatkova);


$desatine = explode(".", $desiatkova, 2);

$binarnea=base_convert($desatine[0],10,2);

$binarneb=decfloattobin($desatine[1]);

$a8=base_convert($desatine[0],10,8);
$b8=decfloatto8($desatine[1]);
//$a8=base_convert($desatine[0],10,16);
//$b8=decfloatto16($desatine[1]);

echo "\nDesiatkova sustava:";
echo $desiatkova;
echo "\n";
echo "\nBinarna sustava:";
echo $binarnea;
echo ".";
echo $binarneb;
echo "\n";
echo "\nosmickova sustava:";
echo $a8;
echo ".";
echo $b8;
echo "\n";
echo "\nosmickova sustava:";
/*echo $a16;
echo ".";
echo $b16;
echo "\n";
*/

}
/*
function decfloatto16($in){
global $final3;

$i = 0;

  while ($i < 12) {
    echo $in;
    $in = $in*16;
    strval($in);
    $počet = strlen((string) $in);
$d = substr($in,0,2 );


    intval($d);
    intval($in);
    if ($d == 0) {


      $final2 .= $d;

    }
    else {
      echo "\n";
      echo $in;
      echo "\n";
echo pow(10,$počet);
      $in=$in-pow(10,$počet)/10*$d;
    $final3 .= $d;
    }
    $i++;




  }
  intval($final3);
  return $final3;
}*/
function decfloatto8($in){
global $final2;

$i = 0;

  while ($i < 12) {
    echo $in;
    $in = $in*8;
    strval($in);
    $počet = strlen((string) $in);
$d = substr($in,0,1 );


    intval($d);
    intval($in);
    if ($d == 0) {


      $final2 .= $d;

    }
    else {
      echo "\n";
      echo $in;
      echo "\n";
echo pow(10,$počet);
      $in=$in-pow(10,$počet)/10*$d;
    $final2 .= $d;
    }
    $i++;




  }
  intval($final2);
  return $final2;
}

function decfloattobin($in){
global $final;

$i = 0;

  while ($i < 12) {
    echo $in;
    $in = $in*2;
    strval($in);
    $počet = strlen((string) $in);
$d = substr($in,0,1 );


    intval($d);
    intval($in);
    if ($d == 1) {

      $in=$in-pow(10,$počet)/10;
      $final .= "1";

    }
    else {
    $final .= "0";
    }
    $i++;




  }
  intval($final);
  return $final;
}


function controlinput()
{
  global $argc;
  global $argv;
  global  $number;
  $stats = false;
  $options =  getopt("",["help","number"]);
  if ($argc >= 3)
  {

      // ak je jeden parameter help a ma viac argumentov
      if (array_key_exists('help', $options))
      {
        fprintf(STDERR, "prilis vela argumentov alebo zla forma skus parse.php --help\n" );
        exit(10);
      }
      else {

      //kontrola argumentov rozširenia stats
      if (stristr($argv[1],'number='))
      {

        $number = true;
      }
      else
      {

       fprintf(STDERR,"zla forma argumentov! skus parse.php --help\n");
       exit(10);
      }

    }

  }
  elseif ($argc == 2)
  { //1 argument
    //help
    if (array_key_exists('help', $options))
    {
    fprintf(STDERR,"
    Použití: callisu.php [options]\n

    Volby:\n
    --help       zobrazit tuto zpávu nápovedy a ukončit\n
    --number=x zvolit číslo na prevod do ostatnych sustav  \n
    --desiatkova  na vstupe je čislo v 10 sustave  \n

    Vytvoril Ľubomír Závodský <xzavod14@vutbr.cz>\n");
      exit(0);
    }
    //vypis "prazdnej" štatistiky
    elseif  (stristr($argv[1],'number='))
    {
      $number = true;

    }
    else
    {

    fprintf(STDERR,"zla forma argumentov! skus parse.php --help\n");
    exit(10);
    }
  }
}
?>
