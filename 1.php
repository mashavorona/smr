<?php
$comment = "";

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }


function test_input($data) {
   return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   
   <textarea name="comment"><?php echo $comment;?></textarea>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>YOUR INPUT</h2>";
echo $comment;
echo "<br>";
?>