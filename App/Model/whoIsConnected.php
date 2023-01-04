

<?php
    function Who($user_id){
        $user_id = $_SESSION['id'];                                  
        $tbl_user=$db->query("SELECT * FROM `registration` WHERE reg_id='$user_id'");
        $fetch=$tbl_user->fetch_array();
    
    }
    


?>



