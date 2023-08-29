
  <body>


    <main>
      <h1>Liste html</h1>
      <?php
         echo $var;
       ?>

       <?php
       foreach($var2 as $note){
        echo $note ->getNote(). ' - id='.$note->getId();
       }
       ?>
    </main>

  </body>
