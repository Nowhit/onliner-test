<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>
				
							<div class="page-block block-signin">
								
								<form action="authorization/signin" method="post">
								
									<table cellspacing="10px" cellpadding="0px" border="0px" class="form-table">
										
										<tr>
											
											<th colspan="2">
												
												Аккаунт
												
											</th>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Логин <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-login" value="<?php echo data_essence::get('post', 'authorization-login', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-login'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												E-mail <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-email" value="<?php echo data_essence::get('post', 'authorization-email', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-email'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Пароль <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<input type="password" class="text" name="authorization-password" value="" />
												
												<span class="validation"><?php echo $validation->get('authorization-password'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Подтвердить пароль <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<input type="password" class="text" name="authorization-confirm-password" value="" />
												
												<span class="validation"><?php echo $validation->get('authorization-confirm-password'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td colspan="2" class="control">
												
												<input type="submit" class="button" name="authorization-submit" value="Зарегистрироваться" />
												
											</td>
											
										</tr>
																				
									</table>
									
								</form>
								
							</div>
							
<?php include(config_essence::get('root_dir') . 'application/view/template/index/footer.php'); ?>