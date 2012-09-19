<?php slot('sidebar')?>
  <?php include_partial('sidebar')?>
<?php end_slot();?>

<div style="margin:20px" >
<table border="1" class="tjs">
<tr>
  <th>作者</th>
  <th>内容</th>
 
  <th>文章</th>
 
</tr>

<?php foreach($articles as $article):?>
<tr>
  <td><?php echo $article->getName();?><br/>
    <?php echo link_to($article->getIp(),'tongjishi/comment?ip='.$article->getIp());?>
    <?php echo $article->getIpaddr();?>

  </td>
  <td>
      <?php echo nl2br($article->getBody());?><br/>
    
    <?php if($article->getReply()):?>
      <hr style="color:green; width:50%;">
      <?php echo nl2br($article->getReply());?><br/>
    <?php endif;?>
    <br/>
    <?php echo link_to('删除','tongjishi/delcomment?id='.$article->getId());?>
      <?php echo link_to('回复','tongjishi/reply?id='.$article->getId());?>
      <?php echo mail_to($article->getEmail());?>
        <?php echo $article->getCreatedAt();?>
  </td>
  <td><?php echo link_to($article->getArticle()->getTitle(),
          'index/article?id='.$article->getArticleId());?>
       <?php echo link_to(image_tag('list.png'),'tongjishi/comment?aid='.$article->getArticleId());?></td>

</tr>
<?php endforeach;?>

</table>
<?php include_partial('global/page',array('pager'=>$pager));?><br/>
<?php echo link_to('已删除的评论','tongjishi/comment?isdel=1');?>

</div>