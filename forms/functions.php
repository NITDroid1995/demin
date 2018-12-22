<?php
function loadUsers(){
    $bd = mysqli_connect("localhost", "site", "site", "demin");
    $quary = ('SELECT * FROM clients ORDER BY sername ASC');
    if ($result = $bd->query($quary)) {
    while ($row = $result->fetch_assoc()) {
    	echo '<option>'.$row["sername"].' '.$row["name"].' '.$row["second_name"].'</option>';
    }
    }
}

function search($search){
	echo ($search);
}

?>