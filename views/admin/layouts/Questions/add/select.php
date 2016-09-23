<select class="form-control">
    <?
    foreach ($data as $form) {
        echo $this->render('option.php',['form'=>$form]);
    }
    ?>
</select>