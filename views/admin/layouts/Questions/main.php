<div class="show-form-div questions-form-div">
    <table class="forms-show questions-show">
        <thead>
            <tr>
                <th>Question</th>
                <th>Type</th>
                <th>Form</th>
                <th>Answers</th>
            </tr>
            </thead>
        <tbody>
        <?php
            foreach ($data as $question){
                echo $this->render('row.php',['question'=>$question]);
            }
        ?>
        </tbody>
    </table>
</div>

<div class="form-add">
    <button type="button" id="questionadd" class="button-forms-add-nav btn btn-success">
        <i class="glyphicon glyphicon-plus"></i> Add a question
    </button>

    <button type="button" id="questionadd" class="button-forms-add-nav btn btn-primary">
        <i class="glyphicon glyphicon-pencil"></i> Edit a question
    </button>

    <button type="button" id="admindel" class="button-forms-add-nav btn btn-warning">
        <i class="glyphicon glyphicon-minus"></i> Delete a question
    </button>
</div>

<div class="form-add-workspace">
</div>


