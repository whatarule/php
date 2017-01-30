<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>
				●●●●●● | ケーキ店
		</title>
		<script	src	=	"https://cdn.rawgit.com/riot/riot/master/riot+compiler.min.js"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/_test.tag"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/navGlb.tag"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/shoppingCart.tag"
		></script>
	<!--
		<script	type	=	"riot/tag"
				src	=	"tag/.tag"
		></script>
	-->
		
		<link		rel		=	"stylesheet"
				href		=	"css/reset.css"
		></link>
		<link		rel		=	"stylesheet"
				href		=	"css/common.css"
		></link>
		<link		rel		=	"stylesheet"
				href		=	"css/shoppingCart.css"
		></link>
<?php
		$shpCrt["subtotal_G"]	=	0				;
		$shpCrt["new_goods"]	=	0				;
		$shpCrt["postage"]	=	0				;
		
	if(	isset(
				$_GET["code"]
	)){
		$shpCrt["new_goods"]	=	1				;
		
		$shpCrt["code"]		=	$_GET["code"]		;
		$shpCrt["name"]		=	$_GET["name"]		;
		$shpCrt["price"]		=	$_GET["price"]		;
		$shpCrt["quantity"]	=	$_GET["quantity"]		;
	}	// if(isset)
?>
<?php
	session_start()	;
/*
	if(!isset(
			$_SESSION["shpCrt"]
	)){
		$_SESSION["shpCrt"]	=	array()	;
	}
*/
	!isset(
			$_SESSION["shpCrt"]
	)
	?	
		$_SESSION["shpCrt"]	=	array()
	:
		false
	;
/*
	echo
		true
		?
			false
			?
				"t"
			:
				"f"
		:
			"f"
		;
	;
*/
	if(	isset(
				$_GET["code"]
	)){
		foreach(
				$_SESSION["shpCrt"] as $k => &$v
		){
			if(
				$v["code"]	==	$shpCrt["code"]
			){
		/*
			echo
					$v["code"]	. "<br>"
				.	$v["quantity"]	. "<br>"
			;
		*/
				$v["quantity"]	=	$v["quantity"] + $shpCrt["quantity"]	;
				$shpCrt["new_goods"]	=	0		;
		/*
			echo
					$v["quantity"]	. "<br>"
				.	$shpCrt["new_goods"]	. "<br>"
			;
		*/
			}
		}
		if(
				$shpCrt["new_goods"]	==	1
		){
			$i	=	count($_SESSION["shpCrt"])	;
			
			$_SESSION["shpCrt"][$i]["code"]	=	$shpCrt["code"]		;
			$_SESSION["shpCrt"][$i]["name"]	=	$shpCrt["name"]		;
			$_SESSION["shpCrt"][$i]["price"]	=	$shpCrt["price"]		;
			$_SESSION["shpCrt"][$i]["quantity"]	=	$shpCrt["quantity"]	;
		/*
			$_SESSION["shpCrt"][$i][""]	=	$shpCrt[""][0]	;
		*/
		}
	
		header("Location: shoppingCart.php")	;
		exit	;
	/*
	*/
	}	// if(isset)
?>
<?php
/*
	$_SESSION	=	array()	;
	session_destroy()		;
*/
?>
<?php
	if(	isset(
			$_GET["i_delete"]
	))
	{
		$i_delete	=	$_GET["i_delete"]		;
		unset(
				$_SESSION["shpCrt"][$i_delete]
		)	;
		$_SESSION["shpCrt"]	=	array_values(
										$_SESSION["shpCrt"]
							)	;
		
	/*
		header("Location: shoppingCart.php")	;
		exit	;
	*/
	}
?>
	</head>
	<body>
	<div
		id	=	"container"
	>
		<header>
			<div
				class		=	"inner"
			>
				<h1>
					<a
						href	=	"index.php"
					>
						●●●●●
					</a>
				</h1>
				<p>
						大切な人を笑顔にするおいしいケーキ
				</p>
				<div
					class		=	"right"
				>
					<a
						href	=	"cart.php"
					>
						<img
							src		=	"img/btn/cartmiru.png"
							alt		=	"カートの中を見る"
							width		=	"205"
						>
						<!--
							height	=	"38"
						-->
					</a>
				</div>
			</div>	<!-- .inner -->
		</header>
		<div
				id	=	"content"
		>
			<div
				id	=	"cart"
			>
				<h2>
						ショッピングカート
				</h2>
				<div>
			<?php
				if(isset(
						$_SESSION["shpCrt"]
				))
				{
					$r	=	count(
									$_SESSION["shpCrt"]
							)	;
					$hidden_register	=	""	;
					
					if($r	==	0)
					{
						echo	("
								<p>
									ショッピングカートにはなにもはいっていません。
								</p>
						")	;
						$hidden_register	=	"hidden"	;
					}
					else{
			?>
					<div>
						<table>
								<tr>
									<th>
											商品コード
									</th>
									<th>
											商品名
									</th>
									<th>
											販売価格
									</th>
									<th>
											個数
									</th>
									<th>
											金額
									</th>
									<th>
											削除
									</th>
								</tr>
				<?php
					foreach(
							$_SESSION["shpCrt"] as $k_data => &$v_data
					){
				?>
								<tr>
									<td
										class		=	"td_code"
									>
										<?php	echo
													$v_data["code"]
										;	?>
									</td>
									<td
										class		=	"td_name"
									>
										<?php	echo
													$v_data["name"]
										;	?>
									</td>
									<td
										class		=	"td_price"
									>
										<?php	echo
										number_format(
													$v_data["price"]
										)	;
										;	?>
										円(税込)
									</td>
									<td
										class		=	"td_quantity"
									>
										<?php	echo
													$v_data["quantity"]
										;	?>
											個
									</td>
									<td
										class		=	"td_subtotal"
									>
										<?php
											$v_data["subtotal_g"]	=	$v_data["price"] * $v_data["quantity"]
										?>
										<?php	echo
										number_format(
													$v_data["subtotal_g"]
										)	;
										;	?>
											円
									</td>
									<td
										class		=	"td_delete"
									>
										<a
											href	=	"shoppingCart.php
													?	i_delete=	<?php	echo
																		$k_data
																;	?>
													"
										>
											削除
										</a>
									<!--
										<?php	echo
												$k_data
										;	?>
									-->
									</td>
								<!--
										<?php	echo
												$v_data[""]
										;	?>
								-->
								</tr>
				<?php
						if(isset(
								$k_data
						))
						{
					/*
							$shpCrt[$k_data]["subtotal_g"]	=	$v_data["price"] * $v_data["quantity"]			;
					*/
							$shpCrt["subtotal_G"]			=	$shpCrt["subtotal_G"] + $v_data["subtotal_g"]		;
						}
					}	// foreach
				?>
				<?php
					if(
							$shpCrt["subtotal_G"]	<	3000
					){
							$shpCrt["postage"]	=	500		;
					}
				?>
				<?php
						$_SESSION["n_item"]	=	count(
													$_SESSION["shpCrt"]
											)	;
						$_SESSION["subtotal"]	=	$shpCrt["subtotal_G"]			;
						$_SESSION["postage"]	=	$shpCrt["postage"]		;
						$_SESSION["total"]	=	$shpCrt["subtotal_G"] + $shpCrt["postage"]	;
				?>
								<tr>
									<td
										colspan	=	4
									>
											小計
									</td>
									<td>
										<?php	echo
												number_format(
															$_SESSION["subtotal"]
												)	;
										;	?>
											円
									</td>
									<td>
									</td>
								</tr>
								<tr>
									<td
										colspan	=	4
									>
											送料
									</td>
									<td>
										<?php	echo
												number_format(
															$_SESSION["postage"]
												)	;
										;	?>
											円
									</td>
									<td>
									</td>
								</tr>
								<tr>
									<td
										colspan	=	4
									>
											総計
									</td>
									<td>
										<?php	echo
												number_format(
															$_SESSION["total"]
												)	;
										;	?>
											円
									</td>
									<td>
									</td>
								</tr>
						</table>
					</div>
			<?php
					}	// else($r==0)
				}	// else(isset)
			?>
					<div>
						<a
							href		=	"goods_list.php"
						>
							<img
								src	=	"img/btn/shopping.png"
								alt	=	"買い物を続ける"
							>
						</a>
						<a
							href		=	"register.html"
							<?php	echo
										$hidden_register
							;	?>
						>
							<img
								src	=	"img/btn/regi.png"
								alt	=	"レジに進む"
							>
						</a>
					</div>
				</div>
				
			</div>	<!-- #cart -->
		</div>	<!-- #content -->
		
		<footer>
			<div
				id	=	"copyRight"
			>
				<p>
					<small>
						Copyright (C) 2016 ●●●●●
					</small>
				</p>
			</div>
		</footer>
	</div>
		
		<shoppingCart>	</shoppingCart>
	<!--
	-->
		<script>
		//<!--
			var	data		=	<?php	echo
									toJS($_SESSION)
							;	?>	;
		/*
			var	v_test	=	"v_test"	;
		*/	
		//-->
		</script>
		<script>
		//<!--
				riot.mount("*")	;
		//-->
		</script>
	</body>
</html>
<?php
		function	toJS($data){
			return	json_encode(
								$data		,
								JSON_HEX_TAG	|
								JSON_HEX_AMP	|
								JSON_HEX_APOS	|
								JSON_HEX_QUOT
					)	;
		}
?>

