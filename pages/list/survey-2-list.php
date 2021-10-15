<?php
    GLOBAL $survey;
    GLOBAL $form;
    GLOBAL $forms;
?>
<div class="ui-card main">
    <div class="header">
        <h1><?php echo $form['title'] ?></h1>
        <p><i class="fas fa-check-circle mr-2"></i>Current Survey Used</p>
    </div>
    <div class="body">
        <table class="ui-table">
            <thead>
                <tr>
                    <th>Survey Name</th>
                    <th>Date Started</th>
                    <th>Respondents</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $latest = read_survey_latest();
                    $surveys = sql_result_to_array('SELECT * FROM survey_list');
                    foreach($surveys as $survey) {
                        $form = $forms[$survey['survey_form_id'] - 1];
                        ?>
                            <tr>
                                <td><?php echo $form['title'].' '.condition($survey['id'], $latest['id'], '<span class="text-warning"><i class="fas fa-check-circle"></i></span>') ?></td>
                                <td><?php echo $survey['date'] ?></td>
                                <td><?php echo sql_count_rows('SELECT * FROM respondents WHERE survey_id = "'.$survey['id'].'"') ?></td>
                                <td>
                                    <?php
                                        if($survey['id'] == $latest['id']) {
                                            echo '<a href="admin-dashboard.php" class="btn btn-primary">View</a>';
                                        } else {
                                            echo '<a href="admin-recent-survey.php?id='.$survey['id'].'" class="btn btn-primary">View</a>';
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>