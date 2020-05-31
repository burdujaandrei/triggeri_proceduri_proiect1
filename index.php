<?php 
require_once("header.php");
require_once("connection.php");?>

<!-- Homepage section
================================================== -->
<div id="home">
	<div class="site-slider">
        <ul class="bxslider">
        	<?php foreach($homepage as $row)
            { 
			 if($row['id'] != 2 ) 
             {
        		?>
			<li>
                <img src="<?php echo $row['image'];?>" alt="slider image <?php echo $row['id'];?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-caption">
                                <h2><?php echo $row['title'];?></h2>
                                <p class="color-white"><?php echo $row["content"];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
          <?php
      			}else{ ?>
      		<li>
                <img src="<?php echo $row['image'];?>" alt="slider image <?php echo $row['id'];?>">
                <div class="container caption-wrapper">
                    <div class="slider-caption">
                        <h2><?php echo $row['title'];?></h2>
                        <p class="color-white"><?php echo $row["content"];?></p>
                    </div>
                </div>
            </li>
           	<?php 
      		}
      	}
      	?>
        </ul> <!-- /.bxslider -->
        <div class="bx-thumbnail-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="bx-pager">
                        <?php foreach($homepage as $row)
                        { ?>
                        <a data-slide-index="<?php echo $row['id']-1;?>" href=""><img src="images/slider/thumb<?php echo $row['id'];?>.jpg" alt="thumbnail <?php echo $row['id'];?>" /></a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.site-slider -->
</div>

<!-- Work section
================================================== -->
<section id="work" class="parallax-section">
    <div class="container">
        <div class="row">

            <!-- Section title
            ================================================== -->
            <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
                <div class="section-title">
                    <h5 class="wow bounceIn">Adventure Studio</h5>
                    <h1 class="heading">WHAT WE DO</h1>
                    <hr>
                    <p>Click on the adventure logo at the top to scroll up. Nullam a finibus dui. Nullam malesuada vitae odio et fringilla.</p>
                </div>
            </div>


            <!-- Work Owl Carousel section
            ================================================== -->
            <div id="owl-work" class="owl-carousel">
                <?php foreach($work_owl as $row)
                { ?>
                <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="<?php echo $row['delay'];?>">
                    <i class="icon-<?php echo $row['icon'];?> medium-icon"></i>
                        <h3><?php echo $row['title'];?></h3>
                        <hr>
                        <p><?php echo $row['content'];?></p>
                </div>
            <?php } ?>
            </div>

        </div>
    </div>
</section>

<!-- Portfolio section
================================================== -->
<section id="portfolio" class="parallax-section">
    <div class="container">
        <div class="row">

            <!-- Section title
            ================================================== -->
            <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
                <div class="section-title">
                    <h5 class="wow bounceIn">WE ARE DELIGENT</h5>
                    <h1 class="heading">SHOWCASE</h1>
                    <hr>
                    <p>Pellentesque mollis purus ipsum. Fusce tristique ante et est placerat dignissim. Curabitur tincidunt risus non dui vulputate tincidunt.</p>
                </div>
            </div>

            <?php foreach($portofoliu as $row)
            { ?>
            <div class="col-md-4 col-sm-6">
                <div class="grid">
                    <figure class="effect-zoe">
                        <img src="<?php echo $row['image'];?>" alt="portfolio img"/>
                            <figcaption>
                                <h2><?php echo $row['title'];?></h2>
                                <p class="icon-links">
                                    <a href="<?php echo $row['image'];?>" data-lightbox-gallery="portfolio-gallery"><span class="icon icon-attachment"></span></a>
                                </p>

                            </figcaption>    
                    </figure>
                      <a href="form_portofoliu_update.php?id=<?php echo $row["id"];?>">
                                <input type="button" name="update" value="Update" class="smoothScroll btn btn-default">
                            </a>
                            <a href="delete.php?id=<?php echo $row["id"];?>">
                                <input type="button" name="delete" value="Delete" class="smoothScroll btn btn-default">
                            </a>       
                </div>
            </div>   
            <?php } ?>

            <!-- Portfolio bottom section
            ================================================== -->
            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="portfolio-bottom">
                     <a href="form_portofoliu_insert.php"?>
                        <input type="button" name="insert" value="Add a new portfolio" class="smoothScroll btn btn-default">
                    </a>
                    <h2>INTERESTED?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Lorem ipsum dolor sit  amet.</p>
                    <a href="contact.php" class="smoothScroll btn btn-default">LET'S GO!</a>
                </div>
            </div>    
            
        </div>
       
    </div>
</section>      

<?php
require_once("footer.php");
?>