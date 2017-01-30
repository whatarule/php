<navAdmin>
			<selectDB>		</selectDB>
	<!--
			<div
					id		=	"navAdmin_02"
			></div>
			<div
					id		=	"navAdmin_03"
			></div>
	-->
	<!--
			<tableSelected>	</tableSelected>
			<buttonChgDB>	</buttonChgDB>
	-->
</navAdmin>
	<selectDB>
			<script>
				this.id_nav		=		"navAdmin"		;
				this.bd_h2		=		""		;
				this.bd_p		=		""		;
			
				this.li_ul		=	[
					{
						name		:	"注文"	,
						table		:	"_order"	,
						href		:	"?table=_order"	,
					}	,
					{
						name		:	"お問い合わせ"	,
						table		:	"contact"	,
						href		:	""	,
					}	,
					{
						name		:	"お知らせ"	,
						table		:	"news"	,
						href		:	""	,
					}	,
					{
						name		:	"商品"	,
						table		:	"goods"	,
						href		:	""	,
				/*
						table		:	"item"	,
				*/
					}	,
				/*
					{
						name		:	""	,
						id		:	""	,
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
				<div
					class		=	"inner"
				>
					<ul>
						<li
							each		=	"{li_ul}"
						>
							<a
								href		=	?table={table}#view
							>
											{name}
							</a>
							<!--
								href		=	{href}
								href		=	?table={table}#view
								onClick	=	{dataSelected}
								onClick	=	'dataSelected()	;'
							-->
						</li>
					</ul>
				</div>	<!-- .inner -->
			</nav>
			<script>
					dataSelected(e){
						mount("tableSelected","#navAdmin_02")	;
					}
			</script>
			<style>
					nav#navAdmin		{
						width			:	100%		;
						border-style	:	solid		;
						border-width	:
										 00px
										 00px
										 01px
									;
						padding		:	 05px	;
					}
					nav#navAdmin ul		{
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
					nav#navAdmin ul::after		{
						display		:	block		;
						content		:	""		;
						clear			:	both		;
					}
					nav#navAdmin ul li		{
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
					nav#navAdmin ul li		{
						width			:	 25%		;
					}
					nav#navAdmin ul li:nth-of-type(3)		{
					/*
						width			:	199px		;
					*/
					}
				/*
					nav#navAdmin ul li:nth-child(3)		{
						width			:	199px		;
					}
				*/
					nav#navAdmin ul li a		{
						display		:	block		;
						width			:	100%		;
						height		:	100%	;
					}
					nav#navAdmin ul li a		{
						background-color	:	#dddddd	;
					}
					nav#navAdmin ul li a:hover		{
						background-color	:	#eeeeee	;
					}
			</style>
	</selectDB>

	<tableSelected>
		<script>
			this.id_div		=		"tableSelected"		;
		/*
			this.		=		""		;
		*/
		</script>
		<div
			id	=	{id_div}
		>
			<table>
				<tr>
					<th>
							データベース名：
					</th>
					<td>
							{data["mysql"]["db"][1]}
				<!--
							<?php	echo
									$mysql["db"][1]
							;	?>
				-->
					</td>
				</tr>
				<tr>
					<th>
							テーブル名：
					</th>
					<td>
							{data["mysql"]["tb"][1]}
				<!--
							<?php	echo
									$mysql["tb"][1]
							;	?>
				-->
					</td>
				</tr>
			</table>
		</div>
		<style
				scoped
		>
			#tableSelected		{
			}
			#tableSelected table		{
				margin		:
								 00px
								 auto
							;
			}
		</style>
	</tableSelected>
	
	<buttonChgDB>
		<script>
			this.id_div		=	"buttonChgDB"		;
			
			this.img	=	[
				{
					src		:	"img/btn/.png"	,
					alt		:	"変更"		,
					width		:	"205"			,
					href		:	"changeDB.php"	,
					target	:	"_blank"		,
				}	,
			]
			
			this.src_img	=	"img/btn/.png"		;
			this.alt_img	=	"変更"		;
			this.width_img	=	"205"			;
			this.href_img	=	"changeDB.php"		;
		/*
			this.		=		""		;
		*/
		</script>
		<div
			id	=	{id_div}
		>
			<section>
				<div
					class		=	"right"
				>
					<a
						each		=	"{img}"
						href		=	{href}
						target	=	{target}
					>
						DBの変更
						<!--
						<img
							src		=	{src}
							alt		=	{alt}
							width		=	{width}
							height	=	"38"
						>
						-->
					</a>
				</div>
			</div>	<!-- .inner -->			</section>
		</div>
		<style
				scoped
		>
			#buttonChgDB		{
			/*
				background-color	:	#222222		;
			*/
			}
			#buttonChgDB section		{
			}
			#buttonChgDB section a		{
				background-color	:	#dddddd		;
				border-style	:	solid		;
				padding		:
								 00px
								 10px
							;
			}
		</style>
	</buttonChgDB>
	
