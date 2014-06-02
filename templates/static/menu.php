<div class="menu-area">
   <h6><?php echo @$_SESSION['user']['first_name'].' '.@$_SESSION['user']['last_name'] ?></h6>
   <ul class="listview">
        <li class="list-group-container">
            <ul class="list-group">
                <?php if (isset($_SESSION['user']['role'])): ?>
                <li>
                    <a href="<?php echo URL::site('/user') ?>">User</a>
                </li>
                <li>
                    <a href="<?php echo URL::site('/role') ?>">Role</a>
                </li>
                <?php endif ?>
                <li>
                    <a href="<?php echo URL::site('/credential') ?>">Credential</a>
                </li>
                <li>
                    <a href="<?php echo URL::site('/logout') ?>">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</div>