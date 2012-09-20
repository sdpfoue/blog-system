
<?php foreach($articles as $article):?>

<?php include_partial('global/title',array('article'=>$article));?>

		
		
		<div class="fentry">
			<?php 
					$pwd = $article->getPwd();	
					if(isset($pwd)){ ?>
						<p>该文章被密码保护，如继续阅读请动用一切手段向博主索要密码</p>
						<form action="<?php echo url_for('index/article?id='.$article->getId());?>" method="post" accept-charset="utf-8">
					   <input type="text" name="pwd" id="pwd" value="" />		
						 <input type="submit" value="Submit" />
						</form>
			<?php }else{ ?>
				<?php echo $content=myUser::cutp($article->getBody(),1500);?>
				<div class="clear"></div>
				<?php if($content!=$article->getBody()):?>
					<p> <?php echo link_to('Continue reading...','index/article?id='.$article->getId());?></p>
				<?php endif;?>
			<?php }?>	
			</div>
		</div>		
<?php endforeach; ?>
<div style="text-align:center">
		  <?php include_partial('global/page',array('pager'=>$pager,'query'=>$query));?>
		</div>
