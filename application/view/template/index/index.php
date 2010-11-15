<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>

<div class="page-block block-files">

	<h5 class="block-title">Последние загруженные файлы</h5>
				
	<?php if($files): ?>
					
		<ul class="block-items">
			
			<li class="block-item-header">
					
					<table width="100%">
						
						<tr>
							
							<td class="file-origin-name" width="75%">
								
								Имя файла
								
							</td>
							
							<td class="file-add-datetime" width="15%">
								
								Дата добавления
								
							</td>
							
							<td class="file-download-url" width="10%">
								
								&nbsp;
								
							</td>
							
						</tr>
						
					</table>
								
				</li>
			
			<?php foreach($files as $file): ?>
							
				<li class="block-item">
					
					<table width="100%">
						
						<tr>
							
							<td class="file-origin-name" width="75%">
								
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
							
						</tr>
						
					</table>
								
				</li>
							
			<?php endforeach; ?>
						
			<li class="block-control">
					
				<a href="files/view/">Показать все загруженные файлы</a>
					
			</li>
					
		</ul>
					
	<?php else: ?>
		
		<br />
		
		Нет файлов
					
	<?php endif; ?>
				
</div>
		
<div class="page-block block-users">
	
	<h5 class="block-title">Последние зарегестрированные пользователи</h5>
	
	<?php
		
		if($users):
		
	?>
	
		<ul class="block-items">
			
			<?php
				
				foreach($users as $index => $user):
					
			?>
					
					<li class="block-item <? echo $index%7 == 0 ? 'first-column' : '' ; ?>">
						
						<a href="<?php echo $user->get_url(); ?>">
							
							<?php echo $user->get_login(); ?> 
							
						</a>
						
					</li>
					
			<?php
				
				endforeach;
				
			?>
			
			<li class="block-control">
				
				<a href="users/view/">Показать всех пользователей</a>
				
			</li>
			
		</ul>
		
	<?php
			
		else:
		
	?>
		
		<br />
		
		Нет пользователей
	
	<?php
			
		endif;
	
	?>
			
</div>
	
<?php include(config_essence::get('root_dir') . 'application/view/template/index/footer.php'); ?>