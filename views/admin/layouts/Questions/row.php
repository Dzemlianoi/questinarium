<?php
if (!empty($question['answers'])){
    $data='<ul>';
    foreach ($question['answers'] as $answer){
        $name_answer=$answer['answer'];
        $type=$question['type'];
        $data.="<div class='has-answers-table-question'><input type='$type' disabled/> $name_answer</div>";
    }
    $data.='</ul>';
}else{
    $data='-';
}
?>

<tr id="question<?=$question['id']?>"?>
    <td><?=$question['name']?></td>
    <td><?=$question['type']?></td>
    <td><?=$data?></td>
</tr>

