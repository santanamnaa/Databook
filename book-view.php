<?php
require 'dbcon.php';
?>

<?php include('includes/header.php') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Book View Details
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
                            <div class="mb-3">
                                <label>Title</label>
                                <p class="form-control">
                                    <?= $book['title']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <p class="form-control">
                                    <?= $book['price']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Author</label>
                                <p class="form-control">
                                    <?= $book['author']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Publication Year</label>
                                <p class="form-control">
                                    <?= $book['publication_year']; ?>
                                </p>
                            </div>
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