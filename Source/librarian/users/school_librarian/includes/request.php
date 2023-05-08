<?php
session_start();

if (isset($_POST['submit'])) {
    $borrower = $_POST['borrower'];
    $accession_number = $_POST['accession_number'];
    $quantityBorrowing = $_POST['quantityBorrowing'];
    $DateToBorrow = $_POST['DateToBorrow'];
    $DaysDuration = $_POST['DaysDuration'];

    include_once 'connection.php';

    $insertdata = "INSERT INTO borrowed_books (accession_number, borrower, borrowing_quantity, borrowed_days, borrowing_date, status) VALUES ('$accession_number', '$borrower', '$quantityBorrowing', '$DaysDuration', '$DateToBorrow', 'Pending')";
    $q = mysqli_query($link, $insertdata);
    if ($q) {
        header('location: ../list_of_borrowed_books.php');
    } else {
        header('location: ../list_of_borrowed_books.php');
    }
}
?>