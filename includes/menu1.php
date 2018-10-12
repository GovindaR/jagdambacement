<div id="menuWrap">

  <div class="col-md-11 col-sm-12">

  <div class="row">

  <div class="menu">

    <ul>

      <li><a href="<?php echo URL_PATH;?>index.php" class="home">Home</a></li>

      <li><a href="inner.php?title=company-profile">About us <span>&nbsp;</span></a>

        <div class="dropdown">

          <div class="dropdownWrap">

            <?php

                  	$i=1;

					$about_sql = "SELECT * FROM content WHERE ParentId='19'";

					$about_stmt = $conn->prepare($about_sql);

					$about_stmt->execute();

					while($about_rows = $about_stmt->fetch()){?>

            <div class="dropdownBox <?php echo($i==4)?"last-child":"";?>">

              <h3><?php echo $about_rows['Title'];?></h3>

              <div class="txt"> <img data-src="uploads/<?php echo $about_rows['Image'];?>" />

                <p><?php echo $kml->textLimit($about_rows['Details'],100,"<br />");?></p>

                <a href="inner.php?title=<?php echo $about_rows['Alias'];?>" class="more">Know More</a> </div>

            </div>

            <?php 

					$i++;

					}?>

          </div>

        </div>

      </li>

      <li><a href="#">Our Plant <span>&nbsp;</span></a>

        <div class="dropdown">

          <div class="dropdownWrap">

            <?php

                  	$i=1;

					$plant_sql = "SELECT * FROM plant ";

					$plant_stmt = $conn->prepare($plant_sql);

					$plant_stmt->execute();

					while($plant_rows = $plant_stmt->fetch()){?>

            <div class="dropdownBox towCol <?php echo($i==2)?"last-child":"";?>">

              <h3><?php echo $plant_rows['Title'];?></h3>

              <div class="txt"> <img data-src="uploads/<?php echo $plant_rows['Image'];?>" /> <p><?php echo $kml->textLimit($plant_rows['Details'],100);?></p>

              <a href="plant.php?title=<?php echo $plant_rows['Alias'];?>" class="more">Know More</a> </div>

            </div>

            <?php 

					$i++;

					}?>

          </div>

        </div>

      </li>

      <li><a href="#">Our Products <span>&nbsp;</span></a>

        <div class="dropdown">

        <div class="dropdownWrap">

        <?php

                  	$i=1;

					$product_sql = "SELECT * FROM products";

					$product_stmt = $conn->prepare($product_sql);

					$product_stmt->execute();

					while($product_rows = $product_stmt->fetch()){?>

        <div class="dropdownBox threeCol <?php echo($i==3)?"last-child":"";?>">

          <h3><?php echo $product_rows['Title'];?></h3>

          <div class="txt"> <img data-src="uploads/<?php echo $product_rows['Image'];?>" />

            <p><?php echo $kml->textLimit($product_rows['Details'],100);?></p>

            <a href="product.php?title=<?php echo $product_rows['Alias'];?>" class="more">Know More</a> </div>

        </div>

        <?php 

					$i++;

					}?>

      </li>

      <li><a href="<?php echo URL_PATH . "csr.php";?>">CSR</a></li>

      <li><a href="#">Portfolio <span>&nbsp;</span></a>

        <div class="dropdown">

          <div class="dropdownWrap">

            <?php

                    	$porfolio_sql = "SELECT * FROM content WHERE ParentId='23' ORDER BY OrderBy";

						$porfolio_stmt = $conn->prepare($porfolio_sql);

						$porfolio_stmt->execute();

						$i=1;

						while($porfolio_rows = $porfolio_stmt->fetch()){?>

            <div class="dropdownBox threeCol <?php echo ($i%3==0)?"last-child":"";?>">

              <h3><?php echo $porfolio_rows['Title'];?></h3>

              <div class="txt"> <img data-src="<?php echo URL_PATH."uploads/".$porfolio_rows['Image'];?>"  />

                <p><?php echo $kml->textLimit($porfolio_rows['Details'],100)?></p>

                <a href="<?php echo ($porfolio_rows['Urls'])?URL_PATH.$porfolio_rows['Urls']:URL_PATH."inner.php?title=".$porfolio_rows['Alias'];?>" class="more">Know More</a> </div>

            </div>

            <?php $i++;

					}?>

          </div>

        </div>

      </li>

      <li><a href="#">Technical Support<span>&nbsp;</span></a>

        <div class="dropdown">

          <div class="dropdownWrap">

            <?php

                  	$i=1;

					$support_sql = "SELECT * FROM content WHERE ParentId='33' ORDER BY OrderBy";

					$support_stmt = $conn->prepare($support_sql);

					$support_stmt->execute();

					while($support_rows = $support_stmt->fetch()){?>

            <div class="dropdownBox towCol <?php echo($i==2)?"last-child":"";?>">

              <h3><?php echo $support_rows['Title'];?></h3>

              <div class="txt"> <img data-src="uploads/<?php echo $support_rows['Image'];?>" /><p> <?php echo $kml->textLimit($support_rows['Details'],100);?></p>

              <a href="inner.php?title=<?php echo $support_rows['Alias'];?>" class="more">Know More</a> </div>

            </div>

            <?php 

					$i++;

					}?>

          </div>

        </div>

      </li>

       <li><a href="vaastu.php?page=नाली#v-nav" class="vaastu">vaastu</a></li>

        <li><a href="careers.php">careers</a></li>

      <li><a href="<?php echo URL_PATH;?>contact.php">Contact us</a></li>

    </ul>

  </div>

  </div>

  </div>

  <!--/end menu/-->

  <nav class="mobileMenu_wrap">

    <ul>

      <li class="current"><a href="javascript:vold(0);">Menu</a></li>

    </ul>
<ul id="showMenu">
        <li><a href="<?php echo URL_PATH;?>index.php">Home</a></li>

                   <li class="active__show"><a>About us</a>
                     <ul class="extra__show">
                    <li>
                      <a href="inner.php?title=<?php echo $about_rows['Alias'];?>">Company profile</a>
                    </li>
                    <li>
                      <a href="inner.php?title=<?php echo $about_rows['Alias'];?>">vision and mission</a>
                    </li>
                    <li>
                      <a href="inner.php?title=<?php echo $about_rows['Alias'];?>">Quality Assurance</a>
                    </li>
                    <li>
                      <a href="inner.php?title=<?php echo $about_rows['Alias'];?>">Quality Assurance</a>
                    </li>
                  </ul>
                   </li>

                  <li class="active__show1"><a href="">Our Plant</a>
                     <ul class="extra__show1">
                    <li>
                      <a href="plant.php?title=jagdamba-cement-industries-p-ltd">Jagdamba Cement Industries p.ltd</a>
                    </li>
                    <li>
                      <a href="plant.php?title=shubha-shree-jagdamba-cement-mills-p-ltd">Shubha Shree Jagdamba Cement Mills p.ltd</a>
                    </li>
                  </ul>
                  </li>

                  <li><a href="" class="active__show2">Our Products</a>
                    <ul class="extra__show2">
                      <li>
                        <a href="product.php?title=portland-pozzolana-cement-ppc">Portland Pozzolana Cement</a>
                      </li>
                      <li>
                        <a href="product.php?title=ordinary-portland-cement-opc">Ordinary Portland Cement</a>
                      </li>
                      <li>
                        <a href="plant.php?title=shubha-shree-jagdamba-cement-mills-p-ltd">Shubha Shree Jagdamba Cement Mills p.ltd</a>
                      </li>
                  </ul>
                  </li>

                  <li><a href="csr.php" >CSR</a></li>

                  <li class="active__show3"><a href="">Portfolio</a>
                   <ul class="extra__show3">
                      <li>
                        <a href="clients-testimonials.php">loents & Testimonials</a>
                      </li>
                      <li>
                        <a href="media.php">Media</a>
                      </li>
                      <li>
                        <a href="download.php">Downloads</a>
                      </li>
                  </ul>
                </li>
                 <li class="active__show4"><a href="">Technical Support</a>
                  <ul class="extra__show4">
                      <li>
                        <a href="nner.php?title=jagdamba-construction-practices">Jagdamba Construction Practices</a>
                      </li>
                      <li>
                        <a href="inner.php?title=standard-concrete-mix-designs">Standard Concrete Mix Designs</a>
                      </li>
                  </ul>
                 </li>
                  <li><a href="vaastu.php?page=नाली#v-nav" class="vaastu">vaastu</a></li>

                  <li><a href="careers.php">careers</a></li>

                  <li><a href="contact.php">Contact us</a></li>
    </ul>
    <!-- <ul id="showMenu">

      <?php

            $i=1;

			$footer_sql = "SELECT * FROM content WHERE ParentId='0' ORDER BY OrderBy";

			$footer_stmt = $conn->prepare($footer_sql);

			$footer_stmt->execute();

			while($footer_rows = $footer_stmt->fetch()){

				$link = ($footer_rows['Urls'] == "" || empty($footer_rows['Urls']))? "inner.php?title=".$footer_rows['Alias'] : $footer_rows['Urls'];

				echo "<li><a href=\"".$link."\">".$footer_rows['Title']."</a></li>";

				//echo ($i==$footer_stmt->rowCount())?"":"|";

			$i++;

			}

			?>

      <li><a href="#">Home</a></li>

                  <li><a href="#">About us</a></li>

                  <li><a href="#">Our Plant</a>
                    <ul>
                      <li>
                        <a href="#"></a>
                      </li>
                    </ul>
                  </li>

                  <li><a href="#">Our Products</a></li>

                  <li><a href="#">CSR</a></li>

                  <li><a href="#">Portfolio</a></li>

                  <li><a href="#">careers</a></li>

                  <li><a href="#">Contact us</a></li>

    </ul> -->

  </nav>

  <div class="col-md-1">

  <div class="socialNetwork"> 

    

    <!--<a href="#" class="googleplus">Google Plus</a>--> 

    <a href="https://www.facebook.com/jagdamba.cement" target="_blank" class="facebook">Facebook</a> 

    <!--<a href="#" class="twitter">Twitter</a>--> 

    

  </div>

  </div>

  <div class="clearfix"></div>

</div>