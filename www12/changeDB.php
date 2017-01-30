<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>
				横浜元町洋菓子店
		</title>
		<script	src	=	"https://cdn.rawgit.com/riot/riot/master/riot+compiler.min.js"
		></script>
		<script>
				var	tag	=	{}		;
		</script>
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
				src	=	"tag/changeDB.tag"
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
		<style
				type	=	"riot"
		></style>
		<style>
		<!--
			@charset	"utf-8"	;
			#container		{
			}
		-->
		</style>
	</head>
<?php
		session_start()	;
?>
<?php
	/*
	*/
		console.dir($_SESSION)		;
		echo_foreach2($_SESSION[$mysql["tb"][1]])		;
	/*
		echo_foreach2($_SESSION["goods"])	;
		echo_foreach($_SESSION)	;
		echo_foreach2($_SESSION)	;
		echo_foreach3($_SESSION)	;
	*/
?>
<?php
		$mysql	=	$_SESSION["mysql"]	;
		$data		=	""				;
?>
<?php
/*
		connectDB()		;
*/
?>
<?php
		$mysql["changeDB"]	=	""		;
		isset(
				$_GET["changeDB"]
		)
		?
			$mysql["changeDB"]	=	$_GET["changeDB"]
		:	false		;
?>

<?php
	/*
			$mysql["qr"]["add"]	=	""	;
			$mysql["qr"]["update"]	=	""	;
			$mysql["qr"]["delete"]	=	""	;
	*/
?>
<?php
			$mysql["changeDB"]	==	"add"
		&&	isset(
					$_POST["v_changed"]
			)
		?
			addDB()
		/*
		*/
		:	false		;
?>
<?php
		function	addDB(){
			global	$mysql	;
			global	$data		;
			$data["add"]	=	$_POST["v_changed"]	;
			
			$data["add"]["csv"]	=
					"\"".	$data["add"]["code"]		."\""
				.",".	"\"".	$data["add"]["category"]	."\""
				.",".	"\"".	$data["add"]["name"]		."\""
				.",".		$data["add"]["price"]		
				.",".	"\"".	$data["add"]["file_img"]	."\""
			;
			$mysql["qr"]["add"]	=
				 "insert into ".	$mysql["tb"][1]	." "
				."values(".		$data["add"]["csv"]
				.");"
			;
			$_SESSION["mysql"]		=	$mysql	;
		/*
			echo(
					$mysql["qr"]["add"]		."<br>"
			)	;
			putQuery($mysql["qr"]["add"])		;
		*/
		}
?>

<?php
			$mysql["changeDB"]	==	"update"
		&&	isset(
					$_POST["fd_applied"]
			)
		&&	isset(
					$_POST["fd_changed"]
			)
		?
			updateDB()
		/*
		*/
		:	false		;
?>
<?php
		function	updateDB(){
			global	$mysql	;
			global	$data		;
		
			$data["chg"]	=	$_POST	;
			$_SESSION["data"]["chg"]	=	$data["chg"]		;
		/*
			$data["fd_applied"]	=	$_POST["fd_applied"]	;
			$data["v_registered"]	=	$_POST["v_registered"]	;
			$data["fd_changed"]	=	$_POST["fd_changed"]	;
			$data["v_changed"]	=	$_POST["v_changed"]	;
		*/
			$changeDB			=	$mysql["changeDB"]	;
		
			echo	(
					"changeDB:"		."<br>".
					$changeDB		."<br>"
			)	;
		/*
		*/
			$data["chg"][$changeDB]["csv"]	=	""	;
			foreach(
					$data["chg"]["fd_changed"] as $k => $v
			){
				$data["chg"][$changeDB]["csv"]	.=
							$k		." "
					."=".	"\"".	$data["chg"]["v_changed"][$k]	."\""	.", "
				;
			}
		/*
			function	($data){
				foreach(
						$data["chg"]["fd_changed"] as $k => $v
				){
					$data["chg"][$changeDB]["csv"]	.=
								$k		." "
						."=".	"\"".	$data["chg"]["v_changed"][$k]	."\""	.", "
					;
				}
				$data["chg"][$changeDB]["csv"]	=	mb_substr(
												$data["chg"][$changeDB]["csv"]		,
												0,	-2,	"utf-8"
									)	;
				return	$data["chg"][$changeDB]["csv"]	;
			}
		*/
		
		/*
				."=".	"\"".	$data["v_changed"][$data["fd_changed"]]	."\""
				."=".	"\"".	$data["v_changed"][$data["fd_changed"]]	."\""	.", "
		*/
			$data["chg"][$changeDB]["csv"]	=	mb_substr(
											$data["chg"][$changeDB]["csv"]		,
											0,	-2,	"utf-8"
								)	;
			$mysql["qr"][$changeDB]	=
				 "update ".		$mysql["tb"][1]					." "
				."set ".		$data["chg"][$changeDB]["csv"]				." "
				."where ".		$data["chg"]["fd_applied"]				." "
				."= "."\"".		$data["chg"]["v_registered"][$data["chg"]["fd_applied"]]		."\""
				.";"
			;
			echo(
					"setQuery:"		."<br>".
					$mysql["qr"][$changeDB]		."<br>"
			)	;
			$_SESSION["mysql"]		=	$mysql	;
		/*
			$_SESSION["qr"]		=	$mysql["qr"]	;
		*/
		/*
			putQuery($mysql["qr"][$changeDB])		;
		*/
		}
	/*
			echo_foreach	(
					connectArray_index(
									$data["chg"]["fd_changed"]	,
									"="
					)
			)	;
	*/
		/*
					."<br>"
		*/
			function	addArray($array,$con){
				foreach(
						$array as $k => $v
				){
					$arrayAdded		.=	$v	.$con		;
				}
				$arrayAdded		=	mb_substr(
										$arrayAdded			,
										0,	-1,	"utf-8"
								)	;
				return	$arrayAdded		;
			}
		/*
						$data["chg"]["fd_changed"] as $k => $v
		*/
		/*
			function	connectArray_index($array_in,$con){
				$array_out	=	New array	;
				$array_out	=	foreach(
									$array_in as $k => $v
							){
								connectString($k,$v,$con)
							}
				return	$array_out		;
			}
			function	connectString($str_h,$str_t,$con){
				$strConnected	=
										$str_h
								.$con.	$str_t
							;
				return	$strConnected	;
			}
		*/
?>

<?php
	/*
		echo	(
				$_POST["delete"]["fd"]	."<br>"
		)	;
	*/
			isset(
					$_POST["fd_applied"]
			)
		&&	$mysql["changeDB"]	==	"delete"
		?
			deleteDB()
		/*
		*/
		:	false		;
?>
<?php
		function	deleteDB(){
			global	$mysql	;
			global	$data		;
			$data["delete"]	=	$_POST["v_registered"]	;
			$data["delete"]["fd"]	=	$_POST["fd_applied"]	;
			
			$mysql["qr"]["delete"]	=
				 "delete from ".	$mysql["tb"][1]					." "
				."where ".		$data["delete"]["fd"]				." "
				."= "."\"".		$data["delete"][$data["delete"]["fd"]]		."\""
				.";"
			;
			$_SESSION["mysql"]		=	$mysql	;
		/*
			$_SESSION["mysql"]["qr"]		=	$mysql["qr"]	;
		*/
		/*
			echo(
					$mysql["qr"]["delete"]		."<br>"
			)	;
			putQuery($mysql["qr"]["delete"])		;
		*/
		}
?>

<?php
			isset(
					$_GET["runQuery"]
			)
		?
			echoB("true"."<br>")
		:	
			echoB("false"."<br>")
		;
		
		function	echoB($val){
			echo	(
					$val
			)	;
		}
		/*
		*/
?>
<?php
	/*
			echo(
					$mysql["qr"]["update"]		."<br>"
			)	;
	*/
		/*
			putQuery($mysql["qr"]["update"])		;
		*/
		
			isset(
					$_GET["runQuery"]
			)
		&&	$_GET["runQuery"]		==	1
		?
			putQuery($_SESSION["mysql"]["qr"])
		:	false		;
	/*
			putQuery($mysql["qr"]["update"])
	*/
		
		function	putQuery($qr){
			global	$mysql	;
			$mysql	=	$_SESSION["mysql"]	;
			$changeDB	=	$mysql["changeDB"]	;
		/*
			echo(
					"putQuery:"		."<br>".
					$mysql["changeDB"]	."<br>".
					$changeDB			."<br>".
					$qr[$changeDB]		."<br>"
			)	;
		*/	
			connectDB()		;
			$mysql["result"]		=	mysqli_query(
									$mysql["id_link"]		,
									$qr[$changeDB]
								)
			or exit(
						"error_query:"
				."<br>".	$qr[$changeDB]
			)	;
			echo(
					"putQuery:"		."<br>".
					$qr[$changeDB]		."<br>"
			)	;
		/*
			echo(
					"result:"		."<br>".
					$mysql["result"]		."<br>"
			)	;
		*/
			closeDB()		;
		}
?>
	<body>
<?php
	/*
		echo(
		)	;
				$_POST["add"]["code"]
				$_POST["code"]
				$_SESSION["goods"][0]["code"]
				"test"
	*/
	/*
		echo_foreach($mysql["id_link"])	;
		echo_foreach($mysql)	;
		echo_foreach($_SESSION["mysql"])	;
		echo_foreach($_SESSION)	;
	*/
?>
	<div
		id	=	"container"
	>
		<header>
			<logo>		</logo>
		</header>
	<!--
			<navAdmin>		</navAdmin>
	-->
		<div
				id		=	"content"
		>
			<h2>
					データベースの変更
			</h2>
				<tableSelected>	</tableSelected>
				<navChgDB></navChgDB>
		<!--
				<changeDB>		</changeDB>
				<confirmChgDB>	</confirmChgDB>
				<doneChgDB>		</doneChgDB>
		-->
			<div
					id		=	"content01"
			></div>
			
		</div>	<!-- #content -->
		
		<footer>
				<copyRight>		</copyRight>
		</footer>
		<div
				id	=	"test"
		>
		<!--
				<logo>		</logo>
				<changeDB>		</changeDB>
				<copyRight>		</copyRight>
		-->
		</div>
	<!--
	-->
	</div>
		<?php
		/*
				echo	(
							"test"
				)	;
				echo_foreach2($data)	;
				echo_foreach3($mysql)	;
				echo_foreach2($_SESSION)	;
		*/
		?>
		<script>
		//<!--
				data			=	<?php	echo
											toJS($_SESSION)
								;	?>	;
				data["chg"]		=	<?php	echo
											toJS($_SESSION["data"]["chg"])
								;	?>	;
		/*
		*/
				mysql			=	<?php	echo
											toJS($mysql)
								;	?>	;
		/*
			var	data		;
		*/
		/*
			setSessionData_toJS(data)	;
			
			function	setSessionData_toJS(v_data){
				v_data.mysql		=	<?php	echo
										toJS($_SESSION["mysql"])
								;	?>	;
				alert(v_data)	;
				console.dir(v_data)		;
				return	v_data	;
			}
		*/
		/*
			function	setSessionData_toJS(v_data){
				v_data		=	<?php	echo
										toJS($_SESSION)
								;	?>	;
				alert(v_data)	;
				console.dir(v_data)		;
				return	v_data	;
			}
		*/
		/*
			alert(data)			;
			console.dir(data)		;
		*/
		//-->
		</script>
		<script>
		//<!--
				var	tag		=	new Object()	;
			/*
				var	tag		;
				var	tag.aaa	=	new Object()	;
			*/
			/*
				riot.compile(function()	{
					tag.all	=	riot.mount("*")		;
				})	;
			*/
			/*
					alert(tag.all)	;
					console.dir(tag.all)	;
			*/
				riot.compile(function()	{
					tag.all	=	riot.mount(
											"*"
								)	;
				/*
					console.dir(tag.all)		;
					tag.body	=	riot.mount(
											"body"		,
											"*"
								)	;
					console.dir(tag.body)		;
					
					tag.header	=	riot.mount(
											"header"		,
											"*"
								)	;
					tag.content	=	riot.mount(
											"#content"		,
											"*"
								)	;
					tag.footer	=	riot.mount(
											"footer"		,
											"*"
								)	;
					console.dir(tag)		;
					console.dir(tag.header)		;
					console.dir(tag.content)		;
					console.dir(tag.footer)		;
				*/
				})	;
		//-->
		</script>
		<script>
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
				*/
					console.dir(tag[name_tag])	;
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
		
		<script>
		//<!--
				riotRoute(
							"#content_01"		,
							"navChgDB"
				)		;
				function	riotRoute(tag_mounted,tag_ini){
					riot.route(
						function(name_tag){
							name_tag	=	name_tag	||	tag_ini	;
							riot.mount(
										tag_mounted		,
										name_tag
							)	;
						}
					)	;
					riot.route.stop()		;
					riot.route.start(true)	;
				/*
					alert(tag_mounted)		;
					alert(tag_ini)		;
				*/
				}
						riot.compile(function()	{
							riot.mount(
										"#content_01"		,
										"navChgDB"
							)	;
						})	;
							mount(
										"navChgDB"		,
										"#content_01"
							)	;
		//-->
		</script>
		
		<script>
		//<!--
		/*
				confirm()	;
		*/
				function	cntChgDB(){
					mount(
							"cntChgDB"		,
							"#content01"
					)	;
				}
				function	confirmChgDB(){
					mount(
							"confirmChgDB"		,
							"#content01"
					)	;
				}
				function	doneChgDB(){
					mount(
							"doneChgDB"		,
							"#content01"
					)	;
				}
		//-->
		</script>
		<?php
				isset(
						$_GET["changeDB"]
				)
				?
					cntChgDB()
				:	false		;
				
				function	cntChgDB(){
					runJSfunction	(
									"cntChgDB()		;"
								)	;
				}
		?>
		<?php
					isset(
							$_POST["v_registered"]
					)
				||	isset(
							$_POST["v_changed"]
					)
				?
					confirmChgDB()
				:	false		;
		?>
		<?php
				function	confirmChgDB(){
					echo(
							"<script>"
						.			"confirmChgDB()		;"
						.	"</script>"
					)	;
				/*
						.			"confirmChgDB()		;"
						.			"alert('aaa')		;"
				*/
				}
		?>
		<?php
				isset(
						$_GET["runQuery"]
				)
				?
					doneChgDB()
				:	false		;
				
				function	doneChgDB(){
					runJSfunction	(
									"doneChgDB()	;"
								)	;
				/*
					echo(
							"<script>"
						.			"doneChgDB()		;"
						.	"</script>"
					)	;
				*/
				}
		?>
	<!--
		<?php
				test()	;
				function	test(){
					echo(
							"test"
					)	;
		?>
					<div>test</div>
					<script>
							doneChgDB()		;
					</script>
		<?php
				}
		?>
	-->
		
		<?php
				function	runJSfunction($f){
					echo(
							"<script>"
						.				$f
						.	"</script>"
					)	;
				/*
						.			"confirmChgDB()		;"
						.			"alert('aaa')		;"
				*/
				}
		?>
	<!--
	-->
	<!--
		<div>
			<a
				onClick	=	'mount("navChgDB","#test")	;'
			>
				mount_01
			</a>
				|
			<a
				onClick	=	'mount("tableSelected","#test")	;'
			>
				mount_02
			</a>
				|
			<a
				onClick	=	'mount("*","body")	;'
			>
				mount_all_test
			</a>
				<br>
				<br>
			<a
				onClick	=	'unmount(tag.navChgDB)	;'
			>
				unmount_01
			</a>
				|
			<a
				onClick	=	'unmount(tag.footer)	;'
			>
				unmount_02
			</a>
				|
			<a
				onClick	=	'unmount(tag.all)		;'
			>
				unmount_all
			</a>
		</div>
	-->
		<script>
		/*
				mount("navChgDB","#content01")	;
		*/
		</script>
		<script>
		//<!--
					function	range(n){
						var	array	=	[]	;
						
						for	(
							var	i	=	0	;
								i	<	n	;
								i++
						)
						{
							array[i]	=	i	;
						}
						
						return	array			;
					}
					
					function	map(array,f){
						var	array_f	=	[]	;
						
						for	(
							var	i	=	0			;
								i	<	array.length	;
								i++
						)
						{
							array_f[i]	=	f(array[i])		;
						}
						
						return	array_f		;
					}
					function	map_f(array,f){
						var	array_f	=	[]	;
						
						for	(
							var	i	=	0			;
								i	<	array.length	;
								i++
						)
						{
							array_f[i]	=	f[i](array[i])		;
						}
						
						return	array_f		;
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
							$k	.":".	$v	."<br>"
					;
					echo_foreach($v)		;
				}
			}
			function	echo_foreach2($data){
				foreach(
						$data as $k => $v
				){
					echo
							$k	.":".	$v	."<br>"
					;
					echo_foreach($v)		;
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
		
	</body>
<?php
	function	connectDB(){
		global	$mysql	;
		$mysql["id_link"]		=	""		;
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
/*
		isset(
						$mysql["result"]
		)
	&&	isset(
						$mysql["id_link"]
		)
	?
		closeDB()
	:	false		;
*/
	function	closeDB()	{
		global	$mysql	;
	/*
		echo(
				"result:"		."<br>".
				$mysql["result"]		."<br>"
		)	;
		mysqli_free_result(
						$mysql["result"]
		)	;
	*/
		mysqli_close(
						$mysql["id_link"]
		)	;
	}
?>
</html>
