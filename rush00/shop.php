<!DOCTYPE HTML>
<?php
require "header.php";
require "includes/dbh.inc.php";

session_start();
$product_ids = array();
//check if Add to cart has been pressed
if (filter_input(INPUT_POST, 'add_to_cart')) {
	if (isset($_SESSION['shopping_cart']))
	{

	}
	else // if shopping cart not exist create product
	{
		$_SESSION['shopping_cart'][0] = array
		(
			'id' => filter_inpput(INPUT_GET, 'id'),
			'name' => filter_input(INPUT_POST, 'name'),
			'price' => filter_input(INPUT_POST, 'price'),
			'quantity' => filter_input(INPUT_POST, 'quantity')
		);
	}
}
print_r($_SESSION);
// Create filter 

$sql = 'SELECT * FROM products ORDER BY id ASC';

$result = mysqli_query($conn, $sql);
?>
	<main>
		<div class="wrapper-main">
			<section class="section-default">
<?php
	if ($result):
		if (mysqli_num_rows($result) > 0):
			while ($product = mysqli_fetch_assoc($result)):
			?>
				<div class="item-container" >
					<form method="POST" action="index.php?action=add&id=<?php echo $product['id']; ?>">
						<div class="products">
						<img src= "<?php echo $product['image']; ?>" class="img-responsive" />
						<h4 class= "text-info"><?php echo $product['name'] ?></h4>
						<h4>R <?php echo $product['price']; ?></h4>
						<input type="text" name="quantity" class="form-control" value="1" />
						<input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
						<input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
						<input type="submit-cart" name="add_to_cart" class="btn_add_to_cart" value="Add to cart" />
					</form>
				</div>
			<?php
		endwhile;
	endif;
endif;
?>
			</section>
		</div>
	</main>
	
<?php 
	require "footer.php";
?>