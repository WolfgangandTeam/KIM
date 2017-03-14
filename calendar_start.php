<?php
/**
 * Created by PhpStorm.
 * User: wolfgang
 * Date: 2016/12/15
 * Time: 6:04 AM prmo code: 6NDGL-EJ3QF-4FXU
 */
$showmonth = $_POST['showmonth'];
$showyear = $_POST['showyear'];
$showmonth = preg_replace('#[^0-9]#i', '', $showmonth);
$showyear = preg_replace('#[^0-9]#i', '', $showyear);

//$showmonth = 2;
//$showyear = 2017;

$day_count = cal_days_in_month(CAL_GREGORIAN, $showmonth, $showyear);
$pre_days = date('w', mktime(0, 0, 0, $showmonth, 1, $showyear));
$post_days = (6 - (date('w', mktime(0, 0, 0, $showmonth, $day_count, $showyear))));

echo '<div id="calendar_wrap">';


echo '<div class="title_bar">';
echo '<div class="previous_month"><input name="myBtn" type="submit" value="previous" onClick="javascript:last_month();"></div>';
echo '<div class="show_month">'.$showmonth.'/'. $showyear.'</div>';
echo '<div class="next_month"><input name="myBtn" type="submit" value="next" onClick="javascript:next_month();"></div>';
echo '</div>';

echo '<div class="week_days clear">';
echo '<div class="days_of_week">Sun</div>';
echo '<div class="days_of_week">Mon</div>';
echo '<div class="days_of_week">Tue</div>';
echo '<div class="days_of_week">Wed</div>';
echo '<div class="days_of_week">Thur</div>';
echo '<div class="days_of_week">Fri</div>';
echo '<div class="days_of_week">Sat</div>';
echo '<div class="clear"></div>';
echo '</div>';

/*Previous month filler*/
if($pre_days != 0){
    for($i = 1; $i <= $pre_days; $i++){
        echo '<div class="non_cal_day"></div>';
    }
}

/*Cuurent month filler*/
//connect to db
include ("dbc.php");

for($i = 1; $i <= $day_count; $i++){
    $date = $showmonth.'/'.$i.'/'.$showyear;
    $sql = 'SELECT id FROM events WHERE evdate ="'.$date.'" AND visible=1';
	
    $query = mysql_query($sql);
    $num_rows = mysql_num_rows($query);
    if($num_rows > 0){
        $events = '<input name="'.$date.'" type="submit" value="Details" id="'.$date.'" onClick="javascript:show_details(this);">';

    }


    echo '<div class="cal_day">';
    echo    '<div class="day-heading"><div clas="awesome_date">'.$i.'</div></div>';
    //show events
    if($num_rows != 0){echo "<div class='openings'><br/>".$events."</div>";};

    echo '</div>';

}

/*Next Fiiler Month */
if($post_days != 0){
    for ($i =1; $i <=$post_days; $i++){
        echo '<div class="non_cal_day"></div>';
    }
}



echo '</div>';


?>