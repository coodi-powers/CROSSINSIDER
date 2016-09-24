<?php
/**
 * Created by PhpStorm.
 * User: bartbollen
 * Date: 2/03/16
 * Time: 23:00
 */
?>


<?php

foreach ($archief as $archief_item)
{
    print_r($archief_item);
    echo '<br>';
}

if($_GET['id'] == '')
{

?>

<div id="news-listing" class="container-fluid">
    <div class="section">
        <div class="row">
            <div class="col-sm-9">
                <div id="site-content" class="site-content">
                    <h1 class="section-title title"><a href="listing.html"><?php echo $page_title; ?></a></h1>
                    <div class="middle-content">
                        <div class="section">
                            <div class="row archief-index">

                                <?php
                                foreach ($elements as $element)
                                {
                                    $page = '';
                                    if($element['detail_page'] != '')
                                    {
                                        $page = '/public_html/index.php/'.$element['detail_page'];
                                    }

                                    $link = $page.'?id='.$element[$id_field];
                                    echo '
                                    <div class="col-sm-6 col-md-4">
                                        <div class="post medium-post well well-sm">
                                            <div class="entry-header">
                                                <div class="entry-thumbnail img_post">
                                                    <img class="img-box-post" src="'.$element['afbeelding'].'" alt="">
                                                </div>
                                            </div>
                                            <div class="post-content">
                                                <div class="entry-meta">
                                                    <ul class="list-inline">
                                                        <li class="publish-date"><i class="fa fa-clock-o"></i> '.date("d-m-Y", strtotime($element['datum'])).' </li>
                                                        <li class="publish-date"><i class="fa fa-pencil" aria-hidden="true"></i> '.$element['auteur'].'</li>
                                                    </ul>
                                                </div>
                                                <h2 class="entry-title">
                                                    <a href="'.$link.'">'.$element['titel_nl'].'</a>
                                                </h2>
                                                <div class="entry-content">
                                                    <p>'.$element['intro_nl'].'</p>
                                                </div>
                                                <a class="btn btn-primary btn-lg btn-readmore" href="'.$link.'">Lees meer</a>
                                            </div>
                                        </div><!--/post-->
                                    </div>
                                    ';
                                }
                                ?>



                            </div>
                        </div><!--/.lifestyle -->
                    </div><!--/.middle-content-->
                </div><!--/#site-content-->
            </div>

            <div class="widget">
                <h2 class="section-title">Recente posts</h2>
                <ul class="comment-list">
                    <?php
                    foreach ($recent_elements as $element)
                    {
                        echo '
                                    <li>
                                        <div class="post small-post">
                                            <div class="post-content">
                                                <div class="entry-meta">
                                                    <ul class="list-inline">
                                                        <li class="publish-date"><a href="?id='.$element[$id_field].'">'.date("d-m-Y", strtotime($element['datum'])).' </a></li>
                                                    </ul>
                                                </div>
                                                <h2 class="entry-title">
                                                    <a href="'.$element['detail_page'].'?id='.$element[$id_field].'">'.$element['titel_nl'].'</a>
                                                </h2>
                                            </div>
                                        </div><!--/post-->
                                    </li>
                                    ';
                    }
                    ?>
                </ul>
            </div><!-- widget -->
        </div>
    </div><!--/#sitebar-->
</div>

<?php }

elseif($id_field == 'interview_id') { ?>

    <div id="newsdetails" class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div id="site-content" class="site-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="left-content">
                                    <div class="details-news">
                                        <div class="post">


                                            <?php
                                            foreach ($elements as $element) {
                                                echo '
                                                <div class="col-md-12 post-content">
                                                    <img class="afb_detail" src="' . $element['afbeelding'] . '" alt="">
                                                </div>
                                                
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><i class="fa fa-clock-o"></i>' . date("d-m-Y", strtotime($element['datum'])) . '</a></li>
                                                            <li class="publish-date"><i class="fa fa-pencil" aria-hidden="true"></i> ' . $element['auteur'] . '</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        ' . $element['titel_nl'] . '
                                                    </h2>
                                                    <div class="entry-content">
                                                        ' . $element['inhoud_nl'] . '
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            ?>


                                        </div><!--/post-->
                                    </div><!--/.section-->
                                </div><!--/.left-content-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-4">
                            <a class="btn btn-primary btn-lg btn-readmore" href="<?php echo $this->uri->segment(1); ?>">Terug
                                naar archief</a>
                        </div>
                    </div>
                </div><!--/#site-content-->
            </div><!--/.col-sm-9 -->

            <a id="back-to-top" href="#" class="btn btn-lg back-to-top" role="button"
               title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </a>

        </div>
    </div><!--/.container-fluid-->
<?php
}
elseif($id_field == 'reportage_id')
{ ?>

    <div id="newsdetails" class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div id="site-content" class="site-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="left-content">
                                    <div class="details-news">
                                        <div id="slider" class="flexslider">
                                            <ul class="slides">

                                            <?php
                                            foreach ($elements as $element)
                                            {
                                                $arr_fotos = array();
                                                $dir = str_replace('/public_html', '.', $element['album']);

                                                if ($handle = opendir($dir)) {

                                                    while (false !== ($entry = readdir($handle))) {

                                                        if ($entry != "." && $entry != "..") {

                                                            array_push($arr_fotos, $entry);
                                                        }
                                                    }

                                                    closedir($handle);
                                                }
                                                else
                                                {
                                                    echo 'Map niet gevonden';
                                                }

                                                asort($arr_fotos);

                                                foreach($arr_fotos as $foto)
                                                {
                                                    echo '
                                                            <li>
                                                                <div class="slider-img-padding"><img class="slide_img" src="'.$element['album'].'/'.$foto.'" alt="Dieter Jans" /></div>
                                                            </li>';
                                                }


                                                echo '
                                            </ul>
                                            </div>
                                            <div class="post">
                                                
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><i class="fa fa-clock-o"></i>'.date("d-m-Y", strtotime($element['datum'])).'</a></li>
                                                            <li class="publish-date"><i class="fa fa-pencil" aria-hidden="true"></i> '.$element['auteur'].'</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        '.$element['titel_nl'].'
                                                    </h2>
                                                    <div class="entry-content">
                                                        '.$element['inhoud_nl'].'
                                                    </div>
                                                </div>
                                            </div><!--/post-->
                                                ';
                                            }
                                            ?>



                                    </div><!--/.section-->
                                </div><!--/.left-content-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-4">
                            <a class="btn btn-primary btn-lg btn-readmore" href="<?php echo $this->uri->segment(1); ?>">Terug naar archief</a>
                        </div>
                    </div>
                </div><!--/#site-content-->
            </div><!--/.col-sm-9 -->

            <a id="back-to-top" href="#" class="btn btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </a>

        </div>
    </div><!--/.container-fluid-->


<?php } ?>
