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
				href		=	"css/ordered.css"
		></link>
	</head>
<?php
	session_start()		;
?>
<?php
	if(isset(
			$_SESSION["sei"]
	)){
			$sei		=	$_SESSION["sei"]		;
			$mei		=	$_SESSION["mei"]		;
			$zip1		=	$_SESSION["zip1"]		;
			$zip2		=	$_SESSION["zip2"]		;
			$pref		=	$_SESSION["pref"]		;
			$addr		=	$_SESSION["addr"]		;
			$email	=	$_SESSION["email"]	;
			$pay		=	$_SESSION["pay"]		;
			
			$ordered["name"]		=	$sei . "  " . $mei	;
			$ordered["zip"]		=	$zip1 . "-" . $zip2	;
			$ordered["address"]	=	$pref . "  " . $addr	;
			$ordered["date"]		=	date(
										"ymd_His"
								)	;
			
			$data		 =	""		;
			$data		.=			$ordered["date"]			;
			$data		.=	",".		$ordered["name"]			;
			$data		.=	",".		$ordered["zip"]			;
			$data		.=	",".		$ordered["address"]		;
			$data		.=	",".		$email				;
			$data		.=	",".		$pay					;
			
			$data		.=	",".		$_SESSION["total"]			;
			$data		.=	",".		$_SESSION["subtotal"]			;
			$data		.=	",".		$_SESSION["postage"]			;
			$data		.=	",".		$_SESSION["n_item"]			;
			
			foreach(
					$_SESSION["shpCrt"] as $k_row => $v_row
			){
				foreach(
						$v_row as $k => $v
				){
					$data		.=	",".		$v		;
				}
			}
			
			$data		.=	"\n"		;
			echo
					$data
			;
	}
?>
<?php
?>
<?php	
	$fileWritten		=	"csv/order.csv"		;
	
	$ordered["msg"][0]	=	"ご注文をキャンセルいたしました。"		;
	$ordered["msg"][1]	=	"
							ご購入、ありがとうございます。
					<br>		購入手続きが完了いたしました。
						"	;

	function	end_order(){
		global	$fileWritten		;
		global	$ordered			;
		global	$data				;
		
		$_GET["ordered"]	==	1
		?
			writeOrder($fileWritten,$data)
		:
			false
		;
	/*
		$_SESSION	=	array()	;
		session_destroy()		;
	*/
		$msg		=	$ordered["msg"][$_GET["ordered"]]	;
		echo	(
				"
					<p>
						{$msg}
					</p>
				"
		)	;
	}
	function	writeOrder(
						$fileWritten	,
						$dataWritten
	){
		$fH	=	fopen(
						$fileWritten		,
						"a"
				)	;
		if(
			!$fH
		){
			exit(
					"error_fopen"
			)	;
		}
		else{
			flock		($fH	,	LOCK_EX		)	;
			fputs		($fH	,	$dataWritten	)	;
			flock		($fH	,	LOCK_UN		)	;
			fclose	($fH	)	;
		}
		
	}
	
	function	f($msg){
		echo	(
				"
					<p>
						$msg
					</p>
				"
		)	;
	/*
		echo	$ordered["msg"][$_GET["ordered"]]	;
	*/
	}
	
?>
<?php
		if(isset(
				$_COOKIE[session_name()]
		)){
			setcookie(
					session_name()	,
					""	,	0
			)	;
		}
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
		
		<div
				id		=	"content"
		>
			<div>
				<h2>
						お手続きの完了
				</h2>
				<?php	
					isset(
							$_GET["ordered"]
					)
					?
						end_order($data)
					:
						false
					;
				?>
				<a
					href	=	"goods_list.php"
				>
						商品一覧に戻る
				</a>
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
		<test>	</test>
		<script>
		//<!--
				riot.mount("*")	;
		//-->
		</script>

	</body>
</html>

