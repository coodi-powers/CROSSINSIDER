<?php

$datum = new DateTime($interview->datum);
$datum = $datum->format('d-m-Y');
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo empty($interview->id) ? 'Toevoegen' : 'Wijzigen ' . $interview->naam; ?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php
                    $attributes = array('class' => 'form-horizontal');
                    echo form_open('', $attributes); ?>

                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="username">Type:</label>
                        <div class="col-md-10">
                            <?php echo form_dropdown('type', $arr_types, $this->input->post('type') ? $this->input_post('type') : $interview->type, 'class="select_2"'); ?>
                        </div>
                    </div> <!-- formrow -->

                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="naam_vader">Naam:</label>
                        <div class="col-md-10">
                            <?php echo form_input('naam', $interview->naam); ?>
                        </div>
                    </div> <!-- formrow -->

                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="naam_vader">Titel:</label>
                        <div class="col-md-10">
                            <?php echo form_input('titel_nl', $interview->titel_nl); ?>
                        </div>
                    </div> <!-- formrow -->

                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="naam_vader">Auteur:</label>
                        <div class="col-md-10">
                            <?php echo form_input('auteur', $interview->auteur); ?>
                        </div>
                    </div> <!-- formrow -->

                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="geboortedatum">Datum:</label>
                        <div class="col-md-10">
                            <input id="datepicker" type="text" name="datum" value="<?php echo $datum; ?>" class="form-control datepicker">
                        </div>
                    </div> <!-- formrow -->

                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="afbeelding">Afbeelding:</label>
                        <div class="col-md-10">
                            <div class="input-group m-b">
                                <span class="input-group-btn"><button type="button" class="btn btn-primary" onclick="BrowseServer('Images:/','afbeelding');">Selecteer</button></span>
                                <?php echo form_input('afbeelding', $interview->afbeelding); ?>
                            </div>
                        </div>
                    </div> <!-- formrow -->

                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="vader">Intro:</label>
                        <div class="col-md-10">
                            <?php echo $this->ckeditor->editor("intro_nl",$interview->intro_nl); ?>
                        </div>
                    </div> <!-- formrow -->

                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="vader">Inhoud:</label>
                        <div class="col-md-10">
                            <?php echo $this->ckeditor->editor("inhoud_nl",$interview->inhoud_nl); ?>
                        </div>
                    </div> <!-- formrow -->

                    <div class="form-group">
                        <div class=" col-lg-12">
                            <button class="btn btn-success  dim" type="submit" name="submit_form" id="submit_form">
                                <i class="fa fa-check"></i>&nbsp;Bewaren
                            </button>
                        </div>
                    </div>

                    <!-- submitknop -->
                    <?php echo form_close();?>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end wrapper -->

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'beschrijving' );
</script>
