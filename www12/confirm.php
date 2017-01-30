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
		$shpCrt["total"]		=	0				;
		$shpCrt["new_goods"]	=	0				;
		$shpCrt["postage"]	=	0				;
		
/*
	if(	isset(
				$_GET["code"]
	)){
		$shpCrt["new_goods"]	=	1				;
		
		$shpCrt["code"]		=	$_GET["code"]		;
		$shpCrt["name"]		=	$_GET["name"]		;
		$shpCrt["price"]		=	$_GET["price"]		;
		$shpCrt["quantity"]	=	$_GET["quantity"]		;
	}	// if(isset)
*/
?>
<?php
	session_start()	;
?>
<?php
/*
	!isset(
			$_SESSION["shpCrt"]
	)
	?	
		$_SESSION["shpCrt"]	=	array()
	:
		false
	;
*/
/*
	if(	isset(
				$_GET["code"]
	)){
		foreach(
				$_SESSION["shpCrt"] as $k => &$v
		){
			if(
				$v["code"]	==	$shpCrt["code"]
			){
				$v["quantity"]	=	$v["quantity"] + $shpCrt["quantity"]	;
				$shpCrt["new_goods"]	=	0		;
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
		}
	
		header("Location: shoppingCart.php")	;
		exit	;
	}	// if(isset)
*/
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
		
		header("Location: shoppingCart.php")	;
		exit	;
	}
/*
*/
?>
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
		<script>
		//<!--
			var	data	=	<?php	echo
								toJS($_SESSION["shpCrt"])
						;	?>	;
		//-->
		</script>
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
						ご注文内容の確認
				</h2>
				<div
						id	=	"shpCrt"
				>
			<?php
				if(isset(
						$_SESSION["shpCrt"]
				))
				{
					$r	=	count(
									$_SESSION["shpCrt"]
							)	;
					if($r	==	0)
					{
						echo	("
								<p>
									ショッピングカートにはなにもはいっていません。
								</p>
						")	;
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
								</tr>
				<?php
					foreach(
							$_SESSION["shpCrt"] as $k_data => $v_data
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
										<?php	echo
										number_format(
													$v_data["price"] * $v_data["quantity"]
										)	;
										;	?>
											円
									</td>
								</tr>
				<?php
						if(isset(
								$k_data
						))
						{
							$shpCrt["subtotal"][$k_data]	=	$v_data["price"] * $v_data["quantity"]			;
							$shpCrt["total"]			=	$shpCrt["total"] + $shpCrt["subtotal"][$k_data]		;
					/*
					*/
						}
					}	// foreach
				?>
				<?php
					if(
							$shpCrt["total"]	<	3000
					){
							$shpCrt["postage"]	=	500		;
					}
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
															$shpCrt["total"]
												)	;
										;	?>
											円
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
															$shpCrt["postage"]
												)	;
										;	?>
											円
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
															$shpCrt["total"] + $shpCrt["postage"]
												)	;
										;	?>
											円
									</td>
								</tr>
						</table>
					</div>
			<?php
					}	// else($r==0)
				}	// else(isset)
			?>
				<a
					href	=	"shoppingCart.php"
				>
						変更する
				</a>
			</div>	<!-- #shpCrt -->
			
			<div
					id	=	"register"
			>
				<table>
					<tr>
						<th>
								お名前
						</th>
						<td>
								<?php	echo
											$_SESSION["sei"]
								;	?>
						</td>
					</tr>
					<tr>
						<th>
								郵便番号
						</th>
						<td>
						</td>
					</tr>
					<tr>
						<th>
								住所
						</th>
						<td>
						</td>
					</tr>
					<tr>
						<th>
								メールアドレス
						</th>
						<td>
						</td>
					</tr>
					<tr>
						<th>
								支払方法
						</th>
						<td>
							<label>
								代金引換
							</label>
							<label>
								銀行振込
							</label>
						</td>
					</tr>
				</table>
				<a
					href	=	"register.php"
				>
						変更する
				</a>
			</div>	<!-- #register -->
			
			<div>
				<div>
					<a
						href		=	"ordered.php
									?	ordered=	0
									"
					>
						<img
							src	=	"img/btn/cancel.png"
							alt	=	"キャンセル"
						>
					</a>
					<a
						href		=	"ordered.php
									?	ordered=	1
									"
					>
						<img
							src	=	"img/btn/kakutei.png"
							alt	=	"注文を確定する"
						>
					</a>
				</div>
			</div>
				
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
	<!--
		<shoppingCart>	</shoppingCart>
	-->
		<script>
		//<!--
				riot.mount("*")	;
		//-->
		</script>
	</body>
</html>

