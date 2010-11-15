<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>

			<div class="page-block block-login">
				
				<form action="<?php echo config_essence::get('root_url') . 'authorization/login'; ?>" method="post">
					
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
								
								Пароль <span class="required">*</span>
								
							</td>
							
							<td class="value">
								
								<input type="password" class="text" name="authorization-password" value="" />
								
								<span class="validation"><?php echo $validation->get('authorization-password'); ?></span>
								
							</td>
								
						</tr>
						
						<tr>
							
							<td colspan="2" class="control">
								
								<input type="submit" class="button" name="authorization-submit" value="Войти" />
								
							</td>
							
						</tr>
						
					</table>
					
				</form>
				
			</div>
				
<?php include(config_essence::get('root_dir') . 'application/view/template/index/footer.php'); ?>