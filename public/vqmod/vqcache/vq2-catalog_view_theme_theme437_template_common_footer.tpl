<div class="clear"></div>
</div>
</div>
</div>
<div class="clear"></div>
</section>
<!-- Footer -->
<footer>
	<div class="container">
		<div class="fb-like-box" data-href="https://www.facebook.com/alfabetoauto" data-width="1200" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
	</div>
</footer>

<footer>
	<div class="container">
		<div class="row">
			<?php if ($informations) { ?>
			<div class="col-sm-3">
				<div class="block">
					<div class="block-heading">
						<?php echo $text_information; ?>
					</div>
					<div class="block-content">
						<ul>
							<?php foreach ($informations as $information) { ?>
							<li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="col-sm-3">
				<div class="block">
					<div class="block-heading">
						<?php echo $text_service; ?>
					</div>
					<div class="block-content">
						<ul>
							<li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
							<li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
							<li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="block">
					<div class="block-heading">
						<?php echo $text_extra; ?>
					</div>
					<div class="block-content">
						<ul>
							<li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
							<li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
							<li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
							<li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="block">
					<div class="block-heading">
						<?php echo $text_account; ?>
					</div>
					<div class="block-content">
						<ul>
							<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
							<li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
							<li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
							<li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- copyright -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="copyright" style="float: left; width: 50px;">
					<img src="/image/comodo_sa_transp.png" height="43" style="min-width: 35px;">
				</div>
				
				<div id="copyright" style="float: left; width: 45%; padding-top: 25px; min-width: 300px;">
					<?php echo $powered; ?><!-- [[%FOOTER_LINK]] -->
				</div>

				<div id="copyright" style="float: left; width: 49%; text-align: right; min-width: 330px;">
					<img src="/image/pagseguro.jpg" height="40" style="height: 40px;">
				</div>
			</div>
		</div>
	</div>
</footer>
<script type="text/javascript" 	src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/js/livesearch.js"></script>
</div>
</div>
</div>

				

                        <?php $this->load->library('couponpop'); ?>
                        
					</body>
					<script type="text/javascript" src="catalog/view/javascript/jquery.mask.min.js"></script>

					<script type="text/javascript">
						$(function() {
							mascaras();
						});
						
						function mascaras(){
							var masksTel = ['(AA) A0000-0000', '(AA) A000-00009'],
							maskBehaviorTel = function(val, e, field, options) {
								return val.length > 14 ? masksTel[0] : masksTel[1];
							};

							$('input[name="telephone"], input[name="fax"]').mask(maskBehaviorTel, {onKeyPress: 
							   function(val, e, field, options) {
								   field.mask(maskBehaviorTel(val, e, field, options), {'translation': {'A': {pattern: /[1-9*]/}}});
							   }
							});
							
							var masksDoc = ['00.000.000/0000-00', '000.000.000-009999'],
							maskBehaviorDoc = function(val, e, field, options) {
								return val.replace(/\D/g, '').length > 11 ? masksDoc[0] : masksDoc[1];
							};
							
							$('input[name="tax_id"]').mask(maskBehaviorDoc, {onKeyPress: 
							   function(val, e, field, options) {
								   field.mask(maskBehaviorDoc(val, e, field, options), options);
							   }
							});
							
							$('.postcode-register, .postcode-register2, .postcode-guest, .postcode-payment, .postcode-shipping, .postcode-addressform').mask('00.000-000');
							
							$('.postcode-register').focusout(function(){
								cep('register');
							});
							
							$('.postcode-register2').focusout(function(){
								cep('register2');
							});
							
							$('.postcode-guest').focusout(function(){
								cep('guest');
							});
							
							$('.postcode-payment').focusout(function(){
								cep('payment');
							});
							
							$('.postcode-shipping').focusout(function(){
								cep('shipping');
							});
							
							$('.postcode-addressform').focusout(function(){
								cep('addressform');
							});
							
							function cep(sufixo)
							{
								var campo, cep, url, estado;
								url = $('base').attr('href') + 'index.php?route=account/register/cep';
								campo = $('.postcode-' + sufixo)
								var cep = campo.val().replace(/[^0-9]/g, "");
								
								if(cep && cep.length == 8)
								{
									$.ajax({
										url: url + '&numero_cep=' + cep,
										type: "POST",
										dataType: 'json',
										async: true,
										beforeSend: function(){
											campo.after('<span style="margin-left: 5px;" class="load-cep"> Aguarde...</span>');
										},
										success: function(data){
											if(data)
											{
												if(data.valido == true)
												{
													$('.address-1-' + sufixo).val(data.rua + ', nº ');
													$('.address-2-' + sufixo).val(data.bairro);
													$('.city-' + sufixo).val(data.cidade);
													
													estado = nomeuf(data.siglauf);
													
													$('.zone-id-' + sufixo + ' > option').each(function() {
														if($(this).text() == estado)
														{
															$(this).prop("selected", true);
														}
													});
													
													$('.address-1-' + sufixo).focus();
													
													$('.address-1-' + sufixo).setCursorPosition(data.rua.length + 5);
												}
											}
										},
										complete: function(){
											$('.load-cep').remove();
										}
									});
								}
							}
							
							function nomeuf(sigla)
							{
								var estado;

								switch(sigla)
								{
									case 'AC': estado = 'Acre'; break;
									case 'AL': estado = 'Alagoas'; break;
									case 'AP': estado = 'Amapá'; break;
									case 'AM': estado = 'Amazonas'; break;
									case 'BA': estado = 'Bahia'; break;
									case 'CE': estado = 'Ceará'; break;
									case 'DF': estado = 'Distrito Federal'; break;
									case 'ES': estado = 'Espírito Santo'; break;
									case 'GO': estado = 'Goiás'; break;
									case 'MA': estado = 'Maranhão'; break;
									case 'MT': estado = 'Mato Grosso'; break;
									case 'MS': estado = 'Mato Grosso do Sul'; break;
									case 'MG': estado = 'Minas Gerais'; break;
									case 'PA': estado = 'Pará'; break;
									case 'PB': estado = 'Paraíba'; break;
									case 'PR': estado = 'Paraná'; break;
									case 'PE': estado = 'Pernambuco'; break;
									case 'PI': estado = 'Piauí'; break;
									case 'RJ': estado = 'Rio de Janeiro'; break;
									case 'RN': estado = 'Rio Grande do Norte'; break;
									case 'RS': estado = 'Rio Grande do Sul'; break;
									case 'RO': estado = 'Rondônia'; break;
									case 'RR': estado = 'Roraima'; break;
									case 'SC': estado = 'Santa Catarina'; break;
									case 'SP': estado = 'São Paulo'; break;
									case 'SE': estado = 'Sergipe'; break;
									case 'TO': estado = 'Tocantins'; break;
								}
								
								return estado;
							}
							
							$.fn.setCursorPosition = function(pos) {
								this.each(function(index, elem) {
									if (elem.setSelectionRange) {
										elem.setSelectionRange(pos, pos);
									} else if (elem.createTextRange) {
										var range = elem.createTextRange();
										range.collapse(true);
										range.moveEnd('character', pos);
										range.moveStart('character', pos);
										range.select();
									}
								});
								return this;
							};
						}
					</script>
					
					</html>
				
			