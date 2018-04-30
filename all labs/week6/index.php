
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>.

<?php
echo  "<p>Hello World</p>";

echo "<p>Hello,world</p>";

echo "<p>Hello,".""."world"."!</p>";
echo 5*7;
$myname="Frodo Baggins";
$myage=111;
echo"<p>My name is ".$myname." and I am ".$myage."</p>";
echo"<p>I get printed </p>";
$name="Edgar";
if($name=="Simon") {
    print"I know you!";
}
else{
    print"who are you?";

}

$myage >16;
if($name>16) {
    print"Buy Specs";
}
else {
    print"dont buy Specs";
}
$name="Edgar";
if($name=="Simon") {
    print"I know you!";
}
else {
    print"who are you?";
}

$name="Edgar";
if($name=="Simon") {
    print"I know you!";
}
else {
    print"who are you?";
}
$numberofHobbits=2;
switch($numberofHobbits) {
    case 1:
        echo"<p>1 sad hobbit";
        break;
    case 2 :
        echo"<p>2 happy hobbits</p>";
        break;
    case 3:
        echo"3 hobbits are a crowd";
        break;
    default:
        echo"All the hobbits have gone home</p>";




}

$myArray=array("do","re","mi");
echo $myArray[0];
$myArray[1]="la";
echo $myArray[1];


//functions
$length=strlen("david");
print $length;

$myname="David";
$partial=substr($myname,0,3);
print$partial;

$uppercase=strtoupper($myname);
print$uppercase;
$lowercase=strtolower($uppercase);
print$lowercase;

strpos


?>

</body>
</html>
