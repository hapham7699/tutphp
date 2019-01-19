<?php 
	include("header.php");
	include("../autoload.php");
	$category = $db->fetchAll('category');
?>
<div class="container"> 
	<div class=" single_top">
	    <div class="single_grid">
			<div class="grid images_3_of_2">
		
			</div> 
			<div class="desc1 span_3_of_2">
				<h4>Một ít thông tin</h4>
				<div class="cart-b">
					<div class="left-n ">Giá sản phẩm
					</div>
				    <a class="now-get get-cart-in" href="#">Thêm vô giỏ hàng</a> 
				    <div class="clearfix">
				    	
				    </div>
				</div>

				<h6>Còn một số sản phẩm liên quan</h6>
			   	<p>Mô tả sản phẩm</p>
			   	<div class="share">
					<h5>Chia sẻ sản phẩm :</h5>
					<ul class="share_nav">
						<li><a href="#"><img  title="facebook"></a></li>
						<li><a href="#"><img  title="Twiiter"></a></li>
						<li><a href="#"><img  title="Google+"></a></li>
		    		</ul>
				</div>
			   
				
			</div>
          	<div class="clearfix"></div>
        </div>

		<script type="text/javascript" src="js/jquery.flexisel.js"></script>

	    <div class="toogle">
	     	<h3 class="m_3">CHI TIẾT SẢN PHÂM</h3>
	     	<p class="m_text"><?php echo "Chi tiết sản phẩm"; ?></p>
	    </div>	
    </div>
          	   
	<div class="sub-cate">

			<div class=" top-nav rsidebar span_1_of_left">
				<h3 class="cate">CATEGORIES</h3>
			 	<ul class="menu">
					<ul class="kid-menu ">
						<li class="menu-kid-left">
						<?php 
                            foreach ($category as $item):?>
                            <a value="<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a>
                        <?php 
                            endforeach; 
                        ?> 
						</li>
						<li class="menu-kid-left">
							<a href="contact.php">Liên hệ với chúng tôi</a>
						</li>
					</ul>
				</ul>
			</div>
				
   		     	 <a class="view-all all-product" href="product.php">Xem tất cả sản phẩm<span> </span></a> 	
		</div>
  	<div class="clearfix"></div>
</div>
<?php 
	include("footer.php")
?>