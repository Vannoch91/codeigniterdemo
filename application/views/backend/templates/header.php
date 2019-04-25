<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php
      echo isset($title)?$title:'MY TITLE BAR';
    ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/sidebar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- This is Jquery Confirm -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- This is sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .footer {
            position: fixed;
            bottom: 0%;
            background: gray;
            width: 100%;
            padding: 10px;
        }
        
        .navbar {
            margin-bottom: 2px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                     <?php
                     if(isset($this->session->userdata['logged_in'])) { ?>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> 
                            <?php
                                $info = $this->session->userdata['logged_in'];
                                    echo $info['id'].'---'.$info['email'];
                                
                            ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(isset($this->session->userdata['logged_in'])){ ?>
                    <li><a href="<?php echo base_url();?>Login/logout"><span class="glyphicon glyphicon-log-in"></span> Sigout</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

</body>
<script src="<?php echo base_url();?>/assets/js/sidebar.js"></script>

</html>