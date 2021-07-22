$(document).ready(function(){
    $('.btn-delete').on('click',function(e){
        e.preventDefault();
        let result = confirm("Bạn có chắc chắn xóa item này!");
        if(result) window.location.href = $(this).attr('href');
    })

    $('#check-all').change(function(){
        let checkStatus  = this.checked;
        $('#group-form').find(':checkbox').each(function(){
            this.checked = checkStatus;
        })
    })
    $('#submit-apply').on('click',function(){
        let checked = $('#select-box option:selected').val();
        let checkedLength = $('input:checked').length;
        console.log(checkedLength);
        if(checked == 'default'){
            alert("Xin chọn action để thực hiện!");
        }else if(checked == 'delete'){
            let result = confirm("Bạn có chắc chắn xóa item này!");
            if(result){
                $('#group-form').attr('action','index.php?module=backend&controller=group&action=changeMultyStatus');
                $('#group-form').submit();
            }
        }else if(checkedLength <=0){
            alert("Xin chọn checkbox để thực hiện!");
        }else if(checked == 'default' && checkedLength <=0){
            alert("Xin chọn checkbox và action để thực hiện!");
        }else{
            $('#group-form').attr('action','index.php?module=backend&controller=group&action=changeMultyStatus');
            $('#group-form').submit();
        }
    })
    $('#filter-all').click(function(){
        $('#group-form').attr('action','index.php?module=backend&controller=group&action=index');
        $('#group-form').submit();

    })
    $('#filter-active').click(function(){
        $('#group-form').attr('action','index.php?module=backend&controller=group&action=index&status=active');
        $('#group-form').submit();

    })
    $('#filter-inactive').click(function(){
        $('#group-form').attr('action','index.php?module=backend&controller=group&action=index&status=inactive');
        $('#group-form').submit();

    })
})