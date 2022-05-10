<?php

use App\Libraries\Role;

$username = Role::is_logged()['username'] ?? 'Admin';
?>
<style>
header {
    margin-bottom: 50px;
    padding-block: 15px;
    background-color: #212529;
}

a.nav-link {
    color: white;
    text-decoration: none;
    font-weight: 500;
    font-size: 18px;
}

a.nav-link i {
    margin-right: 7px;
}

#account-menu {
    background-color: transparent;
    border: none;
    font-size: 18px;
    font-weight: 500;
}

#account-menu:hover {
    color: dodgerblue;
}
</style>

<header>
    <section class="container">
        <div class="row">
            <div class="col">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>"><i class="fa-solid fa-house"></i>
                            Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>Customers"><i
                                class="fa-solid fa-people-group"></i>Customers</a>
                    </li>
                </ul>
            </div>
            <div class="col-3 ms-auto d-flex justify-content-end align-items-center">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="account-menu"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-circle-user"></i>
                        <span><?= $username ?></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="account-menu">
                        <li><a class="dropdown-item" href="<?= ROOT_URL ?>LogOut">Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</header>