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

							

							<div class="wrap">
								
								<div id="col-container">

									<!-- Right Col -->
									<div id="col-right">

										<div class="col-wrap">
											
											<div class="inside">
													
												<!-- Imagem destaque -->
												<a href="<?php echo $gravapress_profile->{'entry'}[0]->{'thumbnailUrl'} . '?s=370';?>" target="_blank">
													<img class="main-image" src="<?php echo $gravapress_profile->{'entry'}[0]->{'thumbnailUrl'} . '?s=370';?>" alt="Imagem de Perfil">
												</a>
												
												<!-- Galeria de Imagens -->
												<h1><?php esc_attr_e( 'Photo Gallery', 'wp_admin_style' ); ?></h1>
												<div class="gallery-image">

														<?php
                                                            $total_photos = sizeof( $gravapress_profile->{'entry'}[0]->{'photos'} );                                                            
                                                            for( $i = 0; $i < $total_photos; $i++ ) : 
                                                        ?>
                                                        
                                                        <a href="<?php echo $gravapress_profile->{'entry'}[0]->{'photos'}[$i]->{'value'}; ?>" target="_blank">
                                                            <img class="gallery-gravatar-image" src="<?php echo $gravapress_profile->{'entry'}[0]->{'photos'}[$i]->{'value'}; ?>" alt="Gravatar User Image Profile">                                                        
                                                        </a>

                                                        <?php endfor; ?>

												</div>

												<!-- WebSites -->
												<h1><?php esc_attr_e( 'Websites', 'wp_admin_style' ); ?></h1>
												<div class="sites-image">
													<?php
                                                        $total_urls = sizeof( $gravapress_profile->{'entry'}[0]->{'urls'} );                                                            
                                                        for( $i = 0; $i < $total_urls; $i++ ) : 
													?>                                                        
                                                        
                                                    <a href="<?php echo $gravapress_profile->{'entry'}[0]->{'urls'}[$i]->{'value'}; ?>" target="_blank">
                                                        <img src="<?php echo $plugin_url . '/images/link.png'; ?>" width="100px" height="100px" >                                                                                                                
                                                        <div class="caption"><?php echo $gravapress_profile->{'entry'}[0]->{'urls'}[$i]->{'title'}; ?></div>
                                                    </a>
                                                    
                                                    <?php endfor; ?> 
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

											<h1><?php esc_attr_e( 'Informações do Usuário', 'wp_admin_style' ); ?></h1>
											
											<div class="inside">

												<h1><?php esc_attr_e( $gravapress_profile->{'entry'}[0]->{'name'}->{'formatted'}, 'wp_admin_style' ); ?></h1>
												<?php esc_attr_e( $gravapress_profile->{'entry'}[0]->{'currentLocation'}, 'wp_admin_style' ); ?>
												<p><?php echo $gravapress_profile->{'entry'}[0]->{'aboutMe'};?></p>
											
											</div>
										
										</div>
										<!-- /col-wrap -->

										<!-- Social -->
										<div class="col-wrap">

											<h1><?php esc_attr_e( 'Social', 'wp_admin_style' ); ?></h1>
											
											<div class="inside">

												<?php $total_accounts = sizeof( $gravapress_profile->{'entry'}[0]->{'accounts'});

													for( $i = 0; $i < $total_accounts; $i++) :
												?>
	                                            	<h2>                                                    
	                                                    <?php esc_attr_e( ucfirst($gravapress_profile->{'entry'}[0]->{'accounts'}[$i]->{'shortname'}), 'wp_admin_style' ); ?>                                                    
	                                                    <br />                                                    
	                                                    <small>
	                                                        <a href="<?php echo $gravapress_profile->{'entry'}[0]->{'accounts'}[$i]->{'url'} ; ?>" target="_blank">
	                                                            Ver Perfil
	                                                        </a>
	                                                    </small>
	                                                </h2> 

	                                                <hr />
												<?php endfor; ?>
											
											</div>
										
										</div>
										<!-- /col-wrap -->

										<!-- Contact -->
										<div class="col-wrap">

											<h1><?php esc_attr_e( 'Contato', 'wp_admin_style' ); ?></h1>
											
											<div class="inside">

												<!-- Site -->

                                                <?php if( $gravapress_profile->{'entry'}[0]->{'urls'}) :

                                                    $total_ims = sizeof($gravapress_profile->{'entry'}[0]->{'urls'});
                                                    for( $i = 0; $i < $total_ims; $i++ ) :

                                                ?>

                                                <h2>
                                                    <?php esc_attr_e( ucfirst($gravapress_profile->{'entry'}[0]->{'urls'}[$i]->{'title'}), 'wp_admin_style' ); ?>
                                                    <br />
                                                    <small>
                                                        
                                                        <a href="<?php echo $gravapress_profile->{'entry'}[0]->{'urls'}[$i]->{'value'} ; ?>" target="_blank">
	                                                            <?php esc_attr_e( $gravapress_profile->{'entry'}[0]->{'urls'}[$i]->{'value'} ); ?>
	                                                    </a>

                                                    </small>
                                                </h2>

												<hr />

												<?php 
                                                    endfor;
                                                    endif; 
                                                ?>  

                                                <!-- Telefones -->                                                                                                                                         

                                                 <?php if( $gravapress_profile->{'entry'}[0]->{'phoneNumbers'}) :

                                                    $total_ims = sizeof($gravapress_profile->{'entry'}[0]->{'phoneNumbers'});
                                                    for( $i = 0; $i < $total_ims; $i++ ) :

                                                ?>

                                                <h2>
                                                    <?php esc_attr_e( ucfirst($gravapress_profile->{'entry'}[0]->{'phoneNumbers'}[$i]->{'type'}) . ' Phone', 'wp_admin_style' ); ?>
                                                    <br />
                                                    <small>
                                                        <?php esc_attr_e( $gravapress_profile->{'entry'}[0]->{'phoneNumbers'}[$i]->{'value'} ); ?>
                                                    </small>
                                                </h2>            

                                                <hr />

                                                <?php                                         
                                                    endfor;
                                                    endif; 
                                                ?>  
											
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
					<!--Json Profile Postbox -->
					<?php if( $display_json == true ) : ?>
					<div class="postbox">

						
						<h2 class="hndle"><span><?php esc_attr_e( 'SAIDA JSON', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">

							<pre>
								<code>
									<?php var_dump( $gravapress_profile ); ?>
								</code>
							</pre>
							
						</div>
					</div>
					<?php endif; ?>
					<!-- Json postbox -->
					
					<?php endif; ?>


					
				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">
				
				<?php if (isset($gravapress_email) && $gravapress_email != '') : ?>

					<!-- Sidebar Postboxx -->
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