<script>
    $('.fa-star').click(function() {
        $(this).toggleClass('far fas');
      })
      </script> 
<?php
include 'controller/favorite.php';
if (isset($_SESSION['userid'])){ 
echo "<form method='POST' action='".setFavorites($conn)."'>
<input type='hidden' name='uid' value='".$_SESSION['userid']."'>
<button type='submit' class='btn btn-link' style='color:white;' name='kedvenc'><i class='far fa-star star-light mr-1 main_star' style='font-size:30px;'></i></button>
</form>";
    }
    ?>