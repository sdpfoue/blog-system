<div style="margin:55px 0 0 0;">
<?php foreach($tags as $tag):?>
  <?php echo link_to2($tag->getName().'('.$tag->getNb().')','tag',array('sf_route' => 'tag', 'sf_subject' => $tag));?>
  ,&nbsp;&nbsp;

<?php endforeach;?>
</div>
<?php slot('title')?>
All Tags - 
<?php end_slot();?>