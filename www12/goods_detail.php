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
				href		=	"css/goods_detail.css"
		></link>
		<style>
		<!--
			@charset	"utf-8"	;
			#container		{
			}
		-->
		</style>
	</head>
<?php
	$mysql["sv"]	=	"localhost"	;
	$mysql["us"]	=	"root"	;
	$mysql["pw"]	=	""	;
	
	$mysql["db"][0]	=	""	;
	$mysql["db"][1]	=	"shop"	;
	
	$mysql["tb"][0]	=	""	;
	$mysql["tb"][1]	=	"goods"	;
	
	$mysql["pk"][0]	=	""	;
	$mysql["pk"][1]	=	"code"	;
	
	$mysql["fd"][0]	=	""	;
	$mysql["fd"][1]	=	"category"	;
	
	$mysql["fd_where"][0]	=	""	;
	$mysql["fd_where"][1]	=	$mysql["fd"][1]	;
	
	$mysql["fd_order"][0]	=	$mysql["pk"][1]	;
	$mysql["fd_order"][1]	=	"price"	;
	
	$mysql["qr"][0]	=	""	;
	$mysql["qr"][1]	=
					"select * from ".	$mysql["tb"][1]
					;
	
	$mysql["qr"]["where"][1]	=	""	;
	$mysql["qr"]["order"][1]	=	""	;
		
	if(
		isset($_GET[
					"v_where"
		])
	){
		$mysql["fd_where"][1]	=	$_GET[
									"fd_where"
						]	;
		$mysql["v_where"][1]	=	$_GET[
									"v_where"
						]	;
		$mysql["qr"]["where"][1]	=
			"where ".	$mysql["fd_where"][1]	." = ".	$mysql["v_where"][1]
			;
	}
	if(
		isset($_GET[
					"v_order"
		])
	){
		$mysql["fd_where"][1]	=	$_GET[
									"fd_order"
						]	;
		$mysql["v_order"][1]	=	$_GET[
									"v_order"
							]	;
		$mysql["qr"]["order"][1]	=
			"order by ".	$mysql["fd_order"][1]	." ".	$mysql["v_order"][1]
			;
	}
	
	$mysql["qr"][1]	=	$mysql["qr"][1]
			." ".		$mysql["qr"]["where"][1]
			." ".		$mysql["qr"]["order"][1]
			.		";"
					;
	echo	(
			$mysql["qr"][1]	."<br>"
	)	;
					
/*
	$mysql[""]	=	""	;
*/
	
	$mysql["id_link"]		=	mysqli_connect(
							$mysql["sv"]		,
							$mysql["us"]		,
							$mysql["pw"]
						)
	or exit(
			"error_connect"
	)	;
	mysqli_select_db(
					$mysql["id_link"]		,
					$mysql["db"][1]
	)
	or exit(
			"error_selectDB"
	)	;
	$mysql["result"]		=	mysqli_query(
							$mysql["id_link"]		,
							$mysql["qr"][1]		
						)
	or exit(
			"error_query"
	)	;
?>
<?php
	$mysql["nm_result"]	=	mysqli_num_rows(
							$mysql["result"]
						)	;
	echo(
			$mysql["nm_result"]
	)	;
	
	$data		=	array()	;
	while(
		$data_while		=	mysqli_fetch_array(
							$mysql["result"]		,
							MYSQLI_ASSOC
						)
	){
		$data[]	=	$data_while		;
	}
?>
<?php
	mysqli_free_result(
					$mysql["result"]
	)	;
	mysqli_close(
					$mysql["id_link"]
	)	;
?>
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
		<navGlb>	</navGlb>
		<div
				id	=	"content"
		>
			<div
				id	=	"detail"
			>
				<h2>
						商品詳細
				</h2>
		<?php
			foreach(
					$data as $k_data => $v_data
			){
		?>
				<div>
					<img
						src	=	"img/item/
									<?php	echo
											$v_data["file_img"]
									;	?>
								"
						alt	=
									<?php	echo
											$v_data["name"]
									;	?>
					>
					<div>
						<table>
							<tr>
								<th>
										商品コード
								</th>
								<td>
									<?php	echo
											$v_data["code"]
									;	?>
								</td>
							</tr>
							<tr>
								<th>
										商品名
								</th>
								<td>
									<?php	echo
											$v_data["name"]
									;	?>
								</td>
							</tr>
							<tr>
								<th>
										販売価格
								</th>
								<td>
									<?php	echo
											$v_data["price"]
									;	?>
									円(税込)
								</td>
							</tr>
						</table>
						<form
								method	=	"get"
								action	=	"shoppingCart.php"
						>
							個数
							<input
									type		=	"text"
									name		=	"quantity"
									value		=	"1"
							>
							個
							<input
								type		=	"image"
								src		=	"img/btn/cartin.png"
								alt		=	"カートに入れる"
								width		=	"264"
								href		=	"shoppingCart.php"
							>
							<!--
								type		=	"text"
							-->
							<input
								type		=	"hidden"
								name		=	"code"
								value		=	"<?php	echo
													$v_data["code"]
											;	?>"
							>
							<input
								type		=	"hidden"
								name		=	"name"
								value		=	"<?php	echo
													$v_data["name"]
											;	?>"
							>
							<input
								type		=	"hidden"
								name		=	"price"
								value		=	<?php	echo
													$v_data["price"]
											;	?>
							>
							
						</form>
						<!--
							height	=	"47"
						-->
					</div>
				</div>
		<?php
			}
		?>
			</div>	<!-- #detail -->
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
	</body>
		<test>	</test>
		<script>
		//<!--
				riot.mount("*")	;
		//-->
		</script>

</html>

