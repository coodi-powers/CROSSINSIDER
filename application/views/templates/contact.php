

<div class="container contact_cont">
    <div class="row">
        <div class="col-md-6 contact_form">
            <div class="well well-sm">
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('', $attributes); ?>
                    <fieldset>
                        <legend class="text-center header">Stel uw vraag hier!</legend>

                        <?php if($succes_messages != '')
                        {
                            echo '<br><div class="alert alert-success" role="alert">'.$succes_messages.'</div>';
                        }?>
                        <?php if($error_messages != '')
                        {
                            echo '<br><div class="alert alert-danger" role="alert">'.$error_messages.'</div>';
                        }?>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></span>
                            <div class="col-md-8">
                                <input id="lname" name="naam" type="text" placeholder="Naam" class="form-control">
                                <input id="middelnaam" name="middelnaam" type="hidden">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></span>
                            <div class="col-md-8">
                                <input id="berciht" name="onderwerp" type="text" placeholder="Onderwerp" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="bericht" name="bericht" placeholder="Uw bericht" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Verzenden</button>
                            </div>
                        </div>
                    </fieldset>
                <?php echo form_close();?>
            </div>
        </div>
        <div class="col-md-6 contact_form">
            <div class="well well-sm">
                <legend class="text-center header">Contactgegevens</legend>
                <div class="contact_gegevens">
                    <p>
                        Dieter Jans<br>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@crossinsider.be"> info@crossinsider.be</a><br>
                        <i class="fa fa-phone" aria-hidden="true"></i> 0478 99 57 90</p>
                </div>
            </div>

        </div>
    </div>
</div>