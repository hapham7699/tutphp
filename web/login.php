<?php 
	include("header.php");
	include ("../autoload.php");
	$open = "category";

	$category = $db->fetchAll('category');

	

	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    	$data =
		[
			"email" => postInput("email"),
			"password" => MD5(postInput("password"))
		];
		$error = [];

    	if(postInput('email') == '')
        {
            $error['email'] = "Mời bạn nhập email";
        }
        if(postInput('password') == '')
        {
            $error['password'] = "Mời bạn nhập mật khẩu";
        }

        if(empty($error))
        {
        	$is_check =$db->fetchOne("users", " email = '".$data['email']."' AND password = '".md5($data['password'])."' ");
        	if($is_check != NULL)
        	{
        		$_SESSION['name_user'] = $is_check['name'];
        		$_SESSION['name_id'] = $is_check['id'];
        		echo "<script>
        				alert('Đăng nhập thành công');
						location.href='index.php';
        			</script>";	
        	}
        	else
        	{
        		$_SESSION['error'] =" Đăng nhập thất bại";
        	}
        }
    }
?>

<div class="container">
   <div class="account_grid">
		<div class=" login-right">
			<?php 
				if(isset($_SESSION['success'])):
			?>
			<div class="alert alert-success" role="alert">
  				<?php echo $_SESSION['success'];
  				unset($_SESSION['success']);
  			?>
			</div>
			<?php 
				endif;
			?>
			<h3>Đăng ký tài khoản khách hàng</h3>
			<p>Nếu bạn đã có tài khoản. Vui lòng đăng nhập.</p>
			<form action="login.php">
			  	<div>
					<span>Email: <label style="color: red">*</label>
						<?php 
                    		if(isset($error['email'])):
                    	?>
                    	<p class="text-danger"><?php echo $error['email']; ?></p>
	                    <?php 
	                    	endif;
	                    ?>
					</span>
					<input type="text"> 
					
			  	</div>
			 	<div>
					<span>Mật khẩu<label style="color: red">*</label>
						<?php 
                    	if(isset($error['password'])):
	                    ?>
	                    <p class="text-danger"><?php echo $error['password']; ?></p>
	                    <?php 
	                    endif; ?>
					</span>
					<input type="text"> 
					
			  	</div>
			  	<a class="forgot" href="#">Quên mật khẩu?</a>
			  	<a type="submit" class="btn btn-success" href="login.php">Đăng nhập</a>
	    	</form>
	   	</div>	
    	<div class=" login-left">
		  	<h3>Nếu bạn chưa có tài khoản</h3>
			<p>Tạo một tài khoản để có thể mua sắm dễ dàng và chúng tôi biết địa chỉ của bạn thuận lợi cho việc vận chuyển</p>
			<a class="btn btn-success" href="register.php">Tạo tài khoản</a>
   		</div>
   		<div class="clearfix"></div>
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
				<div class=" chain-grid menu-chain">
   		     		 <a class="view-all all-product" href="product.php">Xem tất cả sản phẩm<span> </span></a>
   		     	</div>
   		     	 	
		</div>
  	<div class="clearfix"></div>
</div>
<?php 
	include("footer.php")
?>