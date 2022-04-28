<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/3fc531ce88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/customerlist.css">
</head>

<body>
    <?php include  ROOT_DIR . "/views/components/header.php"; ?>
    <main>
        <section class="container">

            <div class="row mb-4 ">
                <div class="col-12">
                    <h1 class="text-center">CUSTOMERS LIST</h1>
                </div>
            </div>

            <div class="row mb-3 justify-content-between align-items-center">
                <div class="col-2"><a href="Customers/create" class="create-link ">
                        <i class="fa-solid fa-circle-plus"></i>
                        ADD
                    </a></div>
                <div class="col-4">
                    <form action="#" method="POST" class="d-flex align-items-center justify-content-end">
                        <input type="text" name="keyword" class="form-control" placeholder="Search...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">CREATE DATE</th>
                                <th scope="col">UPDATE DATE</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">DELETE</th>
                            </tr>
                        </thead>
                        <?php if (!empty($customers)) { ?>
                        <tbody>
                            <?php foreach ($customers as $customer) { ?>
                            <tr>
                                <th scope="row" class="border"><?= $customer['id'] ?></th>
                                <td class="border"><?= $customer['name'] ?></td>
                                <td class="border"><?= $customer['email'] ?></td>
                                <td class="border"><?= $customer['created_date'] ?></td>
                                <td class="border"><?= $customer['updated_date'] ?></td>
                                <td class="border">
                                    <a href="Customers/edit/<?= $customer['id'] ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>
                                </td>
                                <td class="border">
                                    <a href="Customers/delete/<?= $customer['id'] ?>" class="text-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>

</html>