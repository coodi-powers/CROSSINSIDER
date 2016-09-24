<?php
/**
 * Created by PhpStorm.
 * User: bartbollen
 * Date: 2/03/16
 * Time: 23:00
 */
?>

<div class="container-fluid">

    <?php echo $plugins; ?>

    <div class="section">
        <div class="row">
            <div class="col-sm-3">
                <h1 class="section-title title">Sponsors</h1>
                <div class="left-sidebar">

                    <?php
                    foreach($partners_left as $partner)
                    {
                        echo '<a href="'.$partner->link.'" class="partner-link" target="_blank"><img src="'.$partner->foto.'" alt="'.$partner->naam.'" /></a>';
                    }
                    ?>
                </div><!--/left-sidebar-->
            </div>

            <div class="col-sm-6">
                <div id="site-content" class="site-content">
                    <h1 class="section-title title">Laatste nieuws</h1>
                    <div class="middle-content">
                        <div id="top-news" class="section top-news">
                            <div class="post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="public_html/index.php/<?php echo $element['detail_pagina'].'?id='.$element['id']; ?>"><img class="lastnews-link" src="<?php echo $element['afbeelding']; ?>" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="publish-date"><i class="fa fa-clock-o"></i><?php echo $element['datum']; ?></a></li>
                                            <li class="publish-date"><i class="fa fa-pencil" aria-hidden="true"></i> <?php echo $element['auteur']; ?></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="public_html/index.php/<?php echo $element['detail_pagina'].'?id='.$element['id']; ?>"><?php echo $element['titel_nl']; ?></a>
                                    </h2>
                                    <div class="entry-content">
                                        <?php echo $element['intro_nl']; ?>
                                    </div>
                                </div>
                            </div><!--/post-->
                        </div><!--/.middle-content-->
                    </div><!--/#site-content-->
                </div>

                <a id="back-to-top" href="#" class="btn btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                </a>

            </div>
            <div class="col-sm-3">
                <h1 class="section-title title">Sponsors</h1>
                <div class="left-sidebar">
                    <?php
                    foreach($partners_right as $partner)
                    {
                        echo '<a href="'.$partner->link.'" class="partner-link"><img src="'.$partner->foto.'" alt="'.$partner->naam.'" /></a>';
                    }
                    ?>
                </div><!--/left-sidebar-->
            </div>
        </div><!--/.section-->
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="col_sponser">Uw logo hier?</h3>
        </div>
        <div class="col-md-12 text-center btn_sponser">
            <a class="btn btn-primary btn-lg btn-readmore" href="/public_html/index.php/contact">Sponser de website</a>
        </div>
    </div>
</div><!--/.container-fluid-->