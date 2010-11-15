<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>

<div class="page-block block-settings-account">
	
	<form action="settings/account" method="post">
								
									<table cellspacing="10px" cellpadding="0px" border="0px" class="form-table">
										
										<tr>
											
											<th colspan="2">
												
												Сменить пароль
												
											</th>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Старый пароль <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<input type="password" class="text" name="authorization-old-password" value="" />
												
												<span class="validation"><?php echo $validation->get('authorization-old-password'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Новый пароль <span class="required">*</span>
												
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
												
												<input type="submit" class="button" name="authorization-submit" value="Сменить" />
												
											</td>
											
										</tr>
																				
									</table>
									
								</form>
			
</div>
	
<?php include(config_essence::get('root_dir') . 'application/view/template/index/footer.php'); ?>