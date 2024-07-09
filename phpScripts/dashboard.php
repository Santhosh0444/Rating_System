<?php
include ("sessionLoad.php");
include ('ratesCalc.php');

if(isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$event = $_POST['event'];

	function loadData($sql, $email)
	{
		$datas = '';
		$qry = mysqli_query($sql, "SELECT * FROM products WHERE publisher_email = '{$email}'");
		if (mysqli_num_rows($qry) > 0) {
			while ($row = mysqli_fetch_array($qry)) {

				$product = $row["product_link"];

				$avg = totStar($sql, $product);

				$totStar = round((float) $avg, 1);
				$half = $totStar - floor($totStar);

				$starElement = '';
				if ($avg > 0) {
					for ($i = 1; $i <= 5; $i++) {
						if ($i <= $totStar) {
							$starElement .= "<span class='full'></span>";
						} else if ((0.0 < $half) && (1.0 > $half)) {
							$starElement .= "<span class='half'></span>";
							$half = 0;
						} else {
							$starElement .= "<span></span>";
						}
					}
				} else {
					$starElement = "<span></span><span></span><span></span><span></span><span></span>";
				}

				$ProName = strlen($row['product_name']) < 40 ? $row['product_name'] : substr($row['product_name'], 0, 40) . '...';

				$detail = strlen($row['product_detail']) < 70 ? $row['product_detail'] : substr($row['product_detail'], 0, 70) . '...';

				$datas .= "
				<div class='postItem'>
					<div class='itemContent'>
						<div class='imgContent'>
							<a href='product.php?item={$product}'><img src='Asserts/Product_Images/{$row['product_image']}'></a>
						</div>
						<div class='textContent'>
							<a href='product.php?item={$product}'><h4>{$ProName}</h4></a>
							<a href='product.php?item={$product}'><p>{$detail}</p></a>
							<div class='more'>
								<a href='product.php?item={$product}' class='ratings' rate='{$avg}'>{$starElement}</a>
								<div class='moreActions'>
								<div class='view flexBox'>{$row['views']}</div>
								<button onclick ='delProduct(&quot;del&quot;,&quot;{$product}&quot;)' class='flexBox mask-style del'></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				";
			}
		} else {
			$datas = "<span style='display: block; text-align: center; font-size: 18px; width: 100%'>YOUR PRODUCTS NOT FOUND....</span>
			<div style='display: block; text-align: center; width: 100%'><a style='background: var(--bgColor); padding: 10px 15px; color: #fff; border-radius: 20px' href='newProduct.php'>Upload Product</a></div>";
		}

		return $datas;
	}

	if($event == 'del') {
		$product = $_POST['product'];
		$del = mysqli_query($sql, "DELETE FROM products WHERE product_link = '{$product}' AND publisher_email = '{$email}'");
		if($del) {
			echo loadData($sql, $email);
		}
		else {
			echo 'error';
		}
	}
	else {
		echo loadData($sql, $email);
	}
}

else {
	echo "nouser";
}

?>