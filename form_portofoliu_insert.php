<?php require_once("header.php");?>


<!-- Contact section
================================================== -->

<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
				<div class="section-title">
					<h1 class="heading">Insert Portofolio</h1>
					<hr>
				</div>
			</div>

			<!-- Contact form section
			================================================== -->
			<div class="col-md-offset-1 col-md-10 col-sm-12">
				<form action="insert.php" method="post" class="wow fadeInUp" data-wow-delay="0.6s" enctype="multipart/form-data" >
					<div class="col-md-6 col-sm-12">
						<input type="text" class="form-control" placeholder="Title" name="title">
					</div>
					<div class="col-md-6 col-sm-12">
						<input type="file" class="form-control" placeholder="Upload a file" name="image">
					</div>
					<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
						<input type="submit" class="form-control" value="Insert">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php require_once("footer.php"); ?>