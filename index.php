<?
/*
esercizio di oggi: PHP Snack 1
nome cartella / repo: php-snacks-b1
PHP Snack 1:
Creiamo un array 'matches' contenente altri array i quali rappresentano delle partite di basket di un’ipotetica tappa del calendario.
Ogni array della partita avrà una squadra di casa e una squadra ospite, punti fatti dalla squadra di casa e punti fatti dalla squadra ospite.
Stampiamo a schermo tutte le partite con questo schema:
Olimpia Milano - Cantù | 55-60
PHP Snack 2:
Passare come parametri GET (query string) name, mail e age
verificare (cercando i metodi che non
conosciamo nella documentazione) che:
1. name sia più lungo di 3 caratteri
2. che mail contenga un punto e una chiocciola
3. che age sia un numero.
Se tutto è ok stampare “Accesso riuscito”, altrimenti “Accesso negato”
PHP Snack 3 Bonus (solo come bonus e solo se completati i due precedenti)
Creare un array con 15 numeri casuali, tenendo conto che l’array non dovrà contenere lo stesso numero più di una volta


*/

$matches[] = ["HOME"=>"Dinamo Sassari","GUEST"=>"Venezia","P Home"=>rand(20,80),"P Guest"=>rand(20,80)];
$matches[] = ["HOME"=>"Olimpia Milano","GUEST"=>"Cantù","P Home"=>rand(20,80),"P Guest"=>rand(20,80)];
$matches[] = ["HOME"=>"Brindisi","GUEST"=>"Virtus Bologna","P Home"=>rand(20,80),"P Guest"=>rand(20,80)];

/*----------------------------------------------------------------------------------------------------------------*/
$access = "Accesso Riuscito";

$name = ( preg_match( '/([a-z]+)/i' ,$_GET['name'])) ? true : '<script>alert("nome errato Accesso Negato!!")</script>';
$email = preg_match( '/^(\w*)@(\w*)\x2E(\w*)$/' ,$_GET['email']) ? true : '<script>alert("email errata Accesso Negato!!")</script>';
$age  = ( preg_match( '/(\d){0,1}/' ,intval($_GET['age']) ) ) ? true : '<script>alert("età errata Accesso Negato!!")</script>';

$access = ($name===true&&$email===true&&$age===true)===true ? $access : ($name.' '.$email.' '.$age);

var_dump($_GET['age']);

/*-----------------------------------------------------------------------------------------------------------------*/

$array[] = rand(0,100);

for ($i=0 ; $i<15 ; ){
    $rnd = rand(0,100);

    if (array_search($rnd,$array)===false){
        $array[] = $rnd;
        $i++;
    }
    
      
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="http://casaalmada.hostinggratis.it/doc/css/reset.css">
<link rel="stylesheet" href="css/style.css">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>php snack b1</title>
</head>
<body>

    <div class="tabellone">
        <?for ( $i=0 ; $i<count($matches) ; $i++) :?>

        <div class="squadre">
            <div class="home">
                <? echo $matches[$i]["HOME"]; ?>
            </div>
            <div class="guest">
                <? echo $matches[$i]["GUEST"]; ?>
            </div>
        </div>
            <div class="punti">
                <div class="p-guest">
                    <? echo $matches[$i]["P Home"];  ?>
                </div>
                <div class="p-home">
                    <? echo $matches[$i]["P Guest"]; ?>
                </div>
            </div>
        
    <?endfor?>
    </div>

    <hr>

    <div class="controllo">
            
            <? echo($access); ?>
            
    </div>

    <hr>

    <div class="pop-array">
        <ul>
            <?for ( $j=0 ; $j<(count($array)-1) ; $j++) :?>
                <li>
                    <? echo $array[$j]; ?>
                </li>
            <?endfor?>
        </ul>
    
    </div>



</body>

</html>
