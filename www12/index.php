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
				src	=	"tag/btnCrt.tag"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/navGlb.tag"
		></script>
		<script	type	=	"riot/tag"
				src	=	"tag/navAdmin.tag"
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
	</head>
<?php
		session_start()	;
?>
<?php
	$data			=	array()	;
	
	$mysql["sv"]	=	"localhost"	;
	$mysql["us"]	=	"root"	;
	$mysql["pw"]	=	""	;
	
	$mysql["db"][0]	=	""	;
	$mysql["db"][1]	=	"shop"	;
	
	$mysql["pk"][0]	=	""	;
	$mysql["pk"][1]	=	"code"	;
	
	$mysql["fd"][0]	=	""	;
	$mysql["fd"][1]	=	"category"	;
	
	$mysql["fd_where"][0]	=	""	;
	$mysql["fd_where"][1]	=	$mysql["fd"][1]	;
	
	$mysql["fd_order"][0]	=	$mysql["pk"][1]	;
	$mysql["fd_order"][1]	=	"price"	;
	
	$mysql["qr"]["where"][1]	=	""	;
	$mysql["qr"]["order"][1]	=	""	;
	/*
		echo(
				$mysql["qr"]["where"][1]	."<br>".
				$mysql["qr"]["order"][1]	."<br>"
		)	;
	*/
	
	if(
		isset($_GET[
					"fd_where"
		])
	){
		setSQLwhere()	;
	}
		function	setSQLwhere(){
			global	$mysql	;
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
	
	
	isset(
			$_GET["table"]
	)
	?
		setTable()
	:	false		;
	
	function	setTable()	{
		global	$mysql		;
		$mysql["tb"][0]	=	""	;
		$mysql["tb"][1]	=	$_GET["table"]	;
		
		$mysql["qr"][0]	=	""	;
		$mysql["qr"][1]	=
						"select * from ".	$mysql["tb"][1]
						;
		
		$mysql["qr"][1]	=	$mysql["qr"][1]
				." ".		$mysql["qr"]["where"][1]
				." ".		$mysql["qr"]["order"][1]
				.		";"
						;
		echo	(
				$mysql["qr"][1]	."<br>"
		)	;
	}
	/*
		foreach(
				$mysql["qr"] as $k => $v
		){
			echo(
					$k ." : ". $v	."<br>"
			)	;
		}
	*/
	/*
		echo(
				$k ." : ". $v	."<br>"
				$mysql["qr"]["where"][1]	."<br>".
				$mysql["qr"]["order"][1]	."<br>"
				$mysql["fd"][0]	."<br>".
				$mysql["fd"][1]	."<br>"
		)	;
	*/
	
/*
	$mysql[""]	=	""	;
*/
?>
<?php
	connectDB()		;
	function	connectDB(){
		global	$mysql	;
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
	}
?>	
<?php
	isset(
			$_GET["table"]
	)
	?
		getResult()
	:	false		;
	
	function	getResult()	{
		global	$mysql	;
		global	$data		;
		$mysql["result"]		=	mysqli_query(
								$mysql["id_link"]		,
								$mysql["qr"][1]		
							)
		or exit(
				"error_query"
		)	;
		$_SESSION["mysql"]	=	$mysql	;
		
		echo("test")	;
		echo(
				$_SESSION["mysql"]["tb"][1]	."<br>"
		)	;
	/*
				$mysql["db"][1]	."<br>"
		echo_foreach($mysql)	;
		echo_foreach3($mysql)	;
		echo_foreach3($_SESSION["mysql"])	;
	*/
		
		while(
			$data_while		=	mysqli_fetch_array(
								$mysql["result"]		,
								MYSQLI_ASSOC
							)
		){
			$data[]	=	$data_while		;
		}
			
		$_SESSION[$mysql["tb"][1]]	=	$data		;
		
		echo("test")	;
	/*
		echo_foreach2($_SESSION[$mysql["tb"][1]])		;
	*/
		
		getNumber_result()	;
	}
?>
<?php
	function	getNumber_result()	{
		global	$mysql	;
		$mysql["nm_result"]	=	mysqli_num_rows(
								$mysql["result"]
							)	;
		echo(
				$mysql["nm_result"]
		)	;
	/*
	*/
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
/*
	closeDB()		;
*/
	function	closeDB()	{
		mysqli_free_result(
						$mysql["result"]
		)	;
		mysqli_close(
						$mysql["id_link"]
		)	;
	}
?>
	<script>
	//<!--
			data		=	<?php	echo
								toJS($_SESSION)
						;	?>	;
	//-->
	</script>
	
	<body>
	<div
		id	=	"container"
	>
		<header>
			<logo>	</logo>
		</header>
		<div
				id		=	"content"
		>
			<h2>
					業務管理
			</h2>
				<navAdmin>		</navAdmin>
			<div
					id	=	"header_01"
			></div>
			<div
					id	=	"header_02"
			></div>
		<!--
			<p>
							全
				<?php	echo(
								$mysql["nm_result"]
				);?>
							商品
			</p>
		-->
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
	
	<div
			id	=	"test"
	>
	</div>
	
	<script>
	//<!--
			data		=	<?php	echo
								toJS($_SESSION)
						;	?>	;
	//-->
	</script>
		<script>
				function	dataSelected(){
				/*
					alert()	;
				*/
						mount(
								"tableSelected"		,
								"#header_01"
						)	;
						mount(
								"buttonChgDB"		,
								"#header_02"
						)	;
				/*
						mount(
								"navAdmin"		,
								"header"
						)	;
				*/
				/*
						mount(
								"tableSelected"		,
								"#navAdmin_02"
						)	;
						mount(
								"buttonChgDB"		,
								"#navAdmin_03"
						)	;
				*/
				}
				/*
					setInterval(
						mount("tableSelected","#navAdmin_02")	,
						5000
					)	;
					alert()	;
					mount("tableSelected","#changeDB")	;
				*/
		</script>
		<script>
		//<!--
				riot.mount("*")	;
		//-->
		</script>
		<script>
				var	tag		=	new Object()	;
				
				function	mount(name_tag,tag_mounted){
					var	name_tag_lowerCase	=	name_tag.toLowerCase()		;
					tag[name_tag]	=	new Object()	;
					riot.compile(
						tag[name_tag]	=	riot.mount(
												tag_mounted		,
												name_tag_lowerCase
										)
					)	;
				/*
					alert(tag[name_tag])	;
											document.getElementById("test")	,
					console.dir(tag[name_tag])	;
				*/
					return	tag[name_tag]		;
				}
		</script>
		<script>
		//<!--
				function	unmount(object_tag){
					map(
							object_tag		,
							function(object_tag_i){
											object_tag_i.unmount(true)	;
							}
					)	;
				/*
					console.dir(object_tag)	;
				*/
				}
		//-->
		</script>
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
		<?php
			function	echo_foreach3($data){
				foreach(
						$data as $k => $v
				){
					echo
						echo_foreach2($v)
					;
				}
			}
			function	echo_foreach2($data){
				foreach(
						$data as $k => $v
				){
					echo
						echo_foreach($v)
					;
				}
			}
			function	echo_foreach($data){
				foreach(
						$data as $k => $v
				){
					echo
							$k	.":".	$v	."<br>"
					;
				}
			}
		?>
		
		<script>
			/*
					alert()	;
					test()	;
					function	test(){
						a	=	"test"	;
					}
			*/
			/*
					alert(a)	;
			*/
			/*
					mount("tableSelected","#header_01")	;
					dataSelected()		;
					mount("tableSelected","#navAdmin_02")	;
			*/
		</script>
	</body>

	<?php
		isset(
				$_GET["table"]
		)
		?
			dataSelected()
		:	false		;
		
		function	dataSelected(){
			echo(
					"<script>"
				 . 			"dataSelected()	;"
				 . 	"</script>"
			)	;
		}	
	/*
	*/
		/*
			sleep(1)	;
		*/
	?>
<?php
	/*
		echo_foreach2($_SESSION[$mysql["tb"][1]])		;
	*/
?>
</html>

