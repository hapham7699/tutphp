<?php 
    $open = "category";
    include ("../autoload.php");
    error_reporting(1);
    $sqlhomeCate = "SELECT * FROM category WHERE home = 1 ORDER BY updated_at ";
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
    require_once ("../header2.php") ;
?>

<html>
<head>
    <style>
    .price
    {
        color: #ea3a3c;
    }
    </style>
</head>
<body>
    <div class="container">
        <div id="slide" class="text-center">
            <img width="1000px" height="400px;" src="<?php echo base_url()?>public/uploads/slide/banner.jpg">
        </div>
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
                    <a href="chitietsanpham.php?id=<?php echo $item['id'] ?>">
                       <img src="<?php echo uploads()?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                    </a>
                    <div class="info-item">
                       <a href="chitietsanpham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a>
                       <p><strike class="sale"><?php echo formatPrice($item['price']); ?></strike><b class="price">  <?php echo formatPriceSale($item['price'],$item['sale']); ?></b></p>
                    </div>
                    <div class="hidenitem">
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
</body>

</html>          
<?php 
    require_once ("../footer.php") ;
?>

