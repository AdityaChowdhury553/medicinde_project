<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</head>

<style>
      .modal-header {
    background-color: #bff7ec;
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid #ccc;
}

.modal-header h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

</style>

<body>
    <div class="container-fluid">
        <header class="modal-header">
            <h2>Login Page</h2>
        </header>
        <div class="card m-2 p-2 border">
            <form method="POST" action="log.php">
                <div class="form-group">
                    Username<input type="text" name="username" id="username" required class="form-control"
                        placeholder="Enter Email Id Or Phone No">
                </div>
                <div class="form-group">
                    Password<input type="password" name="userpass" id="userpass" required class="form-control"
                        placeholder="******">
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-outline-info">Login</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>