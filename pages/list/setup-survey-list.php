<?php
    GLOBAL $form;
    GLOBAL $forms;  
?>
<div class="ui-card main">
    <div class="header">
        <h1><?php echo $form['title'] ?></h1>
        <p><i class="fas fa-check-circle mr-2"></i>Current Survey Used</p>
    </div>
    <div class="body">
        <?php builtinerror() ?>
        <form action="<?php echo self() ?>" method="post">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select name="survey_form_id" class="custom-select" required>
                            <option disabled selected>--Choose a survey form--</option>
                            <?php
                                foreach($forms as $temp) {
                                    echo '<option value="'.$temp['id'].'">'.$temp['title'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <input type="submit" class="ui-btn ui-btn-primary btn-block" value="Create Survey"> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>