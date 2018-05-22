<?php
   include 'data-comments.php';

   $slugWord = $_GET['slugWord'];

   foreach ($comments as $keyWord => $comment) {
      if($keyWord == $slugWord){
         echo json_encode($comment);
      }
   }

 ?>
