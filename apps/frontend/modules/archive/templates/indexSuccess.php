<?php slot('title');?>
  <?php echo $tag;?> - 
<?php end_slot();?>

<h2>Archive for <?php echo $tag;?></h2>
<?php foreach($articles as $article):?>
<?php include_partial('global/title',array('article'=>$article));?>
</div>
<?php endforeach; ?>