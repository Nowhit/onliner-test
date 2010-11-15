<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
	
		<base href="<?=config_essence::get('root_url')?>" />
		
		<title>Onliner</title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<link rel="stylesheet" type="text/css" href="application/view/css/styles.css" />
		
		<script type="text/javascript" language="javascript" src="application/view/javascript/jquery.js"></script>
		
		<script type="text/javascript" language="javascript" src="application/view/javascript/scripts.js"></script>
		
	</head>
	
	<body>
		
		<div class="page">
		
			<div class="page-block block-header">
				
				<table cellspacing="0px" cellpadding="0px" border="0px" width="100%">
					
					<tr>
						
						<td class="block-breadcrumb">
							
							<?php echo isset($breadcrumb) ? $breadcrumb : '' ; ?>
							
							<?php echo isset($breadcrumb) && isset($message) ? ' : ' : ''; ?>
							
							<?php echo isset($message) ? $message : '' ; ?>
							
						</td>
						
						<td class="block-authorization">
							
							<?php
								
								if($me):
								
							?>
							
							<a href="<?php echo $me->get_url(); ?>"><?php echo $me->get_login(); ?></a> &nbsp; [<a href="authorization/logout">Выйти</a>]
							
							<?php
								
								else:
								
							?>
							
							<a href="authorization/login">Войти</a> | <a href="authorization/signin">Зарегистрироваться</a>
							
							<?php
								
								endif;
								
							?>
							
						</td>
						
					</tr>
					
					<tr>
						
						<td colspan="2" class="block-logotype">
							
							<a href=""><img src="application/view/image/logotype.jpg" /></a>
							
						</td>
							
					</tr>
					
				</table>
		
			</div>
			
			<?php
				
				if($me):
				
			?>
			
				<div class="page-block block-menu">
					
					<ul class="block-items">
						
						<li class="block-item">
						
							<a href="file/upload/">
								
								Загрузить файл
								
							</a>
							
						</li>
						
					</ul>
					
				</div>
			
			<?php
			
				endif;
				
			?>