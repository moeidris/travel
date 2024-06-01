<?php
$conn = mysqli_connect("localhost", "root", '', "booking");
if (!$conn) {
    die('error: ' . mysqli_error($conn));
}
if (isset($_POST['submit'])) {
    $category = ($_POST['category']);
    $destination = ($_POST['destination']);
    $number = ($_POST['numberr']);
    $arrival = ($_POST['arrival']);
    $leaving = ($_POST['leaving']);
    if (($arrival) > ($leaving)) {
        echo '<div class="alert alert-danger" role="alert">Error: Arrival date must be before leaving date.</div>';
        exit;
    }
    $sql = "INSERT INTO booking (category, destination, numberr, arrival, leaving) VALUES ('$category', '$destination', '$number', '$arrival', '$leaving')";
    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success" role="alert">Booking successful!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
    }
}
mysqli_close($conn);
?>



