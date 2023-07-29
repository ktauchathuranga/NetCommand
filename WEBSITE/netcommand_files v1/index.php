<?php
    require_once "database.php";
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>NetCommand</title>
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
          setInterval(function(){
              $("#refresh").load(window.location.href + " #refresh");
          }, 1000);
      });
    </script>
    
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="NetCommand.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cutive+Mono:400">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "AAAAAA",
		"logo": "images/default-logo.png"
    }</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="NetCommand">
    <meta property="og:type" content="website">
    
    <style>
        body {
            overflow: hidden;
        }

        .u-sheet-1 {
            transform: scale(0.7);
            transform-origin: top;
            height: 100vh;
        }
    </style>
    
    </head>
  <body class="u-body u-xl-mode" data-lang="en">
    <section class="u-clearfix u-container-align-center u-image u-section-1" id="carousel_cbdb" data-image-width="1024" data-image-height="683">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-align-center u-container-align-center u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-grey-80 u-group u-radius-39 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h3 class="u-align-center u-text u-text-1">
              <div id="refresh">
                <?php
                  $sql = "SELECT * FROM toggle_state";
                  $results = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($results);
              
                  if ($row["status"] == 0) {
                      echo '<span style="color: lime;">DEACTIVATED!</span>';
                  } elseif ($row["status"] == 1) {
                      echo '<span style="color: red;">ACTIVATED!</span>';
                  } else {
                      echo "DB ERROR OCCURRED! - #1";
                  }
                ?>
            </div>
            </h3>
            <br>
            <img src="images/logo.png" alt="photo eka na bng!" style="width:140px;height:140px;">
            <h5 class="u-align-center u-custom-font u-text u-text-palette-1-light-1 u-text-2">&nbsp;NetCommand</h5>
            <p class="u-align-center u-text u-text-3">Experience Remote Control Revolution with NetCommand: Unleash Your Power from Anywhere</p>
            <form action="index" method="post">
              <button type="submit" name="toggleButton" class="u-active-white u-align-center u-border-none u-btn u-btn-round u-button-style u-hover-feature u-hover-white u-palette-1-dark-1 u-radius-41 u-text-active-black u-text-body-alt-color u-text-hover-black u-btn-1">PRESS</button>
            </form>
            <quillbot-extension style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></quillbot-extension>
            <quillbot-extension-highlights style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></quillbot-extension-highlights>
          </div>
        </div>
      </div>
      
    </section>
</body></html>

<?php

    if (isset($_POST["toggleButton"])) {
        $sql = "SELECT * FROM toggle_state";
        $results = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($results);
        
        if ($row["status"] == 0) {
            $update = mysqli_query($conn, "UPDATE toggle_state SET `status` = 1 WHERE `id` = 1");
        } elseif ($row["status"] == 1) {
            $update = mysqli_query($conn, "UPDATE toggle_state SET `status` = 0 WHERE `id` = 1");
        } else {
            echo "DATABASE ERROR OCCURRED! - #2";
        }

    }

?>