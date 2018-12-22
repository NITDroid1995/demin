<?session_start();
include 'logic/func.php';
$id = $_GET['id'];
Head();
CheckAuth();
EndHead();
include 'forms/add_client.php';

include 'forms/add_car.php';

include 'forms/add_diler.php';
?>



<div style="width: 90%; margin-left: auto; margin-right: auto;">

<?
loadDogovor($id);
?>
<!-- Футер -->




</div>
  </body>
</html>