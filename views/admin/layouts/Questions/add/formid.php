<?php
if ($data['button']=='next'){
    $result="<button id='questionform' type='button' class='btn-primary btn'>Next</button>";
}else{
    $result="
        <div class='form-group marg-20'>
            <div class='label-questions'>
                <label for='required'>Required question?</label>
            </div>
            <div class='input-questions'>
                <input type='checkbox' value='1' id='required'>
            </div>
         </div>
         <button id='questionsubmit' type='button' class='btn-success btn'>Save</button>";
}
?>

<div class="field-row question-formid go-hide">
    <div>
        <div class="field-number">3</div>
        <div class="field-label">Choose the form for answer</div>
    </div>
    <div class="forms-block">
        <?php
        echo $this->render('select.php',['data'=>$data['forms']]);
        echo $result
        ?>
    </div>
</div>