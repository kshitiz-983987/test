<?php include('header.php');?>
<?php include('nav.php');?>
       
<div class="content">
    <div class="content">
        <h1>Welcome to Alphafootware</h1>

        <h2>Footwear Collection</h2>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "footwear_db");
        $sql = mysqli_query($conn, "SELECT * FROM `footwear_categories`");

        while($category = mysqli_fetch_array($sql)){
            $category_id = $category['category_id'];
            $category_name = $category['category_name'];
        ?>

        <div class="clr"></div>
        <div class="categoryheading"><h3><?php echo $category_name; ?></h3></div>
        <div class="footwear-collection">

        <?php
        $sql = mysqli_query($conn, "SELECT * FROM `footwear_inventory` WHERE category_id = ".$category_id);

        while($footwear = mysqli_fetch_array($sql)){
            $footwear_id = $footwear['footwear_id'];
            $footwear_name = $footwear['footwear_name'];
            $footwear_price = $footwear['footwear_price'];
            $footwear_description = $footwear['footwear_description'];
            $footwear_image = $footwear['footwear_image'];
        ?>

        <div class="footwear-item">
            <div class="footwear-image">
                <img src="images/footwear/<?php echo $footwear_image; ?>" alt="<?php echo $footwear_name; ?>" />
            </div>
            <div class="footwear-details">
                <p><b><?php echo $footwear_name ?></b></p>
                <p>$<?php echo $footwear_price ?></p>
                <p><?php echo $footwear_description ?> </p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>

        <?php } ?>

        </div>

        <?php } ?>

    </div>
</div>

<?php include('footer.php');?>
