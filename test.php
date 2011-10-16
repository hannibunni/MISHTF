<html>  
    
    <?php
        $testing = "Hallo";
        echo "Sag $testing";
    ?>
    
    <form action="test.php" method="get">
        <input type="text" name="thebox" value=""/>
        <input type="submit" value="Go..."/>
    </form>
    
    
    Dein Name ist: 
    <?php
        $name = $_GET["thebox"];
        echo "$name";
    ?>
    
</html>
