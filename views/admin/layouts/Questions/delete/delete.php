<form class="question-delete form-delete go-hide" role="form" method="post">

    <select class="form-control">
        <?
        foreach ($data as $question) {
            echo $this->render('option.php',['question'=>$question]);
        }
        ?>
    </select>
    <button type="button" class="btn form-delete-form btn-primary admin-submit">Delete</button>
</form>