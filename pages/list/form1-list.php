<?php
    GLOBAL $option_schoolyear;
    GLOBAL $error;
?>
<form action="<?php echo self() ?>" method="post" class="wrapper">
    <?php
        builtinsuccess();
        builtinerror();
    ?>
    <div class="card elevation-off disappear-sm mb-4" enctype="multipart/form-data">
        <div class="card-header">
            <h1 class="card-header-title">Clientele Satisfaction Survey</h1>
            <p class="card-header-title-meta">Title of survey form</p>
        </div>
        <div class="card-body">
            <p class="announcement">
                Our Dear Students,
                <br/>
                <br/>
                We firmly believe that it is our duty to create an educational environment where each student is given a fair chance to live his student life. That is why we will do what is expected of us to make your stay in Bicol University a happy and rewarding experience. 
                <br/>
                <br/>
                To realize this, we want you to help us determine the areas where our support services are strong and weak so that we can sustain our strengths and improve on our weaknesses, through an impartial feedback mechanism. This is our simple way of showing that we are committed to the continual improvement of the University.

                Note: Rest assured that your response will be treated with utmost confidentiality.
            </p>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group val-name">
                        <div class="floating-label">
                            <input type="text" class="form-control" 
                                    name="name"
                                    value="<?php echo render_post('name') ?>"
                                    required>
                        </div>
                        <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Name <span>alphabets & some special characters...</span></label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group val-course_year">
                        <div class="floating-label">
                            <input type="text" class="form-control" 
                                    name="course_year"
                                    value="<?php echo render_post('course_year') ?>"
                                    required>
                        </div>
                        <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Course Year <span>e.g., BSIT-3103</span></label>
                    </div>
                </div>
                <div class= "col-sm-12 col-md-4">
                    <div class="form-group">
                        <select class="custom-select" name="school_year_id">
                            <option selected disabled>-- select schoolyear --</option>
                            <?php
                                foreach($option_schoolyear as $key => $value) {
                                    if($key == render_post('school_year_id'))
                                        echo '<option value="'.$key.'" selected>'.$value.'</option>';
                                    else
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                }
                            ?>
                        </select>
                        <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's School Year <span>Date Only</span></label>
                    </div>
                </div>
            </div>
            <br>
            <div class="note">
                <p class="title">Take Note: Please help us rate objectively the performance of our support services by encoding the appropriate number, using the following rating scales:</p>
                <ul>
                    <li>5 - Excellent</li>
                    <li>4 - Very Satisfactory</li>
                    <li>3 - Satisfactory</li>
                    <li>2 - Fair</li>
                    <li>1 - Poor</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">I. Admission Office</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_1" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_1"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_1" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_1" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_1" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_2" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_2"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_2" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_2" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_2" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_1"
                                custom-placeholder="Remarks: (Admission)"
                                value="<?php echo render_post('remarks_1') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">II. Registrar's Office</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_3" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_3"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_3" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_3" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_3" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_4" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_4"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_4" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_4" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_4" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_2"
                                custom-placeholder="Remarks: (Registrar Office)"
                                value="<?php echo render_post('remarks_2') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">III. Office of the Student Services</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_5" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_5"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_5" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_5" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_5" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_6" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_6"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_6" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_6" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_6" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_3"
                                custom-placeholder="Remarks: (Office of the Student Services)"
                                value="<?php echo render_post('remarks_3') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">IV. Library Services</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_7" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_7"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_7" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_7" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_7" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_8" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_8"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_8" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_8" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_8" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Adequacy of Library Resources</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_9" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_9"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_9" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_9" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_9" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_4"
                                custom-placeholder="Remarks: (Library Services)"
                                value="<?php echo render_post('remarks_4') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">V. Guidance Center</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_10" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_10"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_10" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_10" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_10" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_11" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_11"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_11" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_11" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_11" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_5"
                                custom-placeholder="Remarks: (Guiudance Center)"
                                value="<?php echo render_post('remarks_5') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">VI. Cashier's Office</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_12" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_12"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_12" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_12" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_12" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_13" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_13"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_13" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_13" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_13" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_6"
                                custom-placeholder="Remarks: (Cashier Office)"
                                value="<?php echo render_post('remarks_6') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">VII. School Canteen</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_14" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_14"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_14" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_14" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_14" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_15" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_15"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_15" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_15" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_15" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_7"
                                custom-placeholder="Remarks: (School Canteen)"
                                value="<?php echo render_post('remarks_7') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">VIII. Medical and Dental Services</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_16" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_16"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_16" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_16" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_16" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_17" value="1" required required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_17"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_17" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_17" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_17" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_8"
                                custom-placeholder="Remarks: (Medical and Dental Services)"
                                value="<?php echo render_post('remarks_8') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">IX. Civil Security</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_18" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_18"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_18" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_18" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_18" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_19" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_19"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_19" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_19" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_19" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_9"
                                custom-placeholder="Remarks: (Civil Security)"
                                value="<?php echo render_post('remarks_9') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p class="mb-0">X. Infrastracture/Utilities</p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quality of Service Provided</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_20" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_20"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_20" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_20" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_20" value="5">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Personal Attitude</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_21" value="1" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_21"value="2">
                                </div>
                            </td>
                            <td>    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_21" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_21" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_21" value="5">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_10"
                                custom-placeholder="Remarks: (Medical and Dental Services)"
                                value="<?php echo render_post('remarks_10') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group">
                <p>Your Overall Remarks:</p>
                <div class="form-group val-remarks">
                    <div class="floating-label">
                        <input type="text" class="form-control" 
                                name="remarks_11"
                                custom-placeholder="Overall Remarks: "
                                value="<?php echo render_post('remarks_11') ?>"
                                required>
                    </div>
                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Please leave a comment <span>alphabets & some special characters...</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary w-25" value="SUBMIT">
    </div>
</form>