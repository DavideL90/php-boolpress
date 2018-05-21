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
      <header>
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
                     <a class="post_title" href= <?php echo $post['slug']; ?> > <h4><?php echo $post['title']; ?></h4> </a>

                     <div class="data"> <?php echo $post['published_at']; ?> </div>

                     <?php if(strlen($post['content'] <= 150)){
                        $length = strlen($post['content']);
                        $overwiew = substr($post['content'], 0, $length);
                        $overwiew = $overwiew . '...';
                     ?>
                        <p class="overview"> <?php echo $overwiew ?></p>
                     <?php }else{ ?>
                        <p class="overview"> ciao</p>

                     <?php } ?>
                  </div>
            <?php }
            }else{ ?>
               <div id="message">Nessun post da visualizzare...</div>
            <?php } ?>
      </div>
   </body>
</html>
