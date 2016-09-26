<div class="field-row question-answers go-hide">
    <div>
        <div class="field-number">4</div>
        <div class="field-label">Pass answers for the question</div>
    </div>
    <div class="answers">
        <?php
            echo $this->render('answer.php');
        ?>
    </div>

    <div class="form-group">
        <div class="label-questions">
            <label for="custom">Allow custom answer?</label>
        </div>
        <div class="input-questions">
            <input type="checkbox" value="1" id="custom" checked>
        </div>
    </div>

    <div class="form-group">
        <div class="label-questions">
            <label for="required">Required question?</label>
        </div>
        <div class="input-questions">
            <input type="checkbox" value="1" id="required">
        </div>
    </div>

    <button id="questionsubmit" type="button" class="with-answers btn-success btn">Save</button>
</div>