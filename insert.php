	<?php 
		
 		require_once("header.php");
		require_once("connection.php");

		$title = $_POST['title'];
		$uploads_dir = 'images/slider/';

		$uploadfile = $uploads_dir . basename($_FILES['image']['name']);
		// if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
		//     echo "File is valid, and was successfully uploaded.\n";
		// } else {
		//     echo "Possible file upload attack!\n";
		// }

		$image = $uploads_dir.$_FILES["image"]['name'];

		//codul trigger-ului
		$sql1 = "DROP TRIGGER IF EXISTS MysqlTriggerInsert";
		$sql2="CREATE TRIGGER MysqlTriggerInsert AFTER INSERT ON `portofoliu` FOR EACH ROW
		    BEGIN
		    INSERT INTO `portofoliu_update` (`title`,`image`,`status`,`edtime`) VALUES (NEW.title,NEW.image,'INSERTED',NOW());
		    END;";
		$stmt1=$conn->prepare($sql1);
		$stmt2=$conn->prepare($sql2);
		$stmt1->execute();
		$stmt2->execute();


		//codul procedurii
		$sql3=" DROP PROCEDURE IF EXISTS InsertPortofoliu";
		$sql4=" CREATE PROCEDURE InsertPortofoliu(
					IN strTitle varchar(50),
					IN strImage varchar(100)
				)
			BEGIN 
			INSERT INTO `portofoliu` (`title`, `image`)  VALUES (strTitle,strImage);
			END ;";

		$stmt3=$conn->prepare($sql3);
		$stmt4=$conn->prepare($sql4);
		$stmt3->execute();
		$stmt4->execute();

		$sql5 = "CALL InsertPortofoliu('{$title}','{$image}')";
		$stmt = $conn->query($sql5);
		// $stmt = $conn->prepare($sql5);
		// $stmt->execute();
		
		if($stmt)
		{
		echo '
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
					<h2 class="heading">Create Mysql Trigger in PHP (INSERT)</h2>
					<hr>
				</div>
			</div>

			<!-- Contact form section
			================================================== -->
			<div class="col-md-offset-1 col-md-10 col-sm-12">';
			$sql6="SELECT * FROM portofoliu_update WHERE status = 'INSERTED'";
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
		
		} else{
		    echo "Vai ! Vai ! ";
		}
		
	require_once('footer.php');
?>