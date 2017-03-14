<?php
	session_start();
	if(!(isset($_SESSION['authorized']) & $_SESSION['authorized'] === true)){
		header("location: login.php");	
	}



?>


<!Doctype html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Adding event to Calendar</title>
	
	
	<link rel="stylesheet" href="css/datepicker.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/add_event.css">
	<link rel="stylesheet" href="css/accordion.css">
	<link rel="stylesheet" href="css/calendar-item.css" />
	<link rel="stylesheet" href="/resources/demos/style.css">

	
	<script type="text/javascript" src="js/calendar.js"></script>
	
	<!--FrameWork-->
	<script src="js/jquery.js"></script>
 	<script src="js/jquery-ui.js"></script>
	<script src="js/require.js"></script>
	
	
	
	<link rel="stylesheet" href="css/all.css">
	<script>
		$( function() {
			$( "#menu" ).menu();
		});
		$( function(n) {
			var today = new Date();
			$( "#datepicker" ).datepicker({
				numberOfMonths: 3,
				showButtonPanel: true,
				minDate : today
			});
		});
		
		$( function(n) {
			var today = new Date();
			$( "#datepicker" ).datepicker({
				numberOfMonths: 3,
				showButtonPanel: true,
				minDate : today
			});
		});
		
		$( function() {
			$( "#accordion" )
					.accordion({
						header: "> div > .items"
					})
					.sortable({
						axis: "y",
						handle: "h3",
						stop: function( event, ui ) {
							// IE doesn't register the blur when sorting
							// so trigger focusout handlers to remove .ui-state-focus
							ui.item.children( "h3" ).triggerHandler( "focusout" );

							// Refresh accordion to handle new order
							$( this ).accordion( "refresh" );
						}
					});
		} );
		
		

	</script>
	
	<?include "functions/style.php"?>
	
</head>
<body>
<?php include "menu_nav.php";	?>
	
	
	
	
<center>
	<div id="status"></div>
	<div id="calendar-input">
		<h3>Add Data record to dictionary</h3>
		<form action="add_data_dictionary.php" method="POST">
			
			<p>Table name: <input type="text"  name="table_name" id="title" required/></p>
			<p>table row: <input type="text"  name="table_row" id="title" required/></p>
			<p>Value: <input type="text" name="value" id="title" required/></p>

			<p>Description: <input type="text" name="desc" id="datepicker" required></p>
			
			<input type="submit" value="Add To dictionary" class="formBt"/>
		</form>	
		<!--Do Ajax call here-->
		<br /><br />
		
	
		
	</div>	
	
		<!--div class=" group">
			<div class="items"-->
				
		<?php
			include "dbc.php";
			$counter = 0;
			
			echo '<div id="accordion" style="width:720px; margin:20px 0; padding:10px;">';
			$sql = "SELECT * FROM data_dictionary where visible='1'";
			$result = mysql_query( $sql);
			while($row = mysql_fetch_array($result)){
				echo '<div class="group">';
					echo '<div class="items">';

						echo '<p class="title">'.++$counter.' '.$row['table_name'].' - '.$row['row_name'].'</p>';
				
				echo '</div>';
				echo '<div class="calendar-input clear">';
				echo '<h3>Edit event on your calendar</h3>';
				echo '<form method="POST" action="edit_data_dictionary.php">';
					echo ' <input type="hidden"  name="id" value="'.$row['id'].'" required/>';
					echo '<p>Table name: <input type="text"  name="title" value="'.$row['table_name'].'" id="title" required/></p>';
					echo '<p>table row: <input type="text"  name="title" value="'.$row['row_name'].'" id="title" required/></p>';
					echo '<p>Value: <textarea required name="desc" cols="20" rows="5" value="'.$row['value'].'" placeholder="Even decription here." id="desc" >'.$row['description'].' </textarea></p>';

					echo '<p>Description: <input type="text" name="datepicker" id="datepicker" value="'.$row['description'].'" required></p>';

					echo '<input type="submit" name="edit" value="Edit" class="formBt"/>';
					
					echo '<input type="submit" name="delete" value="Delete"  class="formBt"/>';
				
				
				echo '</form>';
			echo '</div>';
				
				echo '</div>';
			
			}
		
		
		?>
		



</center>
</body>
</html>