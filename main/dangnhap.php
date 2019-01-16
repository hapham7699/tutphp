<?php 
 	include ("../autoload.php");
?>
<?php 
    require_once ("../header.php") ;
?>
<div class="col-md-9 bor">
	<selection class= "box-main1">
		<h3 class="title-main"><a href="">Đăng nhập tài khoản</a> </h3>
		<form action="dangnhap.php" method="POST" role="form" style="margin-top: 20px">
			<div class="row">
                <label class="control-label col-sm-2">Email:</label>
                <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" id="email" placeholder="a@abc.com" value="">
                </div>
            </div>

            <div class="row">
                <label class="control-label col-sm-2">Mật khẩu:</label>
                <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" id="password" placeholder="**********" value="">
                </div>
            </div>

        	<button type="submit" class="btn btn-success">Đăng nhập</button>
            </div>
		</form>
	</selection>
</div>

<?php 
    require_once ("../footer.php") ;
?>