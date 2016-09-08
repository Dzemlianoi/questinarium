var admin_work_wrapper=$('.wrapper-work-admin');

$('document').ready(function(){

    var lighter= $('#lighter').val();
    if (lighter!='') {
        $('#' + lighter).addClass('admin-become-active');
        $('#' + lighter + ' i').addClass('big-ico');
    }else{
        console.log('Нечего подсвечивать мне');
    }
});

function adminInsertMessage(status,message){
    $('.message-admin').detach();
    var html_inject="<div class='message-admin-lowmargin message-admin status-"+status+"'>"+message+"</div>";
    $('.form-add-workspace').prepend(html_inject);
}

function adminRegistry(){
    var login=$('#login').val();
    var password=$('#pass').val();
    var form_block=$('.form-add-admin');

    $.ajax({
        type: "POST",
        url: "/admin/adminadd",
        data: "login="+login+"&password="+password,
        success: function(data){
            var data_array=JSON.parse(data);
            var message=data_array['message'];
            var status=data_array['status'];

            adminInsertMessage(status,message);

            form_block.addClass('form-add-admin-middle');
        }
    });
}
function showFormForAdd(url){
    $('.form-add-workspace').load(url, function(response, status, xhr) {
        if (status != "error") {
            $('.form-add-admin').fadeIn('go-hide');
        }
    });
}
function addFormDB(){
    var name=$('#name').val();
    var order=$('#order').val();
    $.ajax({
        type: "POST",
        url: "/admin/formaddDB",
        data: "name="+name+"&order="+order,
        success: function(data){
            var data_array=JSON.parse(data);
            var message=data_array['message'];
            var status=data_array['status'];
            if(data_array['status']=='green'){
                var tr=$("<tr><td>№</td><td>"+name+"</td><td>"+order+"</td><td>0</td></tr>");
                tr.insertAfter($('tr:last'));
            }

            adminInsertMessage(status,message);

        }
    });
}
function deleteForm(){
    var workspace=$('.form-add-workspace');
    var url='/views/admin/formdelete.php';
    var forms=[];

    workspace.empty();
    $.ajax({
        url: "/admin/formdelete",
        success: function(data){
            forms=JSON.parse(data);
            var options='';
            workspace.load(url, function(response, status, xhr) {
                if (status != "error") {
                    forms.forEach(function (form) {
                        var id=form['id'];
                        var name=form['name'];
                        var order=form['disorder'];
                        options+="<option value="+id+" id="+id+"><b>"+name+"</b> (Order:"+order+")</option>";
                    });
                    $('select').append($(options));
                    $('.go-hide').fadeIn('go-hide');
                }
            });
        }
    });
}
function formDelete(){
    var formid=$('select option:selected').val();
    $.ajax({
        type: "POST",
        url: "/admin/formdelete",
        data: "formid="+formid,
        success: function(data){
            var data_array=JSON.parse(data);
            var message=data_array['message'];
            var status=data_array['status'];
            if(data_array['status']=='green'){
                var tr=$('tr#form'+formid);
                var option=$('select option:selected');
                tr.detach();
                option.detach();
            }

            adminInsertMessage(status,message);
        }
    });
}
function showChangeOrder(statusInh,message,formInject){
    var url='/views/admin/formchangeorder.php';
    var workspace=$('.form-add-workspace');
    workspace.empty();
    $.ajax({
        url: "/admin/formedit",
        success: function(data){
            forms=JSON.parse(data);
            var options='';
            workspace.load(url, function(response, status, xhr) {
                if (status != "error") {
                    forms.forEach(function (form) {
                        var id=form['id'];
                        var name=form['name'];
                        var order=form['disorder'];
                        options+="<option value="+order+" id="+id+"><b>"+name+"</b> (Order:"+order+")</option>";
                    });
                    $('select#form1').append($(options));
                    $('select#form2').append($(options));
                    if (formInject){
                        $('.go-hide').fadeIn(500,function(){
                            adminInsertMessage(statusInh,message);
                        });
                    }else{
                        $('.go-hide').fadeIn(500);
                    }

                }
            });

        }
    });
}
function changeOrderDB(){
    var form1=$('select#form1 option:selected').val();
    var form2=$('select#form2 option:selected').val();

    $.ajax({
        url: "/admin/formedit",
        type: "POST",
        data: "form1="+form1+'&form2='+form2,
        success: function(data){
            var data_array=JSON.parse(data);
            var message=data_array['message'];
            var status=data_array['status'];
            if(data_array['status']=='green'){
                trChange(form1,form2);
                optionChange(form1,form2);
                showChangeOrder(status,message,true);
            }
        }
    });
}
function trChange(form1,form2){
    var tr1=$('tr[name="'+form1+'"]');
    var tr2=$('tr[name="'+form2+'"]');

    var tr1_clone=tr1.clone();
    var tr2_clone=tr2.clone();

    tr2.after(tr1_clone);
    tr1.after(tr2_clone);
    //
    tr2.remove();
    tr1.remove();
}
function optionChange(form1,form2){
    var order_form1=($('tr[name="'+form1+'"] td:nth-child(3)'));
    var order_form2=($('tr[name="'+form2+'"] td:nth-child(3)'));

    order_form1.text(form2);
    order_form2.text(form1);
    // order_form1.text(+order_form1.text()-order_form2.text());
}

