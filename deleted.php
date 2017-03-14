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
	
	<style>
	.ui-menu { width: 150px; }
		a{ text-decoration:none;}
		#important{
			color:red;
		}
		#important:hover{
			color:#4f0000;
		}
		
		
	</style>
	
</head>
<body>
<?php include "menu_nav.php";	?>
	
	
	
	
<center>
	<div id="status"></div>

				
		<?php
			include "dbc.php";
			$counter = 0;
			
			echo '<div id="accordion" style="width:100%; max-width:720px; margin:5% 0; padding:10px;">';
			$sql = "SELECT * FROM events WHERE visible='0' ORDER BY id";//ORDER by to get it sort to current
			$result = mysql_query( $sql);
			while($row = mysql_fetch_array($result)){
				echo '<div class="group" >';
					echo '<div class="items" style="width:100%; max-width:720px; margin:5% 0; padding:10px;">';

						echo '<p class="title">'.++$counter.' '.$row['heading'].'</p>';
						echo '<div class="controls">';

						echo '<button ><i class="fa fa-check"></i> Confirm</button>';
						echo '<button><i class="fa fa-close"></i> Cancel</button>';

						/*echo '<div class="separator"></div>';

						echo '<button><i class="fa fa-edit "></i> Edit</button>';
						echo '<button><i class="fa fa-trash "></i> Delete</button>';*/
					echo '</div>';
				echo '</div>';
				echo '<div class="calendar-input clear">';
				echo '<h3>Edit event on your calendar</h3>';
				echo '<form action="del_event.php" method="POST">';
					echo ' <input type="hidden"  name="id" value="'.$row['id'].'" required/></p>';
					echo '<p>Title: <input type="text"  name="title" value="'.$row['heading'].'" id="title" required/></p>';
					echo '<p>Desc: <textarea required name="desc" cols="20" rows="5" value="'.$row['description'].'" placeholder="Even decription here." id="desc" > '.$row['description'].'</textarea><!--input col="10" type="text" --></p>';

					echo '<p>Date: <input type="text" name="datepicker" id="datepicker" value="'.$row['evdate'].'" required></p>';

				
						echo '<input type="submit" name="delete" value="Permanently Delete"  style="color:red;" class="formBt" id="important"/>';				
					echo '<input type="submit" name="undo" value="Undo" class="formBt"/>';
					
				
				echo '</form>';
			echo '</div>';
				
				echo '</div>';
			
			}
		
		
		?>
		



</center>
</body>
</html>