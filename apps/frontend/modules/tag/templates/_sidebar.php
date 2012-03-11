
<ul>
<?php 
  foreach ($tags as $tag){
    echo '<li>'.link_to2($tag->getName().'('.$tag->getNb().')','tag',array('sf_route' => 'tag', 'sf_subject' => $tag)).'</li>';
  }
  echo '</ul>';
  if($more)
    echo link_to('all tags...','tag/all',array('style'=>"margin-left:5px;"));
  
?>


