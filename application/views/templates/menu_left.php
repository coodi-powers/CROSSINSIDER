<?php
/**
 * Created by PhpStorm.
 * User: bartbollen
 * Date: 2/03/16
 * Time: 23:00
 */
?>

<div class="col-md-4">
    <ul class="nav nav-pills nav-stacked subnav-links">
        <?php foreach($left_menu_items as $menu_item): ?>
            <?php
            $active = "";
            if($page->id == $menu_item['id'])
            {
                $active = "active";
            }
            ?>
        <li role="presentation" class="<?php echo $active; ?>"><a href="<?php echo base_url('index.php/'.$menu_item['slug']); ?>"><?php echo $menu_item['title']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="col-md-8">
    <div class="content-block text-center">
        <h1><?php echo $page->title; ?></h1>
        <p>
            <?php echo $page->body; ?>
        </p>
    </div>
</div>