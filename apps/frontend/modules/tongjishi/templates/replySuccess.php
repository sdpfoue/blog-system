<?php slot('sidebar')?>
  <?php include_partial('sidebar')?>
<?php end_slot();?>

<?php echo $comment->getName();?> @ <?php echo $comment->getCreatedAt();?><br/>
内容：<?php echo nl2br($comment->getBody());?>
<hr/>

<form method="post">
<textarea name="reply" id="reply" cols="60" rows="10"><?php echo $comment->getReply();?></textarea>
<br/><input type="submit" value="提交"/>
</form>
