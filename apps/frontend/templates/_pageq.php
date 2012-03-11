<div style="width=100; text-align:center; margin-top:10px;"> 
  <?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
      <a href="?page=1<?php echo $sf_data->getRaw('query');?>">
        <?php echo image_tag('first.png', 'alt=First title=First') ?>
      </a>
   
      <a href="?page=<?php echo $pager->getPreviousPage().$sf_data->getRaw('query') ?>">
        <?php echo image_tag('previous.png', 'alt=Previous title=Previous') ?>
      </a>
     &nbsp;
      <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($page == $pager->getPage()): ?>
          <?php echo $page ?>
        <?php else: ?>
          <a href="?page=<?php echo $page.$sf_data->getRaw('query') ?>"><?php echo $page ?></a>
        <?php endif; ?>&nbsp;
      <?php endforeach; ?>
     
          
     
      <a href="?page=<?php echo $pager->getNextPage().$sf_data->getRaw('query') ?>">
        <?php echo image_tag('next.png', 'alt=Next title=Next') ?>
      </a>
     
      <a href="?page=<?php echo $pager->getLastPage() .$sf_data->getRaw('query')?>">
        <?php echo image_tag('last.png', 'alt=Last title=Last') ?>
      </a>
    </div>
  <?php endif;?>
</div>
