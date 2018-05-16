<h2><?php esc_attr_e( 'Gravatar WordPress Profile Integration', 'wp_admin_style' ); ?></h2>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>	

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

				<?php if (!isset($gravapress_email) || $gravapress_email == '') :  ?>
					<!-- Header Postbox -->
					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e( 'Lets Get Started!', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">

							<form name="email_form" method="post" action=""><!-- Se deixar o action vazio ele envia os dados para o arquivo principal do plugin no caso gravapress.php -->
								
								<input type="hidden" name="email_submitted" value="Y">

							<table class="form-table">
								<tr>
									<td><?php esc_attr_e( 'Gravatar Email', 'wp_admin_style' ); ?></td>
									<td>
										<input name="gravatar_email" id="gravatar_email" type="text" value="" class="regular-text" />
									</td>
								</tr>
							</table>

							<p>
								<input class="button-primary" type="submit" name="email_login" value="<?php esc_attr_e( 'Login' ); ?>" />
							</p>

							</form>

						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				<?php else : ?>

					<!-- Profile Postbox -->
					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e( 'Gravatar Profile Preview', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">

							<p>Preview of your Gravatar Profile</p>

							<div class="wrap">
								
								<div id="col-container">

									<!-- Right Col -->
									<div id="col-right">

										<div class="col-wrap">
											
											<div class="inside">

												<a href="#"><img class="main-image" src="<?php echo $plugin_url . '/images/no-image.png'; ?>" width="300px" height="300px"></a>

												<h1><?php esc_attr_e( 'Photo Gallery', 'wp_admin_style' ); ?></h1>
												<div class="gallery-image">
													<a href="#" target="_blank">
														<img src="<?php echo $plugin_url . '/images/no-image.png'; ?>" width="50px" height="50px">
													</a>

													<a href="#" target="_blank">
														<img src="<?php echo $plugin_url . '/images/no-image.png'; ?>" width="50px" height="50px">
													</a>

													<a href="#" target="_blank">
														<img src="<?php echo $plugin_url . '/images/no-image.png'; ?>" width="50px" height="50px">
													</a>

													<a href="#" target="_blank">
														<img src="<?php echo $plugin_url . '/images/no-image.png'; ?>" width="50px" height="50px">
													</a>

													<a href="#" target="_blank">
														<img src="<?php echo $plugin_url . '/images/no-image.png'; ?>" width="50px" height="50px">
													</a>
												</div>

												<h1><?php esc_attr_e( 'Websites', 'wp_admin_style' ); ?></h1>
												<div class="sites-image">
													<a href="#" target="_blank">
														<img src="<?php echo $plugin_url . '/images/no-image.png'; ?>" width="100px" height="100px"> 
														<div class="caption">View Site</div>
													</a>

													<a href="#" target="_blank">
														<img src="<?php echo $plugin_url . '/images/no-image.png'; ?>" width="100px" height="100px"> 
														<div class="caption">View Site</div>
													</a>
												</div>
												
											</div>

										</div>
										<!-- /col-wrap -->

									</div>
									<!-- /col-right -->

									<!-- Left Col -->
									<div id="col-left">

										<!-- Info -->
										<div class="col-wrap">

											<h1><?php esc_attr_e( 'Info', 'wp_admin_style' ); ?></h1>
											
											<div class="inside">

												<h1><?php esc_attr_e( 'Marco Floriano', 'wp_admin_style' ); ?></h1>
												<?php esc_attr_e( 'São Paulo, Brasil', 'wp_admin_style' ); ?>
												<p>Empreendedor, desenvolvedor web e instrutor de CMS. Utilizo WordPress para dar vida às minhas ideias.</p>
											
											</div>
										
										</div>
										<!-- /col-wrap -->

										<!-- Social -->
										<div class="col-wrap">

											<h1><?php esc_attr_e( 'Social', 'wp_admin_style' ); ?></h1>
											
											<div class="inside">

												<p>
													Facebook<br />
													<small><a href="#">View Profile</a></small>
												</p>

												<hr />

												<p>
													Google<br />
													<small><a href="#">View Profile</a></small>
												</p>

												<hr />

												<p>
													Linkedin<br />
													<small><a href="#">View Profile</a></small>
												</p>

												<hr />

												<p>
													Twiiter<br />
													<small><a href="#">View Profile</a></small>
												</p>

												<hr />
											
											</div>
										
										</div>
										<!-- /col-wrap -->

										<!-- Contact -->
										<div class="col-wrap">

											<h1><?php esc_attr_e( 'Contact', 'wp_admin_style' ); ?></h1>
											
											<div class="inside">

												<p>
													Email<br />
													<small>marcofloriano@gmail.com</small>
												</p>

												<hr />	

												<p>
													Skype<br />
													<small>marco_floriano</small>
												</p>

												<hr />

												<p>
													Work Phone<br />
													<small>551232118356</small>
												</p>

												<hr />
											
											</div>
										
										</div>
										<!-- /col-wrap -->

									</div>
									<!-- /col-left -->

								</div>
								<!-- /col-container -->
<br class="clear">
							</div> <!-- .wrap -->                          
                            
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->
					

					<?php endif; ?>
				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">
				
				<?php if (isset($gravapress_email) && $gravapress_email != '') : ?>

					<!-- Sidebar Postbox -->
					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e(
									'Conta Gravatar', 'wp_admin_style'
								); ?></span></h2>

						<div class="inside">
							
							<form name="email_form" method="post" action=""><!-- Se deixar o action vazio ele envia os dados para o arquivo principal do plugin no caso gravapress.php -->
								
								<input type="hidden" name="email_submitted" value="Y">

								<p class="email-box">
									<label for="gravatar_email"><?php esc_attr_e( 'Email', 'wp_admin_style' ); ?></label>
									<input name="gravatar_email" id="gravatar_email" type="email" value="<?php echo $gravapress_email; ?>" class="" />
								</p>

								<p>
									<input class="button-primary" type="submit" name="email_login" value="<?php esc_attr_e( 'Atualizar' ); ?>" />
								</p>

							</form>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				<?php endif; ?>
				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->