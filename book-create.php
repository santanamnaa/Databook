<?php
session_start();
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
                    <h4>Book Add
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Publication Year</label>
                            <input type="text" name="year" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_book" class="btn btn-primary">Save Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>