<?php
include "db.php";
session_start();

$p_id=$_GET["p_id"];

$sql=$conn->prepare("select * from products where p_id=?");
$sql->bind_param('i',$p_id);
$sql->execute();

$result=$sql->get_result();
$row=$result->fetch_assoc();

?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Edit Product</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>

        <main>

        <h2 class="text-center mt-5">EDIT PRODUCT</h2>

        <div class="container col-5 border rounded shadow">

            <form action="update.php" method="post">

                <input type="hidden" name="p_id" value="<?= $row['p_id'] ?>">

                <div class="mb-3 mt-4">
                    <label class="form-label">Product name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="p_name"
                        value="<?= $row['p_name'] ?>"
                        required
                    />
                </div>

                <div class="mb-3">
                    <label class="form-label">Product category</label>
                    <input
                        type="text"
                        class="form-control"
                        name="category"
                        value="<?= $row['category'] ?>"
                        required
                    />
                </div>

                <div class="mb-3">
                    <label class="form-label">Product price</label>
                    <input
                        type="text"
                        class="form-control"
                        name="price"
                        value="<?= $row['price'] ?>"
                        required
                    />
                </div>

                <div class="mb-3">
                    <label class="form-label">Product quantity</label>
                    <input
                        type="text"
                        class="form-control"
                        name="quantity"
                        value="<?= $row['quantity'] ?>"
                        required
                    />
                </div>

                <div class="mb-3">
                    <label class="form-label">Supplier Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="s_name"
                        value="<?= $row['s_name'] ?>"
                        required
                    />
                </div>

                <div class="text-center mb-4">
                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Update
                    </button>

                    <a
                        href="dashboard.php"
                        class="btn btn-danger"
                    >
                        Cancel
                    </a>
                </div>

            </form>

        </div>

        </main>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwxHj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>

    </body>
</html>