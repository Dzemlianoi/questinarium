<div class="field-row question-answers go-hide">
    <div>
        <div class="field-number">3</div>
        <div class="field-label">Pass answers for the question</div>
    </div>
    <div class="answers">
        <?php
            echo $this->render('answer.php');
        ?>
    </div>

    <button id="questionsubmit" type="button" class="with-answers btn-success btn">Save</button>
</div>