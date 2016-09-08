<form class="form-delete go-hide" role="form" method="post">
    <select class="form-control">
    <?
        foreach ($data as $form) {
            echo $this->render('option.php',['form'=>$form]);
        }
    ?>

    </select>
    <button type="button" class="btn form-delete-form btn-primary admin-submit admin-add-butt">Delete</button>
</form>