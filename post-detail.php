<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="css/style.css">
      <title></title>
   </head>
   <body>
      <?php
         include 'data.php';
         $keyWord = $_GET['slug'];
         foreach ($posts as $post) {
            if($keyWord == $post['slug']){ ?>
               <header id="title_cnt">
                  <h1 class="postTitle"> <?php echo $post['title']; ?> </h1>
                  <div class="data">
                     <?php echo $post['published_at']; ?>
                  </div>
               </header>
               <div class="text_cnt">
                  <img class="text-img" src= <?php echo $post['image'] ?> >
                  <p> <?php echo $post['content']; ?> </p>
               </div>
               <div class="tags">
                  Tags:
                  <?php foreach ($post['tag'] as $key => $tag) {
                     if($key == (count($post['tag']) - 1)){
                        echo $tag;
                     }else{
                        echo $tag . ', ';
                     }
                  } ?>
               </div>
            <?php }
         }
      ?>
      <script type="text/javascript">
         $(document).ready(function(){
            var slugWord = <?php echo $keyWord; ?>
            console.log(slugWord);
            // $.ajax(){
            //    url: 'http://localhost/php-boolpress/comments.php',
            //    method: 'GET',
            //    data: {
            //
            //    },
            // }
         });
      </script>
   </body>
</html>
