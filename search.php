<?php
session_start();
//define page title
$title = 'Suche';

include('classes/user.php');

$user = new User();


include('classes/gallery.php');

$gallery = new GalleryMaker();

$query = $_GET['query'];

// gets value sent over search form

$min_length = 3;


require('layout/header.php');
?>

    <div class="container-fluid">
        <div class="content">
	        
            <?php require('layout/nav.php'); ?>

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-12">
                    <div class="inner">
                        <h1>Suchergebnisse <?php echo 'f&uuml;r ' . '"' . $query . '"'; ?></h1>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-10">
                    <div class="inner">
	                    <?php 
	
	if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then
    
    $query = htmlspecialchars($query);
    // changes characters used in html to their equivalents, for example: < to &gt;
    
    $images = $gallery->searchImages($query, $_SESSION['userId']);
    
    $amountImages = sizeof($images);
    
    if ($amountImages > 0) { ?>
    

	                <p class="mgbottom-20">Bei der Suche nach "<?=$query?>" konnten folgende Bilder gefunden werden. Um Bilder zu löschen, rufe die <a href="manage.php">Bilderverwaltung</a> auf. </p> 


<div class="grid"><?php
        foreach ($images as $value) {
            echo '<a href="' . $value->orig_path . '" data-description="' . $value->description . '" title="' . $value->title . '" data-gallery><img src="' . $value->thumb_path . '" class="img_abstand" alt="' . $value->title . '" /></a>';
            
        } ?></div>
        
        
        
        <?php } else { echo '<p>In deiner Bildergalerie gab es zu dem Suchbegriff "'.$query.'" keine Treffer.</p>'; } 
    
}

else { 
    echo "Der Suchbegriff muss mindestens 3 Zeichen enthalten.";
}
?>
                    </div>
                </div>
            </div>

			<div class="row">
                <div class="col-md-4">
                    <div class="inner">
                        <h3>Passende Bilder von Flickr</h3>
                    </div>
                </div>
            </div>			
			
            <div class="row">
                <div class="col-md-12">
	                <div class="inner">
	                <p>Es wurden folgende Bilder bei Flickr gefunden, die zu "<?php echo $query?>" passen:</p>
	                </div>
                    <div id="links-search" class="col-md-12 margintop"><div class="loading"></div></div>
									
                </div>
            </div>
        </div>
    </div>  
    <script type="text/javascript" src="js/flickr_search.js"></script>  
    <?php
//include footer template
require('layout/footer.php');
?>