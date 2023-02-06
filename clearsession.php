<?
session_start();
session_destroy();
header('location: login.html');
exit();
?>
<html>
    <head>
        <title>Logged Out Successfully</title> 
        <style>
            
 
            *{
            box-sizing: border-box;
            }

            .texts h1
            {
                text-align: center;
                bottom: 800;
                font-size: 70px;
                padding-top: 10%;
            }
            .texts p{
                padding: 1px;
                
            }
            .texts [type=submit]{
                background-color: #49adff;
                border-style: 3px solid;
                color: rgb(16, 5, 68);
                padding: 15px 32px;
                text-align: center;
                text-decoration:lightblue;
                display: flex;
                font-size: 16px;
                font-weight: bold;
                margin: auto;
                
            }

           
        </style>  
    </head>
    <body>            
            <div class="texts">
                
                <form action="login.php" method="GET">
                <h1>Thanks for using the System!</h1>
                <p><input type="submit" value="Back to Login"></p>
                </form>
                
            </div>

    </body>
</html>