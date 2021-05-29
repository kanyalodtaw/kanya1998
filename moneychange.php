<!DOCTYPE html>
<html>
<head>
    <title>Change Calculator</title>
    <style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');
@import url('https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
background-attachment: fixed;
background-repeat: no-repeat;
font-family: 'Prompt', sans-serif;
opacity: .95;

}
button {
    display: inline-block;
    color: #252537;
  
    width: 180px;
    height: 50px;
  
    padding: 0 20px;
    background: #fff;
    border-radius: 5px;
    
    outline: none;
    border: none;
  
    cursor: pointer;
    text-align: center;
    transition: all 0.2s linear;
    
    margin: 7% auto;
    letter-spacing: 0.05em;
    font-family: 'Prompt', sans-serif;
}

form {
    width: 450px;
    min-height: 500px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 2%;
    background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
    text-align: center;
}
h1{
    text-align: center;
}
h4{
    text-align: center;
}
input[class="form-input"]{
    width: 240px;
    height: 50px;
  
    margin-top: 2%;
    padding: 15px;
    
    font-size: 16px;
    font-family: 'Abel', sans-serif;
    color: #5E6472;
  
    outline: none;
    border: none;
  
    border-radius: 0px 5px 5px 0px;
    transition: 0.2s linear;
    
}
/* Submits */
.submits {
    width: 30%;
    display: inline-block;
    float: right;
    margin-right: 8%;
    text-align: center;
}
table 			      { 
  border-spacing: 1; 
  border-collapse: collapse; 
  background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
  border-radius:6px;
  overflow:hidden;
  max-width:800px; 
  width:100%;
  margin:0 auto;
  position:relative;
  
  *               { position:relative }
  
  td,th           { padding-left:8px}

  thead tr        { 
    height:60px;
    background:#FFED86;
    font-size:16px;
  }
  
  tbody tr        { height:48px; border-bottom:1px solid #E3F1D5 ;
    &:last-child  { border:0; }
  }
  
 	td,th 					{ text-align:left;
		&.l 					{ text-align:center }
		&.c 					{ text-align:center }
		&.r 					{ text-align:center }
	}
}
</style>
</head>
<body>

<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "GET">
<h1>โปรแกรมคิดเงินทอน</h1>
    เงินที่รับมา : <input class="form-input" id="txt-input" type = "text" name = "cost" size=4> <br />
    ราคาสินค้า : <input class="form-input" id="txt-input" type = "text" type = "text" name = "paid" size=4> <br />
<input type="hidden" name = "change" value = "yes">
<button class="btn submits " name = "Calculate" > คำนวณ </button>
   </div>
</form>

<br>
<?php

function sanitizeString($var) 
{
    $var = stripslashes($var); 
    $var = htmlentities($var); 
    $var = strip_tags($var); 
    return $var;
} 

function have_need($have,$coin_value,$max){ 
    //Dave Husk, easyphpscripts.com 
    if($have < $coin_value) return(0); 
    while(1){ 
        if($have >= ($max * $coin_value)) return($max); 
        $max--; 
    } 
} 
function have_want($have,$coin_value,$max){ 
    //Dave Husk, easyphpscripts.com 
    if($have < $coin_value) return($have); 
    while(1){ 
        if($have >= ($max * $coin_value)) return($have - ($max * $coin_value)); 
        $max--; 
    } 
} 


$_GET['change']= sanitizeString($_GET['change']);


if ($_GET['change'] == "yes") {

    $cost = $_GET['cost'];
    $paid = $_GET['paid'];

    $change = $cost-$paid;

    $money = explode(".", round($change, 2));
    echo "<h4>ต้องทอนเงินเป็นจำนวน $money[0] $money[1] บาท<h4></br>";

    }

$have =  $money[0]; 
$have0 = have_want($have,500,9); 
$have1 = have_want($have0,100,9); 
$have2 = have_want($have1,50,9); 
$have3 = have_want($have2,10,10); 
$have4 = have_want($have3,5,20); 


print("<table border=\"2\">"); 
print("<tr><th align=\"center\"><strong>500 บาท</strong></th>"); 
print("<th align=\"center\"><strong>100 บาท</strong></th>"); 
print("<th align=\"center\"><strong>50 บาท</strong></th>"); 
print("<th align=\"center\"><strong>10 บาท</strong></th>"); 
print("<th align=\"center\"><strong>5 บาท</strong></th>"); 
print("<th align=\"center\"><strong>1 บาท</strong></th></tr>"); 


print ('<tr><td align="right">'.have_need($have,500,9).'</td>'); 
print ('<td align="right">'.have_need($have0,100,9).'</td>'); 
print ('<td align="right">'.have_need($have1,50,9).'</td>'); 
print ('<td align="right">'.have_need($have2,10,10).'</td>'); 
print ('<td align="right">'.have_need($have3,5,20).'</td>'); 
print ('<td align="right">'.have_need($have4,1,100).'</td></tr>'); 


?>
</body>
</html>