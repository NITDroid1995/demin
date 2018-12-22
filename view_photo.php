<?session_start();
include 'logic/func.php';
$img1 = $_GET['img'];
Head();
CheckAuth();
EndHead();
include 'forms/add_client.php';

include 'forms/add_car.php';

include 'forms/add_diler.php';
?>


<img style="display: block; margin-left: auto; margin-right: auto;" src="/demin/img/<?echo($img1)?>">

 </body>
</html>
