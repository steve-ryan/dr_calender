<?php

//Starting session
session_start();

     require('./../includes/connection.php');
     
     if($stmt = $conn->prepare('SELECT admin_id,admin_password FROM admin WHERE username= ?')){
        $stmt->bind_param('s',$_POST['user_name']);
        $stmt->execute();
        //store result so we can check if account exists in db
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt ->bind_result($admin_id, $admin_password);
            $stmt->fetch();

            if((md5($_POST['password'])== $admin_password)){
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name']= $_POST['user_name'];
                $_SESSION['id'] = $admin_id;
                // echo 'Welcome'.$_SESSION['name'].'!';
            //    header('Location:./../admin/dashboard.php');

            }else{
                $_SESSION['message'] = "incorrect credentials!!";
                
                // echo 'Incorrect password!';
            }
            if(isset($_SESSION["id"])){
                header('Location:./../admin/dashboard.php');
            }
        }

        $stmt->close();
     }









//     if(isset ($_POST['username']) && isset($_POST['password'])){
       
//         $stmt = $conn->prepare("SELECT * FROM admin WHERE username= ?");
//         $stmt->bind_param('s',$_POST['username']);
//         $stmt->execute();
//         $result=$stmt->get_result();
//         $user = $result->fetch_object();

//         //Verify user password and set $_session
//         if(password_verify($_POST['password'],$user->password)){
//             $_SESSION['user_id']= $user->ID;
//         }

    
//     }
// }


?>