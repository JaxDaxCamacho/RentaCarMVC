<!DOCTYPE html>
<html lang="en"><link type="text/css" id="dark-mode" rel="stylesheet" href=""><style type="text/css" id="dark-mode-custom-style"></style><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('images/icon.png');?>">

    <title>Rent-a-car</title>

<link href="<?php echo base_url('css/frota.css');?>" rel="stylesheet">
  <!-- font awesome css -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#"><img src="C:\xampp\htdocs\Rent-A-Car\application\views\assets\images\logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        
      </button>

      <div class="navbar-collapse collapse show" id="navbarsExampleDefault" style="">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('home')?>">HOME<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('about')?>">SOBRE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('contact')?>">CONTACTO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"<?php 
            if($this->session->userdata('UID')!=null){echo 'hidden';}?>  href="<?php echo base_url('signin')?>">SIGN IN</a>
          </li>
          <?php 
            if($this->session->userdata('UID')!=null){
              echo '<li class="nav-item"><a class="nav-link" href="profile">'.$this->session->userdata('UID').'</a></li>';
            }
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FROTA AUTOMOVEL</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item"href="<?php echo base_url('frota')?>">Ver a Frota</a>
              <?php if($this->session->userdata('Utype')==1){echo '<a class="dropdown-item" href="adicionar">Adicionar novo</a>';} ?>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
