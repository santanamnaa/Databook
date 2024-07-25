<?php
// logic successfully executed

session_start();
require 'dbcon.php';

if (isset($_POST['delete_book'])) {
    $ISBN = mysqli_real_escape_string($con, $_POST['delete_book']);

    $query = "DELETE FROM book WHERE ISBN = '$ISBN'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Book Deleted Successfully";
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Book Not Deleted";
        header('Location: index.php');
        exit(0);
    }
}

if (isset($_POST['update_book'])) {

    $ISBN = mysqli_real_escape_string($con, $_POST['ISBN']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $year = mysqli_real_escape_string($con, $_POST['year']);

    $query = "UPDATE book SET title='$title', price='$price', author='$author', publication_year='$year' 
            WHERE ISBN = '$ISBN'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Book Updated Successfully";
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Book Not Updated Successfully";
        header('Location: index.php');
        exit(0);
    }
}

if (isset($_POST['save_book'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $year = mysqli_real_escape_string($con, $_POST['year']);

    $query = "INSERT INTO book (title, price, author, publication_year) VALUES ('$title','$price','$author','$year')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        // echo "Saved";
        $_SESSION['message'] = "Book Added Successfully";
        header('Location: book-create.php');
        exit(0);
    } else {
        // echo "Not Saved";
        $_SESSION['message'] = "Book Not Added Successfully";
        header('Location: book-create.php');
        exit(0);
    }
}
