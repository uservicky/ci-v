<?php include 'admin_head.php'?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-6">

        <?= anchor("admin/add_article","Add Article",['class' => 'btn btn-primary']); ?>
            <!--a href="/v/admin/add_article" class = "btn btn-lg btn-primary">Add Article</a-->
        </div>
    </div>
    <?php if($error = $this->session->flashdata('feedback')):
            $feedback_class =  $this->session->flashdata('feedback_class');
    ?>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="alert alert-dismissible alert-<?= $feedback_class;?>">
       
                <?= $error; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <th>Sno.</th>
            <th>Title</th>
            <th>Published On</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php $i=$this->uri->segment(3,0);?>
        <?php if(count($articles)): ?>
           <?php foreach($articles as $article):?>
                <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $article->title; ?></td>
                    <td><?= $article->c_date; ?></td>
                    <td>
                    <div class="row">
                        <div class="col-lg-2">
                            <?= anchor("admin/edit_article/{$article->id}","Edit",['class' => 'btn btn-primary']); ?>
                        </div>
                        <div class="col-lg-2">
                            <?= 
                                form_open('admin/delete_article'),
                                form_hidden('article_id',$article->id),
                                form_submit(['name' => 'submit','value' =>'Delete','class' => 'btn btn-danger']),
                                form_close();

                            ?>
                        </div>
                    </div>
                       
                       
                        <!--a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a-->
                    </td>
                </tr>
            <?php endforeach;?>
        <?php else:?>
        <tr>
            <td colspan = "3">
                
                NO RECORD FOUND
            </td>
        </tr>
        <?php endif;?>
        </tbody>
        
       <!-- ul.pagination>(li*4(a))+(li.active(a))+(li*2(a))-->
    </table>
    <?= $this->pagination->create_links(); ?>
</div>
<?php include 'admin_foot.php'?>