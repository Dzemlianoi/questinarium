<div class="field-row question-formid go-hide">
    <div>
        <div class="field-number">3</div>
        <div class="field-label">Choose the form for answer</div>
    </div>
    <div class="forms-block">
        <?php
        echo $this->render('select.php',['data'=>$data]);
        ?>
        <button id='questionform' type='button' class='btn-primary btn'>Next</button>
    </div>
</div>