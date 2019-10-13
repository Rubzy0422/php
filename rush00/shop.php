<?php 
	require "header.php";
	require "./includes/dbh.inc.php";

	session_start();
	$product_ids = array();
	//if button pressed
	if (filter_input(INPUT_POST, 'add_to_cart')) {
		if (isser($_SESSION['shopping_cart'])) {
			// 35:24 shopping Cart
		}
		else // create product if no shopping cart exists
		{
			$_SESSION['shopping_cart'][0] = array
			(
				'id' => filter_input(INPUT_GET, 'id'),
				'name' => filter_input(INPUT_POST, 'name'),
				'price' => filter_input(INPUT_POST, 'price'),
				'quantity' => filter_input(INPUT_POST, 'quantity')
			);
		}
	}
	$sql = 'SELECT * FROM products ORDER BY id ASC';
	
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: shop.php?error=sqlerror");
		exit();
	}

	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
		if (mysqli_num_rows($result) > 0) {
			while ($product = mysqli_fetch_assoc($result)) {
	?>

	<main>
		<div class="wrapper-main">
			<section class="section-default">
		
				<div>
				<!-- where redirect to ?? -->
				<form method="POST" action="index.php?action=add&id=<?php echo $product[`id`]; ?>">
						<div class="products">
							<img src="<?php echo $product['image'];?>" class="img-responsive" />
							<h4 class="text-info"><?php echo $product['name'] ?><h4>
							<h4>R <?php echo $product['price']; ?></h4>
							<input type="text" name="quantity" value="1" />
							<input type="hidden" name="name" value= <?php echo $product['name']; ?> />
							<input type="hidden" name="price" value= <?php echo $product['price']; ?> />
							<input type="submit" name="add_to_cart" class="btn-info" value="add to cart" />
						</div>
				</form>
				</div>

	<?php
			}
		}
	?>
			</section>
		</div>
	</main>

<?php
	require "footer.php";
?>