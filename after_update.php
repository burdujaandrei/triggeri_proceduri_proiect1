		<?php 
		require_once('header.php');
		require_once('connection.php');?>
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
					<h2 class="heading">Create Mysql Trigger in PHP (UPDATE)</h2>
					<hr>
				</div>
			</div>

			<!-- Contact form section
			================================================== -->
			<div class="col-md-offset-1 col-md-10 col-sm-12">';
			<?php $sql6="SELECT * FROM portofoliu_update WHERE status = 'UPDATED'";
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
		require_once('footer.php');
		?>