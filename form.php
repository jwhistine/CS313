<?php
    // start ye old session
    session_start();
    
    // this will not allow the user to go back after voting
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $_SESSION["hasVoted"] = \TRUE;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="results.css">
    </head>
    <body>
        <?php
            // color count variables
            $colorBlue    = 0;
            $colorGreen   = 0;
            $colorPurple = 0;
            $colorRed    = 0;
                
            // hero count variables
            $heroIron   = 0;
            $heroSuper  = 0;
            $heroSpider = 0;
            $heroBat    = 0;
                
            // language count variables
            $langPhp  = 0;
            $langCP   = 0;
            $langJava = 0;
            $langCS   = 0;
                
            // series count variables
            $seriesSW  = 0;
            $seriesLOR = 0;
            $seriesST  = 0;
            $seriesHP  = 0;
                
            // grab the values from the radio buttons
            $color  = $_POST["color"];
            $hero   = $_POST["hero"];
            $lang   = $_POST["language"];
            $series = $_POST["series"];
               
            $openFile = fopen("results.txt", "r");   
               
            // definitely not the prettiest thing in the world
            // but hey, it works....
            if ($openFile) {
                if ($line = fgets($openFile)) {
                    // color
                    $colorBlue   = (int)$line;
                    $colorGreen  = (int)fgets($openFile);
                    $colorPurple = (int)fgets($openFile);
                    $colorRed    = (int)fgets($openFile);
                        
                    // hero
                    $heroIron   = (int)$line;
                    $heroSuper  = (int)fgets($openFile);
                    $heroSpider = (int)fgets($openFile);
                    $heroBat    = (int)fgets($openFile);
                        
                    // language
                    $langPhp   = (int)$line;
                    $langCP    = (int)fgets($openFile);
                    $langJava  = (int)fgets($openFile);
                    $langCS    = (int)fgets($openFile);
                       
                    // series
                    $seriesSW   = (int)$line;
                    $seriesLOR  = (int)fgets($openFile);
                    $seriesST   = (int)fgets($openFile);
                    $seriesHP   = (int)fgets($openFile);
                }
            }    
                
            fclose($openFile);
                
            /**********************************************
             * keep count of each entry
             *********************************************/
            switch ($color) {
                case "Blue":
                    $colorBlue++;
                    break;
                case "Green":
                $colorGreen++;
                    break;
                case "Purple":
                    $colorPurple++;
                    break;
                case "Red":
                    $colorRed++;
                    break;
            }
            
            switch ($hero) {
                case "Superman":
                    $heroSuper++;
                    break;
                case "Iron Man":
                    $heroIron++;
                    break;
                case "Spiderman":
                    $heroSpider++;
                    break;
                case "Batman":
                    $heroBat++;
                    break;
            }
            
            switch ($lang) {
                case "PHP":
                    $langPhp++;
                    break;
                case "C++":
                    $langCP++;
                    break;
                case "Java":
                    $langJava++;
                    break;
                case "C#":
                    $langCS++;
                    break;
            }
            
            switch ($series) {
                case "Star Wars":
                    $seriesSW++;
                    break;
                case "Lord of the Rings":
                    $seriesLOR++;
                    break;
                case "Star Trek":
                    $seriesST++;
                    break;
                case "Harry Potter":
                    $seriesHP++;
                    break;
            }
            
            // let's write the results to the file, shall we?
            $openFile = fopen("results.txt", "w");
            if ($openFile) {
                // writes and integer for the count
                fwrite($openFile, "$colorBlue\n");
                fwrite($openFile, "$colorGreen\n");
                fwrite($openFile, "$colorPurple\n");
                fwrite($openFile, "$colorRed\n");
                
                fwrite($openFile, "$heroSuper\n");
                fwrite($openFile, "$heroIron\n");
                fwrite($openFile, "$heroSpider\n");
                fwrite($openFile, "$heroBat\n");
                
                fwrite($openFile, "$$langPhp\n");
                fwrite($openFile, "$langCP\n");
                fwrite($openFile, "$langJava\n");
                fwrite($openFile, "$$langCS\n");
                
                fwrite($openFile, "$seriesSW\n");
                fwrite($openFile, "$seriesLOR\n");
                fwrite($openFile, "$seriesST\n");
                fwrite($openFile, "$seriesHP\n");
            }
            
            // let's make things look pretty for the user....fabulous!!!!
            echo "<div class=\"main\">";
            echo "<header>Survey Results</header>";
            echo "<hr>";
            echo "<h4>Favorite Color</h4>";
            echo "<table>"; 
            echo "  <tr>";
            echo "    <td>Blue</td>";
            echo "    <td>$colorBlue</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Green</td>";
            echo "    <td>$colorGreen</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Purple</td>";
            echo "    <td>$colorPurple</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Red</td>";
            echo "    <td>$colorRed</td>";
            echo "  </tr>";
            echo "</table>";
            echo "<br>";
            echo "<hr>";
            echo "<h4>Favorite Superhero</h4>";
            echo "<table>"; 
            echo "  <tr>";
            echo "    <td>Superman</td>";
            echo "    <td>$heroSuper</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Iron Man</td>";
            echo "    <td>$heroIron</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Spiderman</td>";
            echo "    <td>$heroSpider</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Batman</td>";
            echo "    <td>$heroBat</td>";
            echo "  </tr>";              
            echo "</table>";
            echo "<hr>";
            echo "<h4>Favorite Programming Language</h4>";
            echo "<table>"; 
            echo "  <tr>";
            echo "    <td>PHP</td>";
            echo "    <td>$langPhp</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>C++</td>";
            echo "    <td>$langCP</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Java</td>";
            echo "    <td>$langJava</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>C#</td>";
            echo "    <td>$langCS</td>";
            echo "  </tr>";              
            echo "</table>";
            echo "<br>";
            echo "<hr>";
            echo "<h4>Favorite Series</h4>";
            echo "<table>"; 
            echo "  <tr>";
            echo "    <td>Star Wars</td>";
            echo "    <td>$seriesSW</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Lord of the Rings</td>";
            echo "    <td>$seriesLOR</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Star Trek</td>";
            echo "    <td>$seriesST</td>";
            echo "  </tr>";
            echo "  <tr>";
            echo "    <td>Harry Potter</td>";
            echo "    <td>$seriesHP</td>";
            echo "  </tr>";              
            echo "</table>";
            echo "</div>";
        ?>
    </body>
</html>