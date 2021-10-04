<!-- php start -->

<?php

$conn = mysqli_connect("localhost", "root", "", "onlinebot");

    if($conn){
        $user_message = mysqli_real_escape_string($conn,$_POST['mesageValue']);

        $query = "SELECT * FROM chatbot WHERE messages LIKE '%$user_message%'";
        $runQuery = mysqli_query($conn, $query);
           
        if(mysqli_num_rows($runQuery) > 0){
             //fetch result
             $result = mysqli_fetch_assoc($runQuery);
             //echo
             echo $result['response'];
        }
        else{
            echo "Sorry, I can't understand you.. Please try again";
        }
    }
    else{
        echo "connection failed" . mysqli_connect_errno();
    }

?>
