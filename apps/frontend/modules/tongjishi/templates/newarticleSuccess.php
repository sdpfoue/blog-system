<?php //echo javascript_include_tag('tiny_mce/tiny_mce')
      echo javascript_include_tag('fckeditor/fckeditor.js') ?>
<script type="text/javascript">
window.onload = function()
{
var oFCKeditor = new FCKeditor( 'article_body' ) ;
oFCKeditor.BasePath = "/js/fckeditor/" ;
oFCKeditor.Height="450";
oFCKeditor.ReplaceTextarea() ;


}
</script>


    
<?php use_helper('Form')?>
<?php slot('sidebar')?>
  <?php include_partial('sidebar')?>
<?php end_slot();?>

<br/>
<form method="post" style="height:auto;">
  <?php echo $form->renderGlobalErrors(); ?>
  <?php echo $form['title']->render(); ?><br/><br/>
  <?php echo $form['body']->render();?><br/><br/>
  存为草稿<input type="checkbox" name="isdraft" value="1" 
          <?php if($checked) echo 'checked';?> /><br/><br/>
  tags: <input name="tag" id="tag"/>
  
  <input type="hidden" name="article[id]" value="<?php echo $article?>" />
<?php echo submit_tag('submit');?><?php echo submit_tag('save');?>
</form>