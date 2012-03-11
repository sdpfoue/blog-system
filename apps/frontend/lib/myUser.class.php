<?php

class myUser extends sfBasicSecurityUser
{
  //constant public  $table=array('&nbsp;'=>'&#160;','&hellip;'=>'&#8230;');
  static function cutword($word,$num)
  {
    if(strlen($word)>$num) 
      $word=mb_substr($word,0,$num,'utf-8').'...';
    return $word;
  }
  
  static function cutp($words,$num=500)
  {
    $content='';
    $count=0;
    $words=split('</p>',$words);
    foreach($words as $word)
    {
      if($word)
        $content=$content.$word.'</p>';
      $count+=strlen($word);
      if($count>$num) break;
    }
    return $content;
  }
  
}



?>
