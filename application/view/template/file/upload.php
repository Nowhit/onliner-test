<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>

<div class="page-block block-upload">
	
	<form action="" method="post" enctype="multipart/form-data">
		
		<table cellspacing="10px" cellpadding="0px" border="0px" class="form-table">
			
			<tr>
				
				<th colspan="2">
					
					Загрузить
					
				</th>
				
			</tr>
			
			<tr>
				
				<td class="label">
					
					Файл <span class="required">*</span>
					
				</td>
				
				<td class="value">
					
					<input type="file" name="file-file" value="" />
					
					<span class="validation"><?php echo $validation->get('file-file'); ?></span>
					
				</td>
				
			</tr>
			
			<tr>
				
				<td class="label">
					
					Заголовок <span class="required">*</span>
					
				</td>
				
				<td class="value">
					
					<input type="text" class="text" name="file-header" value="<?php echo data_essence::get('post', 'file-header', array('trim')); ?>" />
					
					<span class="validation"><?php echo $validation->get('file-header'); ?></span>
					
				</td>
				
			</tr>
			
			<tr>
				
				<td class="label">
					
					Описание
					
				</td>
				
				<td class="value">
					
					<textarea name="file-content"><?php echo data_essence::get('post', 'file-content', array('trim')); ?></textarea>
					
					<span class="validation"><?php echo $validation->get('file-content'); ?></span>
					
				</td>
				
			</tr>
			
			<tr>
				
				<td colspan="2" class="control">
					
					<input type="submit" class="button" name="file-submit" value="Добавить" />
					
				</td>
				
			</tr>
			
		</table>
		
	</form>
			
</div>
	
<?php include(config_essence::get('root_dir') . 'application/view/template/index/footer.php'); ?>