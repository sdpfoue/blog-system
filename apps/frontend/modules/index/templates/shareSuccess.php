<?php slot('title');?>
  Share - 
<?php end_slot();?>

<h2>Shared Items On Google Reader</h2>
<script type="text/javascript" src="https://www.google.com/reader/ui/publisher-en.js"></script>
<script type="text/javascript" src="https://www.google.com/reader/public/javascript/user/09307877042901645103/state/com.google/broadcast?n=70&callback=GRC_p(%7Bc%3A%22-%22%2Ct%3A%22%22%2Cs%3A%22false%22%2Cn%3A%22true%22%2Cb%3A%22false%22%7D)%3Bnew%20GRC"></script>
<div style="display:block;text-align:right;"><?php echo link_to('Even More...','http://www.google.com/reader/shared/user/09307877042901645103/state/com.google/broadcast',array('target'=>'_blank'));?></div>
