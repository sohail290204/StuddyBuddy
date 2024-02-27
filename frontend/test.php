<?php
session_start();

// Check if the session variable exists
if (isset($_SESSION['inc'])) {
    // Increment the session variable
    $_SESSION['inc']++;
    
    // Return the incremented value
    // echo $_SESSION['inc'];
} else {
    // Session variable not set, return an error
    echo "Error: Session variable 'inc' not set.";
}
?>
