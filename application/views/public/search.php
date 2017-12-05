<?php include 'public_header.php'; ?>

    <h1>Search Result</h1>
 
   <table class="table">
   <thead>
     <tr>
       <td>S. No.</td>
       <td>Article Title</td>
       <td>Published On</td>
     </tr>
   </thead>
   <tbody>
    <? if(count($articles)):?>
        <?php $count = $this->uri->segment(4,0);?>
     <tr>
     
        <?php foreach($articles as $article):?>
           <td><?= ++$count; ?></td>
           <td><?=$article->title;?></td>
           <td><?=$article->c_date;?></td>
     </tr>
     <?php endforeach;?>
      <?else: ?>
        <td colspan="3">No Record Found.</td>
      <? endif; ?>
   </tbody>
  </table>
  <?= $this->pagination->create_links(); ?>

<?php include 'public_footer.php'; ?>