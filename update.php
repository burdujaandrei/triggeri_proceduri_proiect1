<?php 
 	require_once("header.php");
	require_once('connection.php');

	$title = $_POST['title'];
	$content = $_POST['content'];
	$id = $_POST['id'];

	$uploads_dir = 'images/slider/';

	$uploadfile = $uploads_dir . basename($_FILES['image']['name']);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
		    echo "File is valid, and was successfully uploaded.\n";
		} else {
		    echo "Possible file upload attack!\n";
		}

	$temp = $uploads_dir.$_FILES["image"]['name'];	

	if(!empty($_FILES["image"]['name']) && $_POST['old_image'] != $temp)
	{
		$image = $temp;
	}
	else
	{
		$image = $_POST['old_image'];
	}
	
	//codul trigger-ului
		$sql1="DROP PROCEDURE IF EXISTS proceduraUpdate";
		$sql2="CREATE PROCEDURE proceduraUpdate(
			IN strId int,
		    IN strTitle varchar(50),
		   	IN strImage varchar(100)
		    )
		    BEGIN
		        UPDATE portofoliu SET title=strTitle, image=strImage WHERE id=strId;
		    END;";
		$stmt1=$conn->prepare($sql1);
		$stmt2=$conn->prepare($sql2);
		$stmt1->execute();
		$stmt2->execute();


		$sql5="DROP TRIGGER IF EXISTS TriggerUpdate";
		$sql4="CREATE TRIGGER TriggerUpdate BEFORE UPDATE ON portofoliu FOR EACH ROW
		    BEGIN
		    INSERT INTO `portofoliu_update` (`title`,`image`,`status`,`edtime`) VALUES (NEW.title,NEW.image,'UPDATED',NOW());
		    END;";
		$stmt5=$conn->prepare($sql5);
		$stmt4=$conn->prepare($sql4);
		$stmt5->execute();
		$stmt4->execute(); 

		$sql3="CALL proceduraUpdate('{$id}','{$title}','{$image}')";
		$stmt=$conn->query($sql3);
		
		if($stmt)
		{
		 header('Location: after_update.php');
		} else{
		    echo "Vai ! Vai ! ";
		}
		

	require_once("footer.php");
?>