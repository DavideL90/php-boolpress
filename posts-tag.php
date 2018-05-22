<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/style.css">
      <title></title>
   </head>
   <body>
      <?php
         include 'data.php';
         // prendo i dati del form
         $tag = $_GET;
         $tagToSearch = $tag['tagChoice'];
         // faccio un ciclo nell'array di posts
         foreach ($posts as $post) {
            if(in_array($tagToSearch, $post['tag'])){
      ?>
               <section id="title_cnt">
                  <h1 class="postTitle"> <?php echo $post['title']; ?> </h1>
                  <div class="data">
                     <?php echo $post['published_at']; ?>
                  </div>
               </section>
               <div class="text_cnt">
                  <img class="text-img" src= <?php echo $post['image'] ?> >
                  <p> <?php echo $post['content']; ?> </p>
               </div>
               <div class="tags">
                  Tags:
                  <?php
                     foreach ($post['tag'] as $key => $tag) {
                        if($key == (count($post['tag']) - 1)){
                           echo $tag;
                        }else{
                           echo $tag . ', ';
                        }
                     }
                  ?>
               </div>
             <?php
            }
         }
         ?>
   </body>
</html>
