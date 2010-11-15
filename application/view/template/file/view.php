<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>

<div class="page-block block-file">
	
	Заголовок: <i><?php echo $file->get_header(); ?></i>
	
	<br /><br />
	
	Имя файла: <i><?php echo $file->get_origin_name(); ?></i>
	
	<br /><br />
								
	Дата добавления: <i><?php echo $file->get_add_datetime(); ?></i>
	
	<br /><br />
								
	Описание: <i><?php echo $file->get_content() ? nl2br($file->get_content()) : 'Без описания'; ?></i>
	
	<br /><br /><br />
								
	<a href="<?php echo $file->get_download_url(); ?>">Скачать</a> <?php if($file->get_user_id() == $me->get_id()): ?> | <a href="<?php echo $file->get_delete_url(); ?>">Удалить</a> <?php endif; ?>
	
</div>

<?php if($me): ?>

	<div class="page-block block-comments">
		
		<h5 class="block-title">Комментарии <?php echo $file->get_total_comments() > 0 ? '(' . $file->get_total_comments() . ')' : '' ; ?></h5>
		
		<ul class="block-items">
			
			<?php if($file->get_comments()): ?>
				
				<?php foreach ($file->get_comments() as $comment): ?>
					
					<li class="block-item level-1">
						
						<h5><i><?php echo $comment->get_add_datetime(); ?></i> - <?php echo $comment->get_user_login(); ?></h5>
						
						<?php echo nl2br($comment->get_content()); ?>
						
						<br /><br />
						
						<form action="<?php echo $comment->get_reply_url(); ?>" method="post">
							
							<textarea name="comment-content"></textarea>
							
							<br /><br />
									
							<input type="submit" name="comment-submit" value="Ответить" />
							
						</form>
						
					</li>
					
					<?php if($comment->get_subcomments()): ?>
					
						<?php foreach ($comment->get_subcomments() as $subcomment): ?>
							
							<li class="block-item level-2">
						
								<h5><i><?php echo $subcomment->get_add_datetime(); ?></i> - <?php echo $subcomment->get_user_login(); ?></h5>
								
								<?php echo nl2br($subcomment->get_content()); ?>
								
							</li>
							
						<?php endforeach; ?>
					
					<?php endif; ?>
					
				<?php endforeach; ?>
				
			<?php else: ?>
				
				<li class="empty-item">Нет комментариев</li>
				
			<?php endif; ?>
		
		</ul>
		
	</div>
	
	<div class="page-block block-add-comment">
				
		<form action="file/add_comment/<?php echo $file->get_id(); ?>/0" method="post">
				
			<textarea name="comment-content"></textarea>
					
			<br /><br />
					
			<input type="submit" name="comment-submit" value="Добавить комментарий" />
					
		</form>
				
	</div>

<?php endif; ?>


<?php include(config_essence::get('root_dir') . 'application/view/template/index/footer.php'); ?>