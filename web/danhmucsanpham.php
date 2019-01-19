<?php 
 	include ("../autoload.php");
 	$id = intval(getinput('id'));
 	$editCategory = $db->fetchID("category",$id);


 	if(isset($_GET['p']))
 	{
 		$p = $_GET['p'];
 	}
 	else 
 	{
 		$p = 1;	
 	}
 	$sql = "SELECT * FROM product WHERE category_id = $id";
 	$product = $db->fetchJones("product",$sql,1,$p,9,true);
 	unset($product['page']);


 	$sqlhomeCate = "SELECT name,id FROM category WHERE home = 1 ORDER BY updated_at ";
    $categoryHome = $db->fetchsql($sqlhomeCate);
   
    $data = [];
    foreach ($categoryHome as $item) 
    {
        $cateID = intval($item['id']);
        $sql = "SELECT * FROM product WHERE category_id = $cateID";
        $productHome = $db->fetchsql($sql);
        $data[$item['name']] = $productHome; 
    }
?>
<?php 
    require_once ("header.php") ;
?>
<div class="container">
<div class="col-md-9 bor">
	<selection class= "box-main1">
		<h3 class="title-main"><a href=""><?php echo $editCategory["name"]; ?></a> </h3>
		<div class="row"> 
   		     <?php 
        		foreach ($data as $key => $value): 
    		?>
    		<div class="row">
        		<h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
	            <div class="showitem" style="margin-top: 10px; margin-bottom: 10px;">
	                <?php 
	                    foreach ($value as $item):
	                ?>
	                <div class="col-md-3 item-product bor">
	                    <a href="single.php?id=<?php echo $item['id'] ?>">
	                       <img src="<?php echo uploads()?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
	                    </a>
	                    <div class="info-item">
	                       <a href="single.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a>
	                       <p><strike class="sale"><?php echo formatPrice($item['price']); ?></strike><b class="price">  <?php echo formatPriceSale($item['price'],$item['sale']); ?></b></p>
	                       <span class="on-get">Thêm vào giỏ hàng</span>
	                    </div>
	                    <div class="hidenitem">
	                       <!-- <p><a href=""><i class="fa fa-search"></i></a></p> -->
	                       <p><a href=""><i class="fa fa-heart"></i></a></p>
	                       <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
	                    </div>
	                </div>
	                <?php 
	                    endforeach;
	                ?>
	            </div>
		    </div>
		    <?php 
		        endforeach;
		    ?>
		</div>
	</selection>
</div>
</div>

<?php 
    require_once ("footer.php") ;
?>