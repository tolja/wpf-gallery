<?php
session_start();

include('classes/gallery.php');

include('classes/user.php');

$user = new User();

//check if already logged in move to home page
if (!$user->is_logged_in()) {
    header('Location: index.php');
}

$gallery = new GalleryMaker();

$images       = $gallery->getImages($_SESSION['userId']);
$amountImages = sizeof($images);


//define page title
$title = 'Bilder verwalten';

//include header template
require('layout/header.php');
?>

    <div class="container-fluid">
        <div class="content">
            <?php
            require('layout/nav.php');
            ?>

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-12">
                    <div class="inner">
                        <h2><?php echo $title ?></h2>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-4">
                    <div class="inner">
                        <p class="hello">Hallo <?= $_SESSION['user']; ?>
                         !</p><br>

                        <p class="clear">Du hast momentan <span class="count"><?= $amountImages ?>
                        </span> Bilder in deiner Galerie.</p>

                        <p class="new">Neues Bild hinzufügen (max. 5 MB, jpg, gif, png):</p>

                        <form class="uploadForm margintop" enctype="multipart/form-data" action="" method="post" id="uploadForm">
	                  
                            <input id="image" name="image" accept="image/jpg,image/png,image/jpeg,image/gif" type="file">

                            <div class="upload-msg margintop"></div>

                            <div class="img-preview margintop"></div>

                            <div class="form-group margintop">
                                <input type="submit" value="Upload" id="upload" class="btn btn-success" name="send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                        
            <div class="row">
                <div class="col-md-4">
                    <div class="inner">
                        <h3>Meine Bilder</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                	<div class="inner">
	                <p>Hier kannst du deine hochgeladenen Bilder anschauen und bei Bedarf löschen. Das jeweilige Bild wird dann aus deiner Galerie entfernt.</p> 
                	</div>
                </div>
            </div> 
            
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-12">
                    <div class="inner">
                       
   <?php
                        if ($amountImages > 0) {
                        ?>

                        <div class="grid">
                            <?php
                                foreach ($images as $value) {
                                    echo '<div><a href="' . $value->orig_path . '" data-description="' . $value->description . '" title="' . $value->title . '" data-gallery="blueimp-gallery-uploadpics"><img src="' . $value->thumb_path . '" class="img_abstand" alt="' . $value->title . '" /></a>'.
									'<button href="" class="delete-image-button js-delete-image" data-image-id="' . $value->id . '"><i class="glyphicon glyphicon-remove"></i></button></div>';
                                    
                                }
                            ?>
                        </div><?php
                        } else {
                        ?>

                        <div class="grid"></div><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    //include footer template
    require('layout/footer.php');
    ?>