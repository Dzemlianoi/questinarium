<?php
if ($data=='next'){
    $result="<button id='questionname' type='button' class='btn-primary btn'>Next</button>";
}else{
    $result="<button id='questionsubmit' type='button' class='btn-success btn'>Save</button>";
}
?>

<div class="field-row question-add-name go-hide">
    <div>
        <div class="field-number">2</div>
        <div class="field-label">Enter question name</div>
    </div>

    <input type="text" class="form-control question-name-input" placeholder="Question text" />
    <?=$result?>
</div>