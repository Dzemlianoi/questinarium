<?php

$table='<div class="show-form-div"><table class="forms-show"><thead><tr><th>ID</th><th>Name</th><th>Order</th><th>Q of Questions</th></tr></thead><tbody>';
foreach ($data['data'] as $form){
    $id=$form['id'];
    $name=$form['name'];
    $order=$form['disorder'];
    $quantity=$form['quantity'];
    $table.="<tr id='form$id' name='$order'><td>$id</td><td>$name</td><td>$order</td><td>$quantity</td></tr>";
}
$table.='</tbody></table></div>';
$url_for_form_add='\'/views/admin/formadd_add.php\'';
$button='
<div class="form-add">
    <button type="button" onClick="showFormForAdd('.$url_for_form_add.')" class="button-forms-add-nav btn btn-success">
        <i class="glyphicon glyphicon-plus"></i> Add a form
    </button>
    <button type="button" onClick="showChangeOrder()" class="button-forms-add-nav btn btn-primary">
        <i class="glyphicon glyphicon-sort-by-order"></i>  Change an order
    </button>
    <button type="button" onClick="deleteForm()" class="button-forms-add-nav btn btn-warning">
        <i class="glyphicon glyphicon-minus"></i> Delete form
    </button>
</div>';

$div='
<div class="form-add-workspace">
</div>';
$result=$table.$button.$div;
echo $result;
?>

