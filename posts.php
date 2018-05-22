<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
         <nav>
            <form id="searchTagForm" action="posts-tag.php" method="get">
               <select class="tagChoice" name="tagChoice">
                  <option id="noVal" value="noValue" disabled>Scegli un tag</option>
                  <?php
                     $arrayOfTags = [];
                     foreach ($posts as $post) {
                        foreach ($post['tag'] as $tag) {
                           if(!in_array($tag, $arrayOfTags)){ ?>
                              <option class="tagChoice" value= <?php echo $tag; ?> > <?php echo $tag; ?> </option>
                              <?php $arrayOfTags[] = $tag;
                           }
                        }
                     } ?>
               </select>
               <input id="inputBtn" type="submit" value="Cerca">
            </form>
         </nav>
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
         $(document).ready(function(){
            //variabilizzo il form
            var myForm = $('#searchTagForm');
            //faccio si che la select sia puntata sul placeholder quando torno indietro
            $('#noVal').prop('selected', true);
            //disabilito il submit di default
            $('#inputBtn').prop('disabled', true);
            //quando uso la select abilito il tasto
            $('.tagChoice').change(function(){
               $('#inputBtn').prop('disabled', false);
            });
            //gestisco il submit
            myForm.submit(function(e){
               var tagValue = $('.tagChoice').val();
               if(tagValue == 'noValue'){
                  alert('Scegli un tag dal menù a tendina');
                  return false;
               }
            });
         });
      </script>
   </body>
</html>
