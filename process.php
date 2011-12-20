<html>
    
    <form action="process.php" method="get">
        
        What Operate System are you using?
        <input type="text" name="input"></input>
        <input type="submit" value="Submit"></input>
               
    </form>
    
    
    <?php
    
    $in = $_GET["input"];
    if(strcmp($in, ""))
    {
        $test = array (
            'System' => "$in",
            'VS' => "GIT"
        );
        echo "I am using a $test[System] with Version Control System : $test[VS]";  
    }

?>
    
</html>
