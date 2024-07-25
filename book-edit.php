<?php
session_start();
require 'dbcon.php';
?>

<?php include('includes/header.php') ?>
    <div class="container mt-5">
        <?php
        include('message.php');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book Edit
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $ISBN = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM book WHERE ISBN = '$ISBN'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $book = mysqli_fetch_array($query_run);
                        ?>
                                <form action="code.php" method="POST">
                                    <!-- Menggunakan input hidden untuk menyimpan nilai ISBN -->
                                    <input type="hidden" name="ISBN" value="<?= $book['ISBN']; ?>">

                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" value="<?= $book['title']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Price</label>
                                        <input type="text" name="price" value="<?= $book['price']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Author</label>
                                        <input type="text" name="author" value="<?= $book['author']; ?>" class=" form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Publication Year</label>
                                        <input type="text" name="year" value="<?= $book['publication_year']; ?>" class=" form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_book" class="btn btn-primary">Update Book</button>
                                    </div>
                                </form>

                        <?php
                            } else {
                                echo "<h4>Book not found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php') ?>