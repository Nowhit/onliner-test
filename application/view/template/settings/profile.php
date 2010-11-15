<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>
				
							<div class="page-block block-signin">
								
								<form action="settings/profile" method="post" enctype="multipart/form-data">
								
									<table cellspacing="10px" cellpadding="0px" border="0px" class="form-table">
										
										<tr>
											
											<th colspan="2">
												
												Аватар
												
											</th>
											
										</tr>
										
										<tr>
											
											<td colspan="2" class="image">
												
												<img src="<?php echo $me->get_avatar() ? $me->get_avatar() : config_essence::get('root_url') . 'application/view/image/avatar.jpg'; ?>" width="200px" />
												
												<br />
												
												<input type="file" name="authorization-avatar" value="" />
												
											</td>
											
										</tr>
										
										<tr>
											
											<td colspan="2" class="separator"> 
											
												&nbsp; 
												
											</td>
											
										</tr>
										
										<tr>
											
											<th colspan="2">
												
												Персональная информация
												
											</th>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Имя <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-first-name" value="<?php echo data_essence::get('post', 'authorization-first-name', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-first-name'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Фамилия <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-last-name" value="<?php echo data_essence::get('post', 'authorization-last-name', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-last-name'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Пол <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<select name="authorization-gender">
													
													<option value="0" <?php echo data_essence::get('post', 'authorization-gender', array('trim')) == '0' ? 'selected="selected"' : ''; ?>>Выберите</option>
													
													<option value="M" <?php echo data_essence::get('post', 'authorization-gender', array('trim')) == 'M' ? 'selected="selected"' : ''; ?>>Мужской</option>
													
													<option value="F" <?php echo data_essence::get('post', 'authorization-gender', array('trim')) == 'F' ? 'selected="selected"' : ''; ?>>Женский</option>
													
												</select>
												
												<span class="validation"><?php echo $validation->get('authorization-gender'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Дата рождения <span class="required">*</span>
												
											</td>
											
											<td class="value">
												
												<select name="authorization-birth-day">
													
													<option value="0" <?php echo data_essence::get('post', 'authorization-birth-day', array('trim')) == '0' ? 'selected="selected"' : ''; ?>>День</option>
													
													<?php 
													
														for($i = 1; $i <= 31; $i++):
														
													?>
													
														<option value="<?php echo $i < 10 ? '0' . $i : $i; ?>" <?php echo (int) data_essence::get('post', 'authorization-birth-day', array('trim')) == $i ? 'selected="selected"' : ''; ?>><?php echo $i < 10 ? '0' . $i : $i; ?></option>
															
													<?php
													
														endfor;
													
													?>		
													
												</select>
												
												<select name="authorization-birth-month">
													
													<option value="0" <?php echo data_essence::get('post', 'authorization-birth-month', array('trim')) == '0' ? 'selected="selected"' : ''; ?>>Месяц</option>
													
													<?php 
													
														for($i = 1; $i <= 12; $i++):
														
													?>
													
														<option value="<?php echo $i < 10 ? '0' . $i : $i; ?>" <?php echo (int) data_essence::get('post', 'authorization-birth-month', array('trim')) == $i ? 'selected="selected"' : ''; ?>><?php echo $i < 10 ? '0' . $i : $i; ?></option>
															
													<?php
													
														endfor;
													
													?>		
													
												</select>
												
												<select name="authorization-birth-year">
													
													<option value="0" <?php echo data_essence::get('post', 'authorization-birth-year', array('trim')) == '0' ? 'selected="selected"' : ''; ?>>Год</option>
													
													<?php 
													
														for($i = 2010; $i >= 1960; $i--):
														
													?>
													
														<option value="<?php echo $i; ?>" <?php echo data_essence::get('post', 'authorization-birth-year', array('trim')) == $i ? 'selected="selected"' : ''; ?>><?php echo $i; ?></option>
															
													<?php
													
														endfor;
													
													?>		
													
												</select>
												
												<span class="validation"><?php echo $validation->get('authorization-birth-day'); ?></span>
												
												<span class="validation"><?php echo $validation->get('authorization-birth-month'); ?></span>
												
												<span class="validation"><?php echo $validation->get('authorization-birth-year'); ?></span>
												
												<span class="validation"><?php echo $validation->get('authorization-birth-date'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td colspan="2" class="separator"> 
											
												&nbsp; 
												
											</td>
											
										</tr>
										
										<tr>
											
											<th colspan="2">
												
												Контакты
												
											</th>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Страна
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-contact-country" value="<?php echo data_essence::get('post', 'authorization-contact-country', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-contact-country'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Город
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-contact-city" value="<?php echo data_essence::get('post', 'authorization-contact-city', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-contact-city'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Адрес
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-contact-address" value="<?php echo data_essence::get('post', 'authorization-contact-address', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-contact-address'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												Телефон
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-contact-phone" value="<?php echo data_essence::get('post', 'authorization-contact-phone', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-contact-phone'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												E-mail
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-contact-email" value="<?php echo data_essence::get('post', 'authorization-contact-email', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-contact-email'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td class="label">
												
												ICQ
												
											</td>
											
											<td class="value">
												
												<input type="text" class="text" name="authorization-contact-icq" value="<?php echo data_essence::get('post', 'authorization-contact-icq', array('trim')); ?>" />
												
												<span class="validation"><?php echo $validation->get('authorization-contact-icq'); ?></span>
												
											</td>
											
										</tr>
										
										<tr>
											
											<td colspan="2" class="control">
												
												<input type="submit" class="button" name="authorization-submit" value="Изменить профиль" />
												
											</td>
											
										</tr>
																				
									</table>
									
								</form>
								
							</div>
							
<?php include(config_essence::get('root_dir') . 'application/view/template/index/footer.php'); ?>