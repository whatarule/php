<shoppingCart>
	<table_shpCrt>		</table_shpCrt>
</shoppingCart>
	
	<table_shpCrt>
		<script>
			this.id_div		=	""		;
			this.bd_h2		=	"test"	;
			this.bd_p		=	""		;
			
			this.data		=	data		;
		/*
			this.v_test		=	v_test	;
			
			this.		=		""		;
		*/
		</script>
			<div
				id	=	"cart"
			>
			<!--
				{data[0]["code"]}
			-->
				<h2>
						ショッピングカート
				</h2>
				<div>
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
								<tr
									each	=	"{v, k in data["shpCrt"]}"
								>
									<td
										class		=	"td_code"
									>
										{v["code"]}
									</td>
									<td
										class		=	"td_name"
									>
										{v["name"]}
									</td>
									<td
										class		=	"td_price"
									>
										{v["price"]}
											円(税込)
									</td>
									<td
										class		=	"td_quantity"
									>
										{v["quantity"]}
											個
									</td>
									<td
										class		=	"td_subtotal"
									>
										{v["subtotal_g"]}
											円
									</td>
									<td
										class		=	"td_delete"
									>
										<a
											href	=	"shoppingCart.php
													?	i_delete={k}
													"
										>
											削除
										</a>
									</td>
								<!--
									<td>
										<?php	echo
												$v_data[""]
										;	?>
									</td>
								-->
								</tr>
		<!--
			<?php
				}
			?>
		-->
								<tr>
									<td
										colspan	=	4
									>
											小計
									</td>
									<td>
										{data["subtotal"]}
											円
									</td>
									<td>
											
									</td>
								</tr>
						</table>
					</div>
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
							href		=	"register.php"
						>
							<img
								src	=	"img/btn/regi.png"
								alt	=	"レジに進む"
							>
						</a>
					</div>
				</div>
				
			</div>	<!-- #cart -->
	</table_shpCrt>

