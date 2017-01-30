<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>
				横浜元町洋菓子店
		</title>
		<script	src	=	"https://cdn.rawgit.com/riot/riot/master/riot+compiler.min.js"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/_test.tag"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/logo.tag"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/navGlb.tag"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/copyRight.tag"
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
				href		=	"css/goods_list.css"
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
					"fd_where"
		])
	){
		$mysql["v_where"][1]	=	$_GET[
									"v_where"
						]	;
		$mysql["qr"]["where"][1]	=
			"where ".	$mysql["fd_where"][1]	." = ".	$mysql["v_where"][1]
			;
	}
	if(
		isset($_GET[
					"fd_order"
		])
	){
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
/*
*/
/*
	foreach($data as $k_row => $v_row){
		foreach($v_row as $k => $v){
			echo	$v	;
		}
	}
*/
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
			<logo>	</logo>
		</header>
			<navGlb>	</navGlb>
		<div
				id		=	"content"
		>
			<h2>
					商品一覧
			</h2>
			
			<p>
							全
				<?php	echo(
								$mysql["nm_result"]
				);?>
							商品
			</p>
			<div
				id	=	"chgOrder"
			>
					表示順序：&nbsp;
				<a
					href	=	"goods_list.php
							?	fd_order	=	price
							&	v_order	=	desc
							"
				>
						価格の高さ
				</a>
				&nbsp;|&nbsp;
				<a
					href	=	"goods_list.php
							?	fd_order	=	price
							&	v_order	=	asc
							"
				>
						価格の低さ
				</a>
			</div>
			
			<div
					id	=	"goodsbox"
			>
			<?php
				foreach(
						$data as $k_data => $v_data
				){
			?>
				<div
						class	=	"goods"
				>
				<a
					href	=	"goods_detail.php
							?	fd_where	=	code
							&	v_where	=
									<?php	echo
											$v_data["code"]
									;	?>
					"
				>
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
					<!--
								"img/item/cake1.jpg"
					-->
						<br>			<?php	echo
											$v_data["code"]
									;	?>
						<br>			<?php	echo
											$v_data["name"]
									;	?>
						<br>			<?php	echo
											$v_data["price"]
									;	?>
									円(税込)
				<!--
					<br>		1001
					<br>		モンブランケーキ
					<br>		500円(税込)
				-->
				</a>
				</div>	<!-- .goods -->
			<?php
				}
			?>
			
			</div>	<!-- #goodsbox -->
			
		</div>	<!-- #content -->
		
		<footer>
			<copyRight>		</copyRight>
		</footer>
	</div>
		<test>	</test>
		<script>
		//<!--
				riot.mount("*")	;
		//-->
		</script>

	</body>
</html>

