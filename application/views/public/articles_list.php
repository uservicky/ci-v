<?php include 'public_header.php'; ?>
<div class="containter">
    <h1>All Articles</h1>
 
   <table class="table">
   <thead>
     <tr>
       <td>S. No.</td>
       <td>Article Title</td>
       <td>Published On</td>
     </tr>
   </thead>
   <tbody>
    <?php if(count($articles)):?>
        <?php $count = $this->uri->segment(3,0);?>
        <?php foreach($articles as $article):?>
     <tr>
           <td><?= ++$count; ?></td>
           <td><?= anchor("user/article/{$article->id}",$article->title);?></td>
           <td><?=date('d M y H:i:s',strtotime($article->c_date));?></td>
     </tr>
     <?php endforeach;?>
      <?php else: ?>
        <td colspan="3">No Record Found.</td>
      <?php endif; ?>
   </tbody>
  </table>
  <?= $this->pagination->create_links(); ?>
</div>
<?php include 'public_footer.php'; ?>