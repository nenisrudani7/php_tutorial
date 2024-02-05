<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="que2.php" method="post">

        <label for="Q1">Q1. What is the national bird of India:</label><br>
        <input type="radio" name="Q1" value="peacock"> Peacock <br>
        <input type="radio" name="Q1" value="monkey"> Monkey <br>
        <input type="radio" name="Q1" value="tiger"> Tiger<br>
        <input type="radio" name="Q1" value="Dog"> Dog
        <br><br>

        <label for="Q2">Q2. What is the national Animal of India:</label><br>
        <input type="radio" name="Q2" value="Tiger"> Tiger<br>
        <input type="radio" name="Q2" value="Horse"> Horse <br>
        <input type="radio" name="Q2" value="Lion"> Lion<br>
        <input type="radio" name="Q2" value="Ostrich"> Ostrich
        <br><br>

        <label for="Q3">Q3. What is the capital of Japan:</label><br>
        <input type="radio" name="Q3" value="Tokyo"> Tokyo <br>
        <input type="radio" name="Q3" value="Seoul"> Seoul <br>
        <input type="radio" name="Q3" value="Beijing"> Beijing<br>
        <input type="radio" name="Q3" value="Bangkok"> Bangkok
        <br><br>

        <label for="Q4">Q4. Which planet is known as the Red Planet?</label><br>
        <input type="radio" name="Q4" value="Mars"> Mars <br>
        <input type="radio" name="Q4" value="Jupiter"> Jupiter <br>
        <input type="radio" name="Q4" value="Venus"> Venus<br>
        <input type="radio" name="Q4" value="Saturn"> Saturn
        <br><br>

        <label for="Q5">Q5. What is the largest mammal in the world?</label><br>
        <input type="radio" name="Q5" value="Elephant"> Elephant <br>
        <input type="radio" name="Q5" value="Blue whale"> Blue whale <br>
        <input type="radio" name="Q5" value="Giraffe"> Giraffe<br>
        <input type="radio" name="Q5" value="Lion"> Lion
        <br><br>

        <label for="Q6">Q6. Who wrote "Romeo and Juliet"?</label><br>
        <input type="radio" name="Q6" value="Shakespeare"> Shakespeare <br>
        <input type="radio" name="Q6" value="Jane Austen"> Jane Austen <br>
        <input type="radio" name="Q6" value="Charles Dickens"> Charles Dickens<br>
        <input type="radio" name="Q6" value="Mark Twain"> Mark Twain
        <br><br>

        <label for="Q7">Q7. What is the largest ocean on Earth?</label><br>
        <input type="radio" name="Q7" value="Atlantic"> Atlantic <br>
        <input type="radio" name="Q7" value="Indian"> Indian <br>
        <input type="radio" name="Q7" value="Pacific"> Pacific<br>
        <input type="radio" name="Q7" value="Arctic"> Arctic
        <br><br>

        <label for="Q8">Q8. Who was the first President of the United States?</label><br>
        <input type="radio" name="Q8" value="George Washington"> George Washington <br>
        <input type="radio" name="Q8" value="Thomas Jefferson"> Thomas Jefferson <br>
        <input type="radio" name="Q8" value="Abraham Lincoln"> Abraham Lincoln<br>
        <input type="radio" name="Q8" value="John Adams"> John Adams
        <br><br>

        <label for="Q9">Q9. What is the currency of Brazil?</label><br>
        <input type="radio" name="Q9" value="Real"> Real <br>
        <input type="radio" name="Q9" value="Peso"> Peso <br>
        <input type="radio" name="Q9" value="Yen"> Yen<br>
        <input type="radio" name="Q9" value="Rupee"> Rupee
        <br><br>

        <label for="Q10">Q10. Who painted the Mona Lisa?</label><br>
        <input type="radio" name="Q10" value="Leonardo da Vinci"> Leonardo da Vinci <br>
        <input type="radio" name="Q10" value="Pablo Picasso"> Pablo Picasso <br>
        <input type="radio" name="Q10" value="Vincent van Gogh"> Vincent van Gogh<br>
        <input type="radio" name="Q10" value="Claude Monet"> Claude Monet
        <br><br>

        <br>
        <input type="submit" name="btn">

    </form>

</body>

</html>


<!-- <?php

        if (isset($_POST['btn'])) {
            $corr = "<p style='color: green;'>Correct</P>";
            $incorr = "<p style='color: red;'>Inorrect</P>";
            $score = 0;

            if (isset($_POST['Q1'])) {
                $a = $_POST['Q1'];
                if (isset($_POST['Q2'])) {
                    $b = $_POST['Q2'];
                    if ($a == 'peacock') {
                        echo $corr;
                        // echo "<br>";
                        $score += 1;
                    } else {
                        echo $incorr . "Correct ans: a. peacock";
                        // echo "<br>";
                    }
                    if ($b == 'Tiger') {
                        echo $corr . "Correct ans: b. tiger";
                        // echo "<br>";
                        $score += 1;
                    } else {
                        echo $incorr . "Correct ans: a. Tiger";
                        // echo "<br>";
                    }
                } else {
                    echo "Please attain all question";
                }
            } else {
                echo "Please attain all question";
            }
            // echo "<br>";
            echo $score;
        }

        ?> -->

<?php

if (isset($_POST['btn'])) {
    $corr = "<p style='color: green;'>Correct</p>";
    $incorr = "<p style='color: red;'>Incorrect</p>";
    $score = 0;

    // Question 1
    if (isset($_POST['Q1'])) {
        $a = $_POST['Q1'];
        if ($a == 'peacock') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: a. peacock";
        }
    } else {
        echo "Please answer Question 1 <br>";
    }

    // Question 2
    if (isset($_POST['Q2'])) {
        $b = $_POST['Q2'];
        if ($b == 'Tiger') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: b. Tiger";
        }
    } else {
        echo "Please answer Question 2 <br>";
    }

    // Question 3
    if (isset($_POST['Q3'])) {
        $c = $_POST['Q3'];
        if ($c == 'Tokyo') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: c. Tokyo";
        }
    } else {
        echo "Please answer Question 3 <br>";
    }

    // Question 4
    if (isset($_POST['Q4'])) {
        $d = $_POST['Q4'];
        if ($d == 'Mars') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: d. Mars";
        }
    } else {
        echo "Please answer Question 4 <br>";
    }

    // Question 5
    if (isset($_POST['Q5'])) {
        $e = $_POST['Q5'];
        if ($e == 'Blue whale') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: e. Blue whale";
        }
    } else {
        echo "Please answer Question 5 <br>";
    }

    // Question 6
    if (isset($_POST['Q6'])) {
        $f = $_POST['Q6'];
        if ($f == 'Shakespeare') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: f. Shakespeare";
        }
    } else {
        echo "Please answer Question 6 <br>";
    }

    // Question 7
    if (isset($_POST['Q7'])) {
        $g = $_POST['Q7'];
        if ($g == 'Pacific') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: g. Pacific";
        }
    } else {
        echo "Please answer Question 7 <br>";
    }

    // Question 8
    if (isset($_POST['Q8'])) {
        $h = $_POST['Q8'];
        if ($h == 'George Washington') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: h. George Washington";
        }
    } else {
        echo "Please answer Question 8 <br>";
    }

    // Question 9
    if (isset($_POST['Q9'])) {
        $i = $_POST['Q9'];
        if ($i == 'Real') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: i. Real";
        }
    } else {
        echo "Please answer Question 9 <br>";
    }

    // Question 10
    if (isset($_POST['Q10'])) {
        $j = $_POST['Q10'];
        if ($j == 'Leonardo da Vinci') {
            echo $corr;
            $score += 1;
        } else {
            echo $incorr . " Correct ans: j. Leonardo da Vinci";
        }
    } else {
        echo "Please answer Question 10 <br>";
    }

    echo "<br>Total Score: $score";
}

?>