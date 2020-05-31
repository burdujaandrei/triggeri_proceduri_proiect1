<?php
// --- TRIGGER & DELETE PROCEDURE ----
	require_once('header.php');
	require_once('connection.php');

	$id = $_GET['id'];

	$sql1="DROP PROCEDURE IF EXISTS proceduraDelete";
	$sql2="CREATE PROCEDURE proceduraDelete(
	    IN strId int
	    )
	    BEGIN
	        DELETE FROM portofoliu WHERE id=strId;
	    END;";

	$stmt1=$conn->prepare($sql1);
	$stmt2=$conn->prepare($sql2);
	$stmt1->execute();
	$stmt2->execute();


	$sql6="DROP TRIGGER IF EXISTS TriggerDelete";
	$sql7="CREATE TRIGGER TriggerDelete AFTER DELETE ON portofoliu FOR EACH ROW
	    BEGIN
	    INSERT INTO portofoliu_update(id,title,image,status,edtime) VALUES (NULL,OLD.title,OLD.image,'DELETED',NOW());
	    END;";
	$stmt6=$conn->prepare($sql6);
	$stmt7=$conn->prepare($sql7);
	$stmt6->execute();
	$stmt7->execute(); 

	$sql3="CALL proceduraDelete('{$id}')";
	$q=$conn->query($sql3);
	if($q){
	?>
		<style type="text/css">
			td
			{
			    padding: 0 30px 0 30px;
			}
			</style>

		<section id="contact" class="parallax-section">
		<div class="container">
			<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
				<div class="section-title">
					<h2 class="heading">Create Mysql Trigger in PHP (DELETE)</h2>
					<hr>
				</div>
			</div>

			<!-- Contact form section
			================================================== -->
			<div class="col-md-offset-1 col-md-10 col-sm-12">';
			<?php $sql6="SELECT * FROM portofoliu_update WHERE status = 'DELETED'";
			echo "<table border='1'>
			<tr>
			<th>Title</th>
			<th>Image</th>
			<th>Status</th>
			<th>Time</th>";
			foreach($conn->query($sql6) as $row)
			{
			echo "<tr>
				<td>".$row['title']."</td>
				<td><img src='".$row['image']."' width='50%' height='30%'/></td>
				<td>".$row['status']."</td>
				<td>".$row['edtime']."</td>
				</tr>";
			}
			echo "</table>
					</div>
				</div>
			</div>
		</section>";
	} else {
	    echo "vai vai vai";
	}
	echo "<br><br>";

	require_once('footer.php');
?>