
<ul>
<?php 
  foreach ($articles as $article){
    echo '<li>'.link_to($article->getTitle(),'index/article?id='.$article->getId(),array('title'=>$article->getTitle())).'</li>';
  }
  echo '</ul>';
  
  
?>
