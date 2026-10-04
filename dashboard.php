<?php
include "db.php";
session_start();
$result=$conn->query("select * from products");
if($_SERVER['REQUEST_METHOD']==='POST'){
    $p_name=$_POST["p_name"];
    $category=$_POST["category"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $s_name=$_POST["s_name"];

    $sql=$conn->prepare("insert into products (p_name,category,price,quantity,s_name) values (?,?,?,?,?)");
    $sql->bind_param('ssdis',$p_name,$category,$price,$quantity,$s_name);
    if($sql->execute()){
        header("Location:dashboard.php");
    }
    }   

?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
           <nav
            class="navbar navbar-expand-sm navbar-light bg-light"
           >
            <div class="container">
                <a class="navbar-brand" href="#">Hello,<?php echo $_SESSION['email'];?></a>
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                    
                    <div class="d-flex align-items-center gap-2">
                    <form class="d-flex my-2 my-lg-0" action="pdf.php">
                        
                        <button
                            class="btn btn-outline-success my-2 my-sm-0"
                            type="submit"
                        >
                         Download PDF
                        </button>
                    </form>

                <form action="logout.php">
                    <button 
                            class="btn btn-outline-danger my-2 my-sm-0"
                            type="submit"
                            href="logout.php"
                        >
                         Log Out
                        </button>
                </form>
                    </div>
            </div>
           </nav>
           
        </header>
        <main>
        <h2 class="text-center">ADD PRODUCT</h2>
        <div
            class="container col-5 border rounded shadow "
        >
            <form action="" method="post">
                <div class="mb-3 mt-4">
                    <label for="" class="form-label">P_name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="p_name"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">P_category</label>
                    <input
                        type="text"
                        class="form-control"
                        name="category"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                </div>
                    <div class="mb-3">
                    <label for="" class="form-label">P_price</label>
                    <input
                        type="text"
                        class="form-control"
                        name="price"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                </div>

                 <div class="mb-3">
                    <label for="" class="form-label">P_quantity</label>
                    <input
                        type="text"
                        class="form-control"
                        name="quantity"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Supplier Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="s_name"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                </div>
                <div  class="text-center mb-4"> 
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                </div>
                
            </form>
        </div>
        

        <div
            class="container"
        >
            <h2 class="text-center m-5"> PRODUCT DETAILS</h2>
            <div
                class="table-responsive"
            >
                <table
                    class="table table-danger"
                >
                    <thead>
                        <tr>
                            <th scope="col">P_ID</th>
                            <th scope="col">P_Name</th>
                            <th scope="col">P_category</th>
                            <th scope="col">P_price</th>
                            <th scope="col">P_quantity</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['p_id'] ?></td>
                            <td><?= $row['p_name'] ?></td>
                            <td><?= $row['category'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= $row['s_name'] ?></td>
                            

                                 <td><a
                                name=""
                                id=""
                                class="btn btn-danger"
                                href="edit.php?p_id=<?= $row['p_id'] ?>"
                                role="button"
                                
                                
                                >EDIT</a
                            >
                            </td>
                            <td><a
                                name=""
                                id=""
                                class="btn btn-danger"
                                href="delete.php?p_id=<?= $row['p_id'] ?>"
                                role="button"
                                onclick="return confirm('Are you sure you want to delete this item?');"
                                
                                >DELETE</a
                            >
                            </td>
                        </tr>
                        
                        
                    </tbody>
                    <?php } ?>
                </table>
            </div>
            
        </div>\

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>