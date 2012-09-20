<?php slot('sidebar')?>
	<?php include_partial('sidebar')?>
<?php end_slot();?>

<div style="margin:20px" >
<table border="1" class="tjs">
<tr>
	<th width="">标题</th>
	<th>tags</th>
	<th>密码</th>
	<th>留言</th>
	<th>浏览</th>
	<th></th>
</tr>

<?php foreach($articles as $article):?>
<tr>
	<td><?php echo link_to($article->getTitle(),'index/article?id='.$article->getId());?>
		<?php if($article->getIsdraft()) echo '(草稿)';?>
	</td>
		<td><?php $tags=$article->getArticleTags();
foreach($tags as $tag){
	echo link_to($tag->getTag(),'tongjishi/deltag?tagid='.$tag->getTagId().'&articleid='.$tag->getArticleId(),array('confirm'=>'确定？'));
	echo ',&nbsp;';}?></td>
	<td>
<?php echo $article->getPwd();?><br>
<?php echo link_to('生成密码', 'tongjishi/GeneratePwd?id='.$article->getId());?><br>
		<?php	echo link_to('删除密码', 'tongjishi/DelPwd?id='.$article->getId());?>	
	</td>
	<td><?php echo $article->getCommentNb();?></td>
	<td><?php echo $article->getViewednb();?></td>
	<td><?php echo link_to('编辑','tongjishi/edit?id='.$article->getId());?> &nbsp; &nbsp; &nbsp; &nbsp; 
			<?php echo link_to('删除','tongjishi/del?id='.$article->getId(),array('confirm'=>'确定？'));?>
</tr>
<?php endforeach;?>

</table>
<?php include_partial('global/page',array('pager'=>$pager));?><br/>
<?php echo link_to('新文章','tongjishi/newarticle');?>

</div>
