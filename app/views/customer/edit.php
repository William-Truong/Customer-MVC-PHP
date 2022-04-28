<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/3fc531ce88.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include  ROOT_DIR . "/views/components/header.php"; ?>
    <main>
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-4">
                    <form action="Customers/edit" method="POST">
                        <h1 class="mb-3">Edit Customer</h1>
                        <div class="mb-2">
                            <label for="" class="form-label">Id: <?= $customer['id'] ?></label>
                            <input type="hidden" name="id" value="<?= $customer['id'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="<?= $customer['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" value="<?= $customer['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Created Date: <?= $customer['created_date'] ?></label>
                        </div>
                        <hr class="mb-4">
                        <div class="d-flex justify-content-between">
                            <a href="<?= ROOT_URL ?>Customers" class="link-dark">Back to list</a>
                            <button type="submit" class="btn btn-dark">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>