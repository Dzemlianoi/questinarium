<form class="form-change go-hide" role="form" method="post">
    <label class="label">Changing order of the chosen forms </label>
    <select id="form1" class="form-control">
        <?
        foreach ($data as $form) {
            echo $this->render('option.php',['form'=>$form]);
        }
        ?>
    </select>
    <select id="form2" class="form-control">
        <?
        foreach ($data as $form) {
            echo $this->render('option.php',['form'=>$form]);
        }
        ?>
    </select>
    <button type="button" class="form-changeorder-form btn btn-primary admin-submit">Change</button>
</form>