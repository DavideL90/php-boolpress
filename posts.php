<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css">
      <meta charset="utf-8">
      <title></title>
   </head>
   <body>
      <!-- import data.php -->
      <?php include 'data.php'; ?>
      <!-- header -->
      <header id="blogTitle">
         <div class="overlay">
            <h1>My personal blog</h1>
         </div>
      </header>
      <div id="square_cnt">
         <!-- generate post -->
         <?php
            if(!empty($posts)){
               foreach ($posts as $post) { ?>
                  <div class="post_square">
                     <a class="post_title" href= <?php echo 'post-detail.php?slug=' . $post['slug']; ?> > <h4><?php echo $post['title']; ?></h4> </a>

                     <div class="data"> <?php echo $post['published_at']; ?> </div>
                     <!-- controllo se il contenuto è più lungo di 150 caratteri -->
                     <?php if(strlen($post['content']) < 150){
                        $length = strlen($post['content']);
                        $overview = substr($post['content'], 0, $length);
                     ?>
                        <p class="overview"> <?php echo $overview; ?></p>
                     <?php }else{
                        $overview = substr($post['content'], 0, 150);
                        $overview = $overview . '...';
                     ?>
                        <p class="overview"> <?php echo $overview ?> </p>
                     <?php } ?>
                  </div>
            <?php }
            }else{ ?>
               <div id="message">Nessun post da visualizzare...</div>
            <?php } ?>
      </div>

      <script type="text/javascript">

      </script>
   </body>
</html>
