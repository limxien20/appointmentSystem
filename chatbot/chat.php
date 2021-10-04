<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/chatbot.css">

</head>
    <body>
        <div id="chat_container">
            <button class="open-button" onclick="openChat()"><b>...</button>
            <div class="chat-popup" id="screen">
                <div id="header">Chatbot</div>
                <div id="messageDisplay">
                    <div class = "messageContainer">
                        <div class="chat botMessage"> Ask me questions and I will try to answer it..</div>
                    </div>
                </div>
                    <!--input message-->
                    <div id="userInput">
                        <input type="text" name="message" id="message" autocomplete="OFF" placeholder="Type your message here..." required>
                        <input type="submit" value="Send" id="send" name="send">
                    </div>
            </div>
        </div>

        <!-- jQuery CDN-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <!-- jQuery start-->
        <script>
            function openChat() {
                if (document.getElementById("screen").style.display === "none"){
                    document.getElementById("screen").style.display = "block";
                }
                else{
                    document.getElementById("screen").style.display = "none";
                }
                
            }

            $(document).ready(function(){
                $("#message").on("keyup", function(){
                    if($("#message").val()){
                        $("#send").css("display","block");
                    }
                    else{
                        $("#send").css("display","none");v 
                    }
                });
            });
            
            // click send button
            $("#send").on("click",function(e){
                $userMessage = $("#message").val();
                $showUserMessage = '<div class="chat userMessage">'+ $userMessage +'</div>';
                $("#messageDisplay").append($showUserMessage);

                // ajax start
                $.ajax({
                    url: "bot.php",
                    type: "POST",
                    // sending data
                    data: {mesageValue: $userMessage},
                    success: function(data){
                        //show respond
                        $appendBotResponse = '<div class = "messageContainer"><div class="chat botMessage">'+data+'</div></div>';
                        $("#messageDisplay").append($appendBotResponse);
                    }
                });
                $("#message").val("");
                $("#send").css("display", "none");
            });
            
            // OR press enter button
            $(document).keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    $userMessage = $("#message").val();
                    $showUserMessage = '<div class="chat userMessage">'+ $userMessage +'</div>';
                    $("#messageDisplay").append($showUserMessage);

                    // ajax start
                    $.ajax({
                        url: "bot.php",
                        type: "POST",
                        // sending data
                        data: {mesageValue: $userMessage},
                        success: function(data){
                            //show respond
                            $appendBotResponse = '<div class = "messageContainer"><div class="chat botMessage">'+data+'</div></div>';
                            $("#messageDisplay").append($appendBotResponse);
                        }
                    });
                    $("#message").val("");
                    $("#send").css("display", "none");  
                    }
                });
        </script>
    </body>
</html>