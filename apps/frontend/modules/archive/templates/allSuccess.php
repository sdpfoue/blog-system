<div style="margin:55px 0 0 0;">
<?php foreach($archives as $archive):?>
    <?php echo link_to2($archive->getMonth().'('.$archive->getNb().')','archive',array('sf_route' => 'archive', 'sf_subject' => $archive));?>
  ,&nbsp;&nbsp;

<?php endforeach;?>
</div>
<?php slot('title')?>
All Archives - 
<?php end_slot();?>