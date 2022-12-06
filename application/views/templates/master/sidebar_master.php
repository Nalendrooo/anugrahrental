<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php foreach ($menu as $m) : ?>

            <li class="nav-heading"><?= $m['menu_for']; ?></li>

            <!-- Query Sub Menu -->
            <?php
            $menu_id = $m['menu_id'];
            $query = "SELECT * 
             FROM `user_sub_menu` 
             JOIN `user_menu` 
             ON `user_sub_menu`.`menu_id` = `user_menu`.`menu_id`
             WHERE `user_sub_menu`.`menu_id` = $menu_id 
             AND `user_sub_menu`.`is_active` = 1 ";

            $sub_menu = $this->db->query($query)->result_array();

            foreach ($sub_menu as $sm) : ?>

                <?php $active = $title == $sm['title_menu'] ? "active" : "collapsed" ?>

                <li class="nav-item">
                    <a class="nav-link <?= $active ?>" href="<?= $sm['url_menu']; ?>">
                        <i class="<?= $sm['icon_menu']; ?>"></i>
                        <span><?= $sm['title_menu']; ?></span>
                    </a>
                </li>

                <!-- End Dashboard Nav -->

            <?php endforeach; ?>
            <!-- End Loop Sub Menu -->

        <?php endforeach; ?>
        <!-- End Loop Access Menu -->

    </ul>

</aside><!-- End Sidebar-->