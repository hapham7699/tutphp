<?php 
 	include ("../autoload.php");
?>
<?php 
    require_once ("../header.php") ;
?>
<?php 
	//$conn = new mysqli("localhost","root","","tutphp");
	$conn = mysqli_connect("localhost","root","","tutphp");
 	mysqli_set_charset($conn,"utf8");
 ?>

<?php 
	$name = $password =$address = $email = $phone = '';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $data =
        [ 
            "name" => postInput('name'),
            "email" => postInput("email"),
            "phone" => postInput("phone"),
            "address" => postInput("address"),
            "password" => postInput("password")
        ];
        $error = [];
	    if(postInput('name') == '')
	    {
	        $error['name'] = "Tên không được để trống";
	    }
	    if(postInput('email') == '')
	    {
	        $error['email'] = "Email không được để trống";
	    }
	    if(postInput('phone') == '')
	    {
	        $error['phone'] = "Số điện thoại không được để trống";
	    }
	    if(postInput('address') == '')
	    {
	        $error['address'] = "Địa chỉ không được để trống";
	    }
	    if(postInput('password') == '')
	    {
	        $error['password'] = "Mật khẩu không được để trống";
	    }
    
	        $sql = "INSERT INTO users(name,email,password,phone,address)
	        VALUES ('".$name."','".$email."','".$password."','".$phone."','".$address."')";
	        $insert = mysqli_query($conn,$sql) or die;
	        echo $sql;
	    if(!empty($error))
	    {
	        $sql = "INSERT INTO users(name,email,password,phone,address)
	        VALUES ('".$name."','".$email."','".$password."','".$phone."','".$address."')";
	        $insert = mysqli_query($conn,$sql) or die;
	        echo $sql;
	    } 
    }    
?>
<div class="row">
	<h3 class="title-main"><a href="">Đăng ký tài khoản</a> </h3>
    <div class="col-md-12">
        <form class="form-horizontal" action="dangki.php" method="POST" enctype= "multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2">Họ và tên:</label>
                <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name?>">
                    <?php 
                    	if(isset($error['name'])):
                    ?>
                    <p class="text-danger"><?php echo $error['name']; ?></p>
                    <?php 
                    endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Email:</label>
                <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" id="email" placeholder="a@abc.com" value="<?php echo $email ?>">
                    <?php 
                    	if(isset($error['email'])):
                    ?>
                    <p class="text-danger"><?php echo $error['email']; ?></p>
                    <?php 
                    endif; ?>
                  
                </div>
            </div>
			
			<div class="form-group">
                <label class="control-label col-sm-2">Mật khẩu:</label>
                <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" id="password" placeholder="**********" value="<?php echo $password ?>">
                    <?php 
                    	if(isset($error['password'])):
                    ?>
                    <p class="text-danger"><?php echo $error['password']; ?></p>
                    <?php 
                    endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Số điện thoại:</label>
                <div class="col-sm-8">
                    <input type="number" name="phone" class="form-control" id="phone" placeholder="0888888888" value="<?php echo $phone ?>">
                    <?php 
                    	if(isset($error['phone'])):
                    ?>
                    <p class="text-danger"><?php echo $error['phone']; ?></p>
                    <?php 
                    endif; ?>
                </div>
            </div>
				
			<div class="form-group">
                <label class="control-label col-sm-2">Địa chỉ:</label>
                <div class="col-sm-8">
                    <input type="text" name="address" class="form-control" id="address" placeholder="123 Điện Biên Hồ Chí Minh" value="<?php echo $address ?>">
                    <?php 
                    	if(isset($error['address'])):
                    ?>
                    <p class="text-danger"><?php echo $error['address']; ?></p>
                    <?php 
                    endif; ?>
                </div>
			</div>
            <button type="submit" class="btn btn-success">Đăng ký</button>
        </form>
    </div>
</div>
          
<?php 
    require_once ("../footer.php") ;
?>