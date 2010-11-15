<?php include(config_essence::get('root_dir') . 'application/view/template/index/header.php'); ?>
		
<div class="page-block block-users">
	
	<h5 class="block-title" >Пользователи <?php echo $total_users ? '(' . $total_users . ')' : ''; ?></h5>
	
	<?php
		
		if($users):
		
	?>
	
		<ul class="block-items" id="block-users-items">
			
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
						
							<b><?php echo $i; ?></b>&nbsp;
							
						<?php
						
							else:
							
						?>
						
							<a href="users/view/<?php echo $i;?>/"><?php echo $i;?></a>&nbsp;
							
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