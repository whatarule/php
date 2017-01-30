<changeDB>
	<script>
			this.id_div		=	"changeDB"		;
			
		/*
			tag.changeDB	=	this			;
			tag.changeDB.unmount()	;
			this.unmount()	;
		*/
	</script>
	
	<div
			id		=	{id_div}
	>
		<navChgDB>		</navChgDB>
		<cntChgDB>		</cntChgDB>
	</div>
	
	<style
			scoped
	>
	/*
		:scope		{
			background-color	:	#222222	;
			
			margin		:	 00px		;
			padding		:	 00px		;
		}
		div#changeDB		{
			margin		:	 00px		;
			padding		:	 00px		;
		}
		div#changeDB *		{
		}
			margin		:	 00px		;
			padding		:	 00px		;
	*/
	</style>
</changeDB>

	<navChgDB>
		<script>
			this.id_nav		=	"navChgDB"		;
			this.bd_h2		=	""		;
			this.bd_p		=	""		;
			
			this.li_ul		=	[
				{
					name		:	"追加"	,
					changeDB	:	"add"		,
				}	,
				{
					name		:	"更新"	,
					changeDB	:	"update"	,
				}	,
				{
					name		:	"削除"	,
					changeDB	:	"delete"	,
				}	,
			/*
				{
					name		:	""	,
					changeDB	:	""	,
				}	,
			*/
			]
		/*
			this.		=		""		;
		*/
		</script>
		<nav
				id		=	{id_nav}
		>
			<div>
				<ul>
					<li
						each		=	"{li_ul}"
					>
						<a
							href		=	?changeDB={changeDB}
						>
										{name}
						</a>
					</li>
				</ul>
			</div>	<!-- .inner -->
		</nav>
		<style>
				/*
					margin		:	 00px		;
					padding		:	 00px		;
				*/
				#navChgDB		{
					border-style	:	solid		;
					border-width	:
									 00px
									 00px
								;
				/*
					padding		:	 05px	;
				*/
				}
				#navChgDB div		{
					padding		:
									 00px
									 10px
								;
					
					width			:	100%		;
				/*
				*/
				}
				#navChgDB div ul		{
				/*
					width			:	100%		;
				*/
					margin		:
									 00px
									 auto
								;
					border-style	:	solid		;
					border-width	:
									 01px
									 01px
									 01px
									 00px
								;
					background-color	:	#cccccc	;
				}
				#navChgDB div ul::after		{
					display		:	block		;
					content		:	""		;
					clear			:	both		;
				}
				#navChgDB div ul li		{
					padding		:	 00px		;
					
					float			:	left		;
					border-style	:	solid		;
					border-width	:
									 00px
									 00px
									 00px
									 01px
								;
					text-align		:	center	;
					line-height		:	2.0		;
				}
				#navChgDB div ul li		{
					width			:	 33%		;
				}
				#navChgDB div ul li:nth-of-type(2)		{
					width			:	 34%		;
				/*
				*/
				}
			/*
				#navChgDB div ul li:nth-child(3)		{
				}
			*/
				#navChgDB div ul li a		{
					display		:	block		;
					width			:	100%		;
					height		:	100%	;
				}
				#navChgDB div ul li a		{
					background-color	:	#dddddd	;
				}
				#navChgDB div ul li a:hover		{
					background-color	:	#eeeeee	;
				}
		</style>
	</navChgDB>
	<cntChgDB>
		<script>
			this.id_div		=	"cntChgDB"		;
			this.bd_h2		=	""		;
			this.bd_p		=	""		;
			this.data		=	data		;
			this.tb		=	data["mysql"]["tb"][1]	;
			
			this.tr		=	[
				{
					th	:	"フィールド名"	,
				}	,
				{
					th	:	"適用"	,
				}	,
				{
					th	:	"値_変更前"	,
				}	,
				{
					th	:	"更新"	,
				}	,
				{
					th	:	"値_変更後"	,
				}	,
			]
			
			this.k_checked		=	"checked"		;
			this.k_radio		=	"radio"		;
			this.k_checkbox		=	"checkbox"		;
			
		/*
			this.		=		""		;
		*/
		</script>
		<div
			id	=	{id_div}
		>
			<section>
				<form
						method	=	"post"
						action	=	"#confirmChgDB"
				>
		<!--
		-->
					<table>
						<tr>
							<th
								each	=	"{tr}"
							>
									{th}
							</th>
						</tr>
						<tr
							each	=	"{k, v in data[tb][0]}"
						>
							<td>
									{k}
							</td>
							<td>
									<input
											type	=	"checkbox"
											name	=	"fd_applied"
											value	=	"{k}"
									>
									<!--
											name	=	"fd_applied"
											name	=	"fd_applied[{k}]"
									-->
							</td>
							<td>
									<select
											name	=	v_registered[{k}]
									>
										<option
												each	=	"{v_tb, k_tb in data[tb]}"
												value	=	"{v_tb[k]}"
										>
												{v_tb[k]}
										</option>
									</select>
							</td>
							<td>
									<input
											type	=	"checkbox"
											name	=	"fd_changed[{k}]"
											value	=	"{k}"
									>
							</td>
							<td>
									<input
											type	=	"text"
											name	=	"v_changed[{k}]"
											value	=	"{v}"
									>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td>
								<input
										type		=	"submit"
										value		=	"確認"
								>
						<!--
										onClick	=	{confirm}
						-->
						<!--
								<a
										onClick	=	{confirm}
								>
										確認
								</a>
						-->
				<script>
				/*
						confirm(e){
							mount(
									"confirmChgDB"		,
									"#content_01"
							)	;
						}
				*/
				</script>
							</td>
							<td>
								<a
										href		=	""
										onClick	=	"window.close()	;"
								>
										キャンセル
								</a>
							</td>
						</tr>
					</table>
				</form>
			</section>
		</div>
		
		<style
				scoped
		>
			/*
				margin		:	 00px		;
				padding		:	 00px		;
				
			*/
			div#cntChgDB		{
			}
			#cntChgDB section		{
			}
			#cntChgDB section *		{
			}
			div section *		{
				margin		:
								 00px
								 auto
							;
			}
			#cntChgDB section form		{
				text-align		:	center	;
			}
			
			#cntChgDB section form table		{
				margin		:
								 10px
								 auto
							;
			}
			#cntChgDB section form table tr		{
			}
			#cntChgDB section form table tr th		{
				text-align		:	center	;
				padding		:
								 10px
								 10px
							;
			}
			#cntChgDB section form table tr td		{
				text-align		:	left		;
				line-height		:	2.0		;
				padding		:
								 00px
								 10px
							;
			}
			#cntChgDB section form table tr td:nth-of-type(3)	,
			#cntChgDB section form table tr td:nth-of-type(5)
			{
				padding		:
								 00px
								 00px
							;
			}
			#cntChgDB section form table tr td *		{
			}
			#cntChgDB section form table tr td select		{
				-webkit-appearance	:	none		;
				
				width			:	100%		;
				line-height		:	3.0		;
				border-style	:	none		;
				padding		:
								 00px
								 10px
							;
			}
			#cntChgDB section form table tr td input[type="text"]		{
				width			:	100%		;
				line-height		:	3.0		;
			/*
				height		:	100%		;
			*/
				border-style	:	none		;
				padding		:
								 00px
								 10px
							;
			}
			#cntChgDB section form table:nth-of-type(2) tr td		{
				border-style	:	none		;
			}
			#cntChgDB section form table:nth-of-type(2) tr td input[type=submit]		{
				cursor		:	pointer		;
				line-height		:	3.0		;
				padding-left	:	 20px		;
				padding-right	:	 20px		;
			}
			#cntChgDB section form table:nth-of-type(2) tr td a		{
				border-style	:	solid		;
				line-height		:	3.0		;
				padding		:
								 10px
								 20px
							;
			}
		/*
				-webkit-appearance	:	none		;
				vertical-align	:	middle	;
				
				margin		:	 00px		;
				padding		:	 00px		;
				
				padding		:
								 10px
								 00px
							;
				text-align		:	center	;
		*/
		</style>
	</cntChgDB>
	
		<dataChgDB>
			<script>
				this.id_div		=		"dataChgDB"		;
			/*
				this.		=		""		;
			*/
				this.data		=	data		;
				this.tb		=	data["mysql"]["tb"][1]	;
				
				this.changeDB	=
					{
						add		:	"追加"	,
						update	:	"更新"	,
						delete	:	"削除"	,
					}
				
				this.tr		=	[
					{
						th	:	"フィールド名"	,
					}	,
					{
						th	:	"適用"	,
					}	,
					{
						th	:	"値_変更前"	,
					}	,
					{
						th	:	"更新"	,
					}	,
					{
						th	:	"値_変更後"	,
					}	,
				]
				
				this.k_run		=	"run"		;
				
			</script>
			<div
				id	=	{id_div}
			>
				<table>
					<tr>
						<th>
								処理種別
						</th>
						<td>
								{changeDB[data["mysql"]["changeDB"]]}
						</td>
					</tr>
				</table>
				<!--
					<div
								each	=	"{k, v in data["chg"]["fd_changed"]}"
					>
						<div
						>
									{k} : {v}
						</div>
					</div>
				-->
				<table>
					<tr>
						<th
							each	=	"{tr}"
						>
								{th}
						</th>
					</tr>
				<!--
					<tr
						each	=	"{k, v in data[tb][0]}"
					>
						<td>
								{k}
						</td>
				-->
					<tr
							each	=	"{k, v in data["chg"]["v_changed"]}"
					>
						<td
						>
								{data["chg"]["fd_applied"]}
						</td>
						<td>
								{data["chg"]["v_registered"][data["chg"]["fd_applied"]]}
						</td>
						<td>
								{data["chg"]["v_registered"][k]}
						</td>
						<td
						>
								{data["chg"]["fd_changed"][k]}
						</td>
						<td>
								{data["chg"]["v_changed"][k]}
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<th>
								実行コマンド
						</th>
						<td>
								{data["mysql"]["qr"][data["mysql"]["changeDB"]]}
						</td>
					</tr>
				</table>
			</div>
			<style
					scoped
			>
				#dataChgDB		{
				}
				#dataChgDB table		{
					margin		:
									 10px
									 auto
								;
				}
				#dataChgDB table tr		{
				}
				#dataChgDB table tr th		{
					text-align		:	center	;
					background-color	:	#dddddd	;
				}
				#dataChgDB table tr td		{
				}
			</style>
		</dataChgDB>

	<confirmChgDB>
		<script>
			this.id_div		=		"confirmChgDB"		;
			this.bd_h3		=		"確認"		;
			this.bd_p		=		"下記の通り、データベースを変更します。"		;
		/*
			this.		=		""		;
		*/
		</script>
		<div
			id	=	{id_div}
		>
			<section>
				<h3>
						{bd_h3}
				</h3>
					<p>
							{bd_p}
					</p>
			</section>
			<dataChgDB>		</dataChgDB>
				<table
						class		=	"button"
				>
					<tr>
						<td>
							<a
									href		=	'?runQuery=1'
							>
									実行
							</a>
						</td>
			<!--
									onClick	=	{runQuery}
				<script>
						runQuery(e){
						}
				</script>
			-->
						<td>
							<a
									href		=	"#cntChgDB"
							>
									キャンセル
							</a>
						</td>
					</tr>
				</table>
			<!--
			-->
		<!--
			<div>
				<a
						href		=	'?runQuery=1'
				>
						実行
				</a>
				<a
						href		=	"#cntChgDB"
				>
						キャンセル
				</a>
			</div>
		-->
		</div>
		<style
				scoped
		>
			#confirmChgDB		{
			}
			#confirmChgDB section		{
			}
			#confirmChgDB section p		{
				text-align		:	center	;
			}
			#confirmChgDB table[class="button"]		{
				margin		:
								 00px
								 auto
							;
			}
			#confirmChgDB table[class="button"] td		{
				border-style	:	none		;
			}
			#confirmChgDB table[class="button"] td a		{
			/*
			*/
				background-color	:	#dddddd	;
				border-style	:	solid		;
				
				display		:	block		;
				padding		:
								 00px
								 10px
							;
			/*
				width			:	100%		;
				height		:	100%		;
			*/
			}
		</style>
	</confirmChgDB>
	
	<doneChgDB>
		<script>
			this.id_div		=		"doneChgDB"		;
			this.bd_h3		=		"完了"		;
			this.bd_p		=		"下記の通り、データベースを変更しました。"	;
		/*
			this.		=		""		;
		*/
		</script>
		<div
			id	=	{id_div}
		>
			<section>
				<h3>
						{bd_h3}
				</h3>
					<p>
							{bd_p}
					</p>
			</section>
			<dataChgDB>		</dataChgDB>
				<table
						class		=	"button"
				>
					<tr>
						<td>
							<a
									href		=	"changeDB.php"
							>
									続ける
							</a>
						</td>
						<td>
							<a
								href		=	""
								onClick	=	"window.close()	;"
							>
									終わる
							</a>
						</td>
					</tr>
				</table>
		</div>
		<style>
			#doneChgDB		{
			}
			#doneChgDB section		{
			}
			#doneChgDB section p		{
				text-align		:	center	;
			}
			#doneChgDB table[class="button"]		{
				margin		:
								 00px
								 auto
							;
			}
			#doneChgDB table[class="button"] td		{
				border-style	:	none		;
			}
			#doneChgDB table[class="button"] td a		{
				background-color	:	#dddddd	;
				border-style	:	solid		;
				
				display		:	block		;
				padding		:
								 00px
								 10px
							;
			}
		</style>
	</doneChgDB>

