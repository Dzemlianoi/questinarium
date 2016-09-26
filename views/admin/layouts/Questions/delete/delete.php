<form class="form-question-delete form-delete go-hide" role="form" method="post">

    <select class="form-control">
        <?
        foreach ($data as $question) {
            echo $this->render('option.php',['question'=>$question]);
        }
        ?>
    </select>
    <button type="button" class="btn question-delete btn-primary admin-submit">Delete</button>
</form>