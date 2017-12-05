<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles List</title>
  <?= link_tag('asset/css/bootstrap.css')?>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Articles</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
      <!--form class="navbar-form navbar-left" role="search"-->
      <?= form_open('user/search',['class'=>'navbar-form navbar-left', 'role'=>'search']);?>
        <div class="form-group">
          <input type="text" name = "query" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      <!--/form-->
      <?= form_close();?>
      <?= form_error('query',"<p class = 'navbar-text ' style = 'color:red;'>",'</p>')?>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <!--a href="<?php base_url('user/logout');?>">login</a-->
          <?=  anchor('user/login_page','Login'); ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
    