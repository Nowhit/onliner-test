<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>

<div class="page-block block-files">
	
	<h5 class="block-title">Файлы пользователя <?php echo $total_files ? '(' . $total_files . ')' : ''; ?></h5>
				
	<?php if($files): ?>
		
		<ul class="block-items">
			
				<li class="block-item-header">
					
					<table width="100%">
						
						<tr>
							
							<td class="file-origin-name" width="<?php echo $me->get_id() == $user->get_id() ? '65%' : '75%' ;?>">
								
								<?php if($current_order == 'file_origin_name'): ?> 
									
									<a href="<?php echo $user->get_url(); ?>/<?php echo $current_page;?>/file_origin_name/<?php echo $current_order_direction == 'desc' ? 'asc' : 'desc'; ?>/">
										
										<i>Имя файла</i>
										
									</a>
									
								<?php else: ?>
									
									<a href="<?php echo $user->get_url(); ?>/<?php echo $current_page;?>/file_origin_name/desc/">
										
										Имя файла
										
									</a>
									
								<?php endif; ?>
								
							</td>
							
							<td class="file-add-datetime" width="15%">
								
								<?php if($current_order == 'file_add_datetime'): ?> 
									
									<a href="<?php echo $user->get_url(); ?>/<?php echo $current_page;?>/file_add_datetime/<?php echo $current_order_direction == 'desc' ? 'asc' : 'desc'; ?>/">
										
										<i>Дата добавления</i>
										
									</a>
									
								<?php else: ?>
									
									<a href="<?php echo $user->get_url(); ?>/<?php echo $current_page;?>/file_add_datetime/desc/">
										
										Дата добавления
										
									</a>
									
								<?php endif; ?>
								
							</td>
							
							<td class="file-download-url" width="10%">
								
								&nbsp;
								
							</td>
							
							<?php if($me->get_id() == $user->get_id()): ?>
							
								<td class="file-delete-url" width="10%">
									
									&nbsp;
									
								</td>
							
							<?php endif; ?>
							
						</tr>
						
					</table>
								
				</li>
		
			<?php foreach($files as $file): ?>
							
				<li class="block-item">
					
					<table width="100%">
						
						<tr>
							
							<td class="file-origin-name" width="<?php echo $me->get_id() == $user->get_id() ? '65%' : '75%' ;?>">
								
								<a href="<?php echo $file->get_url(); ?>">
									
									<?php echo $file->get_origin_name(); ?>
									
								</a>
								
							</td>
							
							<td class="file-add-datetime" width="15%">
								
								<?php echo $file->get_add_datetime(); ?>
								
							</td>
							
							<td class="file-download-url" width="10%">
								
								<a href="<?php echo $file->get_download_url(); ?>">Скачать</a>
								
							</td>
							
							<?php if($me->get_id() == $user->get_id()): ?>
							
								<td class="file-delete-url" width="10%">
									
									<a href="<?php echo $file->get_delete_url(); ?>">Удалить</a>
									
								</td>
							
							<?php endif; ?>
							
						</tr>
						
					</table>
								
				</li>
							
			<?php endforeach; ?>
			
			<?php
			
				if($pages > 1):
			
			?>
			
				<li class="block-control">
					
					Страницы:&nbsp;
					
					<?php
						
						for($i = 1; $i <= $pages; $i++):
						
					?>
						
						<?php
						
							if($i == $current_page):
							
						?>
						
							<i><?php echo $i; ?></i>&nbsp;
							
						<?php
						
							else:
							
						?>
						
							<a href="<?php echo $user->get_url(); ?>/<?php echo $i;?>/<?php echo $current_order; ?>/<?php echo $current_order_direction; ?>/"><?php echo $i;?></a>&nbsp;
							
						<?php
						
							endif;
							
						?>
						
					<?php
						
						endfor;
						
					?>
					
				</li>
			
			<?php
			
				endif;
			
			?>
					
		</ul>
					
	<?php else: ?>
		
		<br />
		
		Нет файлов
					
	<?php endif; ?>
	
</div>
	
<?php include(config_essence::get('root_dir') . 'application/view/template/index/footer.php'); ?>