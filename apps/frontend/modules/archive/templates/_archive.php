
<ul>
<?php 
  foreach ($archives as $archive){
    echo '<li>'.link_to2($archive->getMonth().'('.$archive->getNb().')','archive',array('sf_route' => 'archive', 'sf_subject' => $archive)).'</li>';
  }
  echo '</ul>';
  if($more)
    echo link_to('all archives...','archive/all',array('style'=>"margin-left:5px;"));
  
?>
