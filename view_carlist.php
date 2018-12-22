<?session_start();
include 'logic/func.php';
Head();
CheckAuth();
$code = $_GET['code'];
?>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Поиск" aria-label="Search">
    </form>
<?
EndHead();
include 'forms/add_client.php';

include 'forms/add_car.php';

include 'forms/add_diler.php';
?>



<div style="width: 90%; margin-left: auto; margin-right: auto;">

<?
loadClientsCar($code);
?>
<!-- Футер -->




</div>
  </body>
</html>