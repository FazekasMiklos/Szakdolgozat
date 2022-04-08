 <?php
    //Átírányítja az admint ahol hozzátud adni ligát az adatbázisba
    if (!empty($_SESSION["admin"])) {
    ?>
     <br>
     <form action="index.php?page=hozzaadas" method="post">
         <div class="text-center">
             <label style="color: white">
                 <h2>Liga hozzáadás:</h2>
             </label><br>
             <button class="btn btn-success" style='color:white;' type="submit" name="ligafelvitel"><i class="fa fa-plus"></i></button>
         </div>
     </form>
 <?php
    }
    ?>
 <!--Ligák megjelenítése-->
 <div id="btn">
     <?php
        $result = $conn->query("SELECT * FROM ligak ORDER BY liganev");
        ?>
     <?php
        while ($row = $result->fetch_assoc()) {
        ?>
         <div class="btm">
             <a href="index.php?page=league&id3=<?php echo ($row['ligaid']); ?>">
                 <img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['logo']); ?>" width="100" /></a><br>
             <?php echo ($row['liganev']); ?><br>
             <?php
                if (!empty($_SESSION["admin"])) {
                ?>
                 <a style="color: white" ; href="index.php?page=torles&id3=<?php echo ($row['ligaid']); ?>">
                     <i class="fas fa-trash mr-2"></i>
                     <!--Liga törlés-->
                 </a>
                 <a style="color: white" ; href="index.php?page=modositas&id3=<?php echo ($row['ligaid']); ?>">
                     <i class="fas fa-pencil"></i>
                     <!--Liga módosítás-->
                 </a>
             <?php
                }
                ?>
         </div>
     <?php
        }
        ?>
 </div>