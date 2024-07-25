<?php
session_start();
require 'dbcon.php';
?>
<?php include('includes/header.php') ?>

<div class="container mt-4">

    <?php
    include('message.php');
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Book Details
                        <a href="book-create.php" class="btn btn-primary float-end">Add Book</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Author</th>
                                <th>publication Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM book";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                while ($book = mysqli_fetch_assoc($query_run)) {
                                    // echo $book['title'];
                            ?>
                                    <tr>
                                        <td><?= $book['ISBN']; ?></td>
                                        <td><?= $book['title']; ?></td>
                                        <td><?= $book['price']; ?></td>
                                        <td><?= $book['author']; ?></td>
                                        <td><?= $book['publication_year']; ?></td>
                                        <td>
                                            <a href="book-view.php?id=<?= $book['ISBN']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="book-edit.php?id=<?= $book['ISBN']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_book" value="<?= $book['ISBN']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<h5> No Record Found </h5>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>