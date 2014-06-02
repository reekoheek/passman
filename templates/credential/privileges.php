<?php
use \Xinix\Theme\NakedTheme\Helper\Form;
?>

<div class="listing">
    <div class="nav-mobile hidden-desktop">
        <select class="select-button">
            <option data-url="<?php echo f('controller.redirectUrl') ?>">Search</option>
            <option data-url="<?php echo f('controller.url', '/null/create') ?>">Create</option>
            <option data-url="<?php echo f('controller.url', '/'.$entry['$id']) ?>">Read</option>
            <option data-url="<?php echo f('controller.url', '/'.$entry['$id'].'/update') ?>">Update</option>
            <option data-url="<?php echo f('controller.url', '/'.$entry['$id'].'/delete') ?>">Delete</option>
            <option disabled></option>
            <option data-url="<?php echo f('controller.url', '/'.$entry['$id'].'/privileges') ?>" selected>Privileges</option>

        </select>
    </div>
    <div class="list-form">
        <form method="POST">
            <div class="form-input">
                <div class="row field field-name">
                    <div class="span-12">
                        <label>Privileges</label>
                    </div>
                </div>
                <div class="row field field-name">
                    <div class="span-12">
                        <input type="text" name="privilege[]" value="" placeholder="Input username">
                    </div>
                </div>

                <?php if (count($entry['privileges'])): ?>
                <?php foreach ($entry['privileges'] as $privilege): ?>
                <div class="row field field-name">
                    <div class="span-12">
                        <input type="text" name="privilege[]" value="<?php echo $privilege ?>">
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>

            <div class="span-12">
                <div class="row">
                    <ul class="flat">
                        <li>
                            <input type="submit">
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>
