<?php 
/**
* pdf-index.php
* This template is used to display the content in the PDF
*
* Do not edit this template directly, 
* copy this template and paste in your theme inside a directory named pixproof-pdf 
*/ 
?>

<html>
    <head>

      	<style type="text/css">
            * {
                margin:0; 
                padding:0; 
                text-indent:0; 
            }
      		body {
      			background:#FFF;
      			font-size: 100%;
                
      		}	
            .img_holder 
            {
                text-align:center

            }
            img
            {
                display: inline-block;
                margin-left: auto;
                margin-right: auto;
            }
            
		</style>

   	</head>

    <body>

	    <?php

	    global $post;
	    $pdf  = get_query_var( 'pdf' );
	    $post_type = get_post_type( $pdf ); ?>

            <div style="width:100%;float:left;">
                
                <?php 
                
                    $ii=0;
                    if ($logo!=='') {
                        echo('<div class="img_holder" width="100%"><img style="max-width:100%; max-height:100%;" src="'.$logo.'"></div>'); 
                        $ii=1;
                    } 
                
	    			// image
                    foreach ( $attachments as $key => $attachment ) {
                        $metadata = wp_get_attachment_metadata( $attachment->ID );

                        // only those selected
                        if ( isset( $metadata[ 'selected' ] ) && $metadata[ 'selected' ] == 'true' ) {
                            $image = get_attached_file( $attachment->ID );
                            if( $image ) 
                            {
                                if ($ii>0) {echo('<pagebreak />');}
                                echo('<div class="img_holder" width="100%"><img style="max-width:100%; max-height:100%;" src="'.$image.'"></div>');
                                $ii++;
                            }
                        }
                    }
	    			
	    		?>


	    	</div>
    </body>

</html>