<html>  
    
    <?php
        $testing = "Hallo";
        echo "Sag $testing";
    ?>
    
    <form action="test.php" method="get">
        <input type="text" name="thebox" value=""/>
        <input type="submit" value="Go..."/>
    </form>
    
    
    <?php
        $name = $_GET["thebox"];
        if (strcmp($name, "") != 0)
            echo "Dein Name ist: $name";
    ?>
    
</html>
