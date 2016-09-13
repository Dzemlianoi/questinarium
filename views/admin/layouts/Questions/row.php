<?php
if (!empty($question['answers'])){
    $data='<ul>';
    foreach ($question['answers'] as $answer){
        $name_answer=$answer['answer'];
        $data.="<li>$name_answer</li>";
    }
    $data.='</ul>';
}else{
    $data='-';
}
?>

<tr id="question<?=$question['id']?>"?>
    <td><?=$question['name']?></td>
    <td><?=$question['type']?></td>
    <td><?=$question['form']['name']?></td>
    <td><?=$data?></td>
</tr>

