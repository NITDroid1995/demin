<?php  

$mysqli = mysqli_connect("localhost", "site", "site", "demin");


// ВТОРАЯ ВЕРСИЯ ВЫВОДА
$num = 9;
// Извлекаем из URL текущую страницу
$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result = mysqli_query($mysqli, "SELECT * FROM cars WHERE active = 'yes'");
$posts = mysqli_num_rows($result);
// Находим общее число страниц
$total = intval(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
$result = mysqli_query($mysqli, "SELECT * FROM cars WHERE active = 'yes' ORDER by ID DESC LIMIT $start, $num");
// В цикле переносим результаты запроса в массив $postrow
 
while ( $postrow[] = mysqli_fetch_array($result))
////////////////
  echo "";
for($i = 0; $i < $num; $i++)
{
$_SESSION['$postrow['.$i.'][mark]']=$postrow[$i]['mark'];
    $uid=$postrow[$i]['id'];
if ($postrow[$i]['id']!=NULL)
{

echo ' 
    	<div class="container">
        <div class="cont_img">
 	    <img class="image" src="http://nitdroid.dlinkddns.com/demin/img/'.$postrow[$i]["img"].'" ></img>
    </div>
        <div>
      <a style="margin-left: 25%;" href="http://nitdroid.dlinkddns.com/demin/view.php?id='.$postrow[$i]['id'].'">'.$postrow[$i]["model"].' '.$postrow[$i]["mark"].'</a>
       </div>
       </div>
    	';

// $postrow[$i]['id']; Переменная машины
// $u['nick']; переменная дилера
}
}
$link = 'http://nitdroid.dlinkddns.com/demin/index.php?page=';
if ($page != 1) $pervpage = '<li class="page-item"><a class="page-link" href="'.$link.($page - 1).'">Предыдущая</a></li>';
if ($page != $total) $nextpage = '<li class="page-item"><a class="page-link" href="'.$link.($page + 1).'">Следующая</a></li><li class="page-item"><a class="page-link" href="'.$link.$total.'">Последняя</a></li>';
// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 2 > 0) $page2left = '<li class="page-item"><a class="page-link" href="'.$link.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li class="page-item"><a class="page-link" href="'.$link.($page - 1).'">'.($page - 1).'</a></li>';
if($page + 2 <= $total) $page2right = '<li class="page-item"><a class="page-link" href="'.$link.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li class="page-item"><a class="page-link" href="'.$link.($page + 1).'">'.($page + 1).'</a></li>';
$page1 = '<li class="page-item disabled"><a class="page-link" href="#">'.$page.'</a></li>';
// Вывод меню
echo '

<div class="navbar-fixed-bottom row-fluid" style="width: 100%; float: left; bottom:0;">
<div class="navbar-inner">
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">';
if($total < 2){

}else{
  echo "".$pervpage.$page2left.$page1left.$page1.$page1right.$page2right.$nextpage."";
echo ' 
</ul>
</nav>
</div>
</div>
';
}

?>
