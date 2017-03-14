<?php
/**
 * Created by PhpStorm.
 * User: wolfgang
 * Date: 2016/12/15
 * Time: 11:00 AM prmo code: 6NDGL-EJ3QF-4FXU
 */
$deets = $_POST['deets'];
$deets = preg_replace('#[^0-9/]#i', '', $deets);

include ("dbc.php");

$events = '';
$sql = 'SELECT description FROM events WHERE evdate ="'.$deets.'"';
$query = mysql_query($sql);
$num_rows = mysql_num_rows($query);
if($num_rows > 0){
    $events .= '<div id="eventsControl"><button onMouseDown="overlay()"><i class="fa fa-close" style="color:red;"></i>Close</button><br /><b>'.$deets.'</b><br /><br /></div>';
    
    while($row = mysql_fetch_array($query)){
        $desc = $row['description'];
        $events .= '<div id="eventsBody">'.$desc.'<br /><hr /><br /> </div>';
        
    }

}
	echo $events;

?>