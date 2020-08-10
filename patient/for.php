<?php
 $test = array('test1', 'test2', 'test3', 'test4', 'test5');

 foreach ($test as $value){  
   $secondValue ="";
   if ($value == "test2"){
      $secondValue = "value";
   }   

   echo $value . $secondValue . "<br />";
 }
?>