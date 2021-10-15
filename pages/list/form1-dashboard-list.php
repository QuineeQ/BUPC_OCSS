<?php
    GLOBAL $survey;
    $default_page = 'form1-graph.php';
?>
<style>
    .page-1, .page-2, .page-3 {
        display: none;
    }
    .page-1.active, .page-2.active, .page-3.active {
        display: block;
    }
</style>
<div class="ui-breadcrumbs">
    <a type="button" data-page="page-1" class="item active">Graph</a>
    <span></span>
    <a type="button" data-page="page-2" class="item">Respondents</a>
    <span></span>
    <a type="button" data-page="page-3" class="item">Rating</a>
</div>
<div class="pages page-1 active">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="ui-card card-primary">
                <div class="body d-flex">
                    <h1 class="icon"><i class="fas fa-users"></i></h1>
                    <div class="text-box">
                        <h1 class="value"><?php echo sql_count_rows('SELECT * FROM respondents WHERE survey_id = "'.$survey['id'].'"') ?></h1>
                        <p class="meta">Total Respondents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $first_sem_list = sql_result_to_array('SELECT * FROM form1_list WHERE survey_id = "'.$survey['id'].'" AND school_year_id = 1');
                        $second_sem_list = sql_result_to_array('SELECT * FROM form1_list WHERE survey_id = "'.$survey['id'].'" AND school_year_id = 2');

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_1', 'radio_2'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_1')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_2')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_1')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_2')
                                $pa2 = $collection['value'];
                        }

                    ?>

                    <canvas id="myChart" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_3', 'radio_4'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_3')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_4')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_3')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_4')
                                $pa2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart2" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_5', 'radio_6'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_5')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_6')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_5')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_6')
                                $pa2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart3" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $first_sem_list = sql_result_to_array('SELECT * FROM form1_list WHERE survey_id = "'.$survey['id'].'" AND school_year_id = 1');
                        $second_sem_list = sql_result_to_array('SELECT * FROM form1_list WHERE survey_id = "'.$survey['id'].'" AND school_year_id = 2');


                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_7', 'radio_8', 'radio_9'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $aolr1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;
                        $aolr2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_7')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_8')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_9')
                                $aolr1 = $collection['value'];
                            if($collection['semester'] == 2 && $collection['index'] == 'radio_7')
                            $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_8')
                                $pa2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_9')
                                $aolr2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart4" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>, "aolr" : <?php echo $aolr1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>, "aolr" : <?php echo $aolr2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_10', 'radio_11'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_10')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_11')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_10')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_11')
                                $pa2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart5" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_12', 'radio_13'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_12')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_13')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_12')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_13')
                                $pa2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart6" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_14', 'radio_15'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_14')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_15')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_14')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_15')
                                $pa2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart7" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_16', 'radio_17'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_16')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_17')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_16')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_17')
                                $pa2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart8" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_18', 'radio_19'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_18')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_19')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_18')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_19')
                                $pa2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart9" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="ui-card chart">
                <div class="body">
                    <?php

                        $collections = constructGraph($first_sem_list, $second_sem_list, array('radio_20', 'radio_21'));

                        $qosp1 = 0;
                        $pa1 = 0;
                        $qosp2 = 0;
                        $pa2 = 0;

                        foreach($collections as $collection) {
                            //echo 'value: '.$collection['value'] . '<br/>';
                            if($collection['semester'] == 1 && $collection['index'] == 'radio_20')
                            $qosp1 = $collection['value'];
                            else if($collection['semester'] == 1 && $collection['index'] == 'radio_21')
                                $pa1 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_20')
                                $qosp2 = $collection['value'];
                            else if($collection['semester'] == 2 && $collection['index'] == 'radio_21')
                                $pa2 = $collection['value'];
                        }


                    ?>

                    <canvas id="myChart10" data-first='{"qosp" : <?php echo $qosp1 ?>, "pa" : <?php echo $pa1 ?>}'
                                        data-second='{"qosp" : <?php echo $qosp2 ?>, "pa" : <?php echo $pa2 ?>}'
                    ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pages page-2">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="ui-card card-primary">
                <div class="body d-flex">
                    <h1 class="icon"><i class="fas fa-users"></i></h1>
                    <div class="text-box">
                        <h1 class="value"><?php echo sql_count_rows('SELECT * FROM respondents WHERE survey_id = "'.$survey['id'].'"') ?></h1>
                        <p class="meta">Total Respondents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $respondents = sql_result_to_array('SELECT * FROM respondents WHERE survey_id = "'.$survey['id'].'"');
        foreach($respondents as $respondent) {
            $form1 = sql_result_to_solo('SELECT * FROM form1_list WHERE survey_id =  "'.$survey['id'].'" AND respondent_id = "'.$respondent['id'].'"');
            ?>
            <div class="comments-section">
                <div class="comment-item">
                    <p><?php echo $respondent['name'] ?></p>
                    <p class="overall-remarks"><?php echo $form1['remarks_11'] ?><span>Overall Remarks</span></p>
                    <a type="button" class="tgl">
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <p>Admission Office</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>Registrar's Office</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>Office of the Student Services</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>Library Services</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>Guidance Center</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>Cashier's Office</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>School Canteen</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>Medical and Dental Services</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>Civil Security</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                        <li>
                            <p>Infrastracture/Utilities</p>
                            <p class="comment"><?php echo $form1['remarks_1'] ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
        }
    ?>
</div>
<div class="pages page-3">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="ui-card card-primary">
                <div class="body d-flex">
                    <h1 class="icon"><i class="fas fa-users"></i></h1>
                    <div class="text-box">
                        <h1 class="value"><?php echo sql_count_rows('SELECT * FROM respondents WHERE survey_id = "'.$survey['id'].'"') ?></h1>
                        <p class="meta">Total Respondents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


 <div class="comments-section">
                <div class="comment-item ">

                    <p>I. Admission Office</p> <br>

                </div>
            </div>
            
</div>
