<?session_start();
include '../logic/func.php';
Head();
CheckAuth();
EndHead();
?>
<div class="main">


<?
admin_dilers();
// include "logic/load_main.php?page='.$page.'";
?>
<!-- Футер -->
</div>
</body>
</html>