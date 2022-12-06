<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Menu</li>
                <li class="breadcrumb-item active">Menu Management</li>
                <!-- <li class="breadcrumb-item active">Tabs</li> -->
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Management</h5>
                        <!-- Alert flash data -->
                        <?= $this->session->flashdata('message'); ?>

                        <!-- Default Tabs -->
                        <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">
                                    <i class="bi bi-folder2"> </i> Menu
                                </button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    <i class="bi bi-folder2-open"> </i>Sub Menu
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2" id="myTabjustifiedContent">
                            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">

                                <!-- Modal Add Menu -->
                                <button type="button" class="btn btn-primary btn-sm mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#addMenu">
                                    <i class="bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#addMenu"> </i>
                                    Tambah
                                </button>

                                <!-- Modal Add New Menu -->
                                <?php $this->load->view('menu/modal/menu/add_menu_modal') ?>



                                <!-- Table with hoverable rows -->
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Menu</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($user_menu as $menu) : ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $menu['menu_for'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMenu<?= $menu['menu_id'] ?>"><i class="bi bi-pencil-square text-white"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteMenu<?= $menu['menu_id'] ?>"><i class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Menu -->
                                            <?php $this->load->view('menu/modal/menu/edit_menu_modal'); ?>
                                            <!-- Modal Delete Menu -->
                                            <?php $this->load->view('menu/modal/menu/delete_menu_modal'); ?>

                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <!-- End Table with hoverable rows -->


                            </div>
                            <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">


                                <!-- Modal Add Sub Menu -->
                                <button type="button" class="btn btn-primary btn-sm mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#addSubMenu">
                                    <i class="bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#addSubMenu"> </i>
                                    Tambah
                                </button>
                                <?php $this->load->view('menu/modal/sub_menu/add_sub_menu_modal') ?>

                                <!-- Table with hoverable rows -->
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">URL</th>
                                            <th scope="col">Icons</th>
                                            <th scope="col">Status</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1; ?>
                                        <?php foreach ($user_sub_menu as $sub_menu) : ?>

                                            <?php
                                            if ($is_active =  $sub_menu['is_active'] == 1) {

                                                $is_active = 'Active';
                                                $bg_badge = 'bg-success';
                                            } else {
                                                $is_active = 'Non Active';
                                                $bg_badge = 'bg-secondary';
                                            } ?>

                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>

                                                <td><?= $sub_menu['menu_for'] ?></td>
                                                <td><?= $sub_menu['title_menu'] ?></td>
                                                <td><?= $sub_menu['url_menu'] ?></td>
                                                <td><?= $sub_menu['icon_menu'] ?></td>
                                                <td><span class="badge <?= $bg_badge ?>"><?= $is_active ?></span></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSubMenu<?= $sub_menu['sub_menu_id'] ?>"><i class="bi bi-pencil-square text-white"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteSubMenu<?= $sub_menu['sub_menu_id'] ?>"><i class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Sub Menu -->
                                            <?php $this->load->view('menu/modal/sub_menu/edit_sub_menu_modal'); ?>
                                            <!-- Modal Delete Sub Menu -->
                                            <?php $this->load->view('menu/modal/sub_menu/delete_sub_menu_modal'); ?>

                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">




                            </div>
                        </div><!-- End Default Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->