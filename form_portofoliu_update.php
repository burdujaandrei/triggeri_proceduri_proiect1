<?php require_once("header.php");
require_once("connection.php");

 // The SQL SELECT Statement for HOME section (one row)
    $sql_one_cover = "SELECT * FROM portofoliu WHERE id='".$_GET['id']."'";
    $result_one_cover = $conn->query($sql_one_cover);
    $one_cover = $result_one_cover->fetch(); 
?>


<!-- Contact section
================================================== -->

<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
				<div class="section-title">
					<h1 class="heading">Update Portofoliu</h1>
					<hr>
				</div>
			</div>

			<!-- Contact form section
			================================================== -->
			<div class="col-md-offset-1 col-md-10 col-sm-12">
				<form action="update.php" method="post" class="wow fadeInUp" data-wow-delay="0.6s" enctype="multipart/form-data" >
					<div class="col-md-4 col-sm-6" hidden>
						<input type="text" class="form-control" value="<?php echo $_GET['id'];?>" name="id">
					</div>
					<div class="col-md-4 col-sm-8">
						<h3>Title</h3>
						<input type="text" class="form-control" value="<?php echo $one_cover['title'];?>" name="title">
					</div>
 					<a data-slide-index="<?php echo $one_cover['id']-1;?>" href=""><img src="images/slider/thumb<?php echo $one_cover['id'];?>.jpg" alt="thumbnail <?php echo $one_cover['id'];?>" />
 					</a>
                    <div class="col-md-4 col-sm-12">
                    	<h3>Image</h3>
                    	<input type="hidden" class="form-control" name="old_image" value="<?php echo $one_cover['image'];?>" >
						<input type="file" class="form-control" value="Upload a file" name="image">
					</div>
                       

					<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
						<input type="submit" class="form-control" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php require_once("footer.php"); ?>