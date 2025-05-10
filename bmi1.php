<?php
// Start the session
session_start();

// Set default background color and styles
echo "<body style='background-color: #f4f4f4; font-family: Arial, sans-serif; color: #333; text-align: center; padding: 50px;'>";

if (isset($_GET['submit'])) {
    $mass = $_GET['mass'];
    $height = $_GET['height'];

    // Check for valid height and mass
    if ($height > 0 && $mass > 0) {
        $height2 = ($height * $height);
        $bmi = $mass / $height2;

        // Determine the BMI category
        if ($bmi <= 18.5) {
            $output = "Underweight";
        } elseif ($bmi > 18.5 && $bmi <= 24.9) {
            $output = "Normal";
        } elseif ($bmi >= 25 && $bmi < 30) {
            $output = "Overweight";
        } else {
            $output = "Obese";
        }

        // Store BMI and output in session variables
        $_SESSION['bmi'] = round($bmi, 2);
        $_SESSION['output'] = $output;

        // Display the BMI result
        echo "<div style='background-color: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); padding: 20px;'>";
        echo "<h3 style='font-size: 2.5rem; margin-bottom: 20px;color:#6f42c1;'>Your BMI value is " . $_SESSION['bmi'] . " and you are: ";
        echo "<span style='font-weight: bold; color: #6f42c1;'>" . $_SESSION['output'] . "</span></h3></div>";
    } else {
        echo "<div style='background-color: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); padding: 20px;'>";
        echo "<h3 style='font-size: 2.5rem;'>Please enter valid height and mass values.</h3></div>";
    }
} elseif (isset($_SESSION['bmi']) && isset($_SESSION['output'])) {
    // If already calculated, display the session-stored values
    echo "<div style='background-color: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); padding: 20px;'>";
    echo "<h3 style='font-size: 2.5rem;'>Your BMI value is " . $_SESSION['bmi'] . " and you are: ";
    echo "<span style='font-weight: bold; color: #5cb85c;'>" . $_SESSION['output'] . "</span></h3></div>";
} else {
    echo "<div style='background-color: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); padding: 20px;'>";
    echo "<h3 style='font-size: 2.5rem;'>Please enter your details to calculate your BMI.</h3></div>";
}

// Navigation Links
echo "<div style='margin-top: 30px;'>";
echo "<h2 style='font-size: 2rem;'><a href='diet.php' style='text-decoration: none; color: #6f42c1;'>Click here to get your diet plans</a></h2><br>";
echo "<h2 style='font-size: 2rem;'><a href='treat1.html' style='text-decoration: none; color: #6f42c1;'>Click here to get your treatment</a></h2><br>";
echo "<input type='button' onClick=\"location.href='appointment.html'\" value='Go Back' style='padding: 10px 20px; font-size: 1.5rem; border: none; border-radius: 5px; background-color: #6f42c1; color: white; cursor: pointer;'>";
echo "</div>";
echo "</body>";
?>
