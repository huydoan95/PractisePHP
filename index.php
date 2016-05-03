<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" >
        <title></title>
        
    </head>
    <body>
        <?php 
            include 'count_inc.php';
            hit_count();
        ?>
        <?php ob_start() ?>
        <h1>My Page</h1>
        <?php
            $redirect_page = 'tryYourBestSlogan.php';
            
            $redirect = FALSE; 
            
            if($redirect == true){
                header("Location: ".$redirect_page);
                
            }
        ?>
        <?php
        
            $offset = 0;
            
            if(isset($_POST['textUserInput']) && isset($_POST['replaceWith']) && isset($_POST['searchFor']))
            {
                $textUserInput = $_POST['textUserInput'];
                $searchFor = $_POST['searchFor'];
                $replaceWith = $_POST['replaceWith'];
                
                $searchForLength = strlen($searchFor);
                
                
                
                if(!empty($replaceWith) && !empty($searchFor) && !empty($textUserInput)){
                    // Search all characters in searchfor textbox and replace them with text in replace textbox
                    while(($stringPosition = strpos($textUserInput, $searchFor, $offset))){
                        $offset = $stringPosition + $searchForLength;
                        $textUserInput = substr_replace($textUserInput, $replaceWith, $stringPosition, $searchForLength);
                        
                    }
                    echo $textUserInput;
                }
                else{
                    echo 'Fill in all fields!';
                }
            }
        ?>
        
        <?php ob_end_flush() ?>
        <form action="index.php" method="POST">
            <textarea name="textUserInput" rows="6" cols="30">
                
            </textarea>
            <br>
            <br>
            Search for:
            <br>
            <br>
            <input type="text" name="searchFor">
            <br>
            <br>
            Replace with:
            <br>
            <br>
            <input type="text" name="replaceWith">
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>
        
    </body>
</html>
