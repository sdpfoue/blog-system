
<?php foreach($articles as $article):?>

<?php include_partial('global/title',array('article'=>$article));?>

		
		
		<div class="fentry">
			<?php echo $content=myUser::cutp($article->getBody(),1500);?>
			<div class="clear"></div>
			<?php if($content!=$article->getBody()):?>
<p> <?php echo link_to('Read all...','index/article?id='.$article->getId());?></p>
			<?php endif;?>
		</div>
		</div>



		
		
<?php endforeach; ?>
<div style="text-align:center">
		  <?php include_partial('global/page',array('pager'=>$pager,'query'=>$query));?>
		</div>
