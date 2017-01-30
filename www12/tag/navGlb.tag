<navGlb>
		<script>
			this.id_nav		=		"navGlb"		;
			this.bd_h2		=		""		;
			this.bd_p		=		""		;
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
					<li>
						<a
							href		=	"goods_list.php"
						>
							すべて
						</a>
					</li>
					<li>
						<a
							href		=	"
											goods_list.php
											?	fd_where=	category
											&	v_where=	1
										"
						>
							ケーキ
						</a>
					</li>
					<li>
						<a
							href		=	"
											goods_list.php
											?	fd_where=	category
											&	v_where=	2
										"
						>
							チョコレート
						</a>
					</li>
					<li>
						<a
							href		=	"
											goods_list.php
											?	fd_where=	category
											&	v_where=	3
										"
						>
							クッキー
						</a>
					</li>
					<li>
						<a
							href		=	"
											goods_list.php
											?	fd_where=	category
											&	v_where=	4
										"
						>
							ドリンク
						</a>
					</li>
				</ul>
			</div>	<!-- .inner -->
		</nav>
		<style>
				nav#navGlb		{
					width			:	100%		;
					border-style	:	solid		;
					border-width	:
									 00px
									 00px
									 01px
								;
					padding		:	 05px	;
				}
				nav#navGlb ul		{
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
				nav#navGlb ul::after		{
					display		:	block		;
					content		:	""		;
					clear			:	both		;
				}
				nav#navGlb ul li		{
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
				nav#navGlb ul li		{
					width			:	195px		;
				/*
					width			:	 20%		;
				*/
				}
				nav#navGlb ul li:nth-of-type(3)		{
					width			:	199px		;
				}
			/*
				nav#navGlb ul li:nth-child(3)		{
					width			:	199px		;
				}
			*/
				nav#navGlb ul li a		{
					display		:	block		;
					width			:	100%		;
					height		:	100%	;
				}
				nav#navGlb ul li a		{
					background-color	:	#dddddd	;
				}
				nav#navGlb ul li a:hover		{
					background-color	:	#eeeeee	;
				}
		</style>
</navGlb>
	
	<chTest>
		<script>
			this.id_div		=		""		;
			this.bd_h2		=		"test"		;
			this.bd_p		=		""		;
		/*
			this.		=		""		;
		*/
		</script>
		<div
			id	=	{id_div}
		>
			<section>
				<h2>
						{bd_h2}
				</h2>
				<p>
						{bd_p}
				</p>
			</section>
		</div>
		<style>
			#		{
			}
		</style>
	</chTest>

