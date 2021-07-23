$(document).ready(function(){
    $('.btn-delete').on('click',function(e){
        e.preventDefault();
        let result = confirm("Bạn có chắc chắn xóa item này!");
        if(result) window.location.href = $(this).attr('href');
    })

    $('#check-all').change(function(){
        let checkStatus  = this.checked;
        $('#admin-form').find(':checkbox').each(function(){
            this.checked = checkStatus;
        })
    })
    $('#submit-apply').on('click',function(){
        let action = $('#select-box').val();
        let checkedLength = $('input:checked').length;
        let url = $(this).data('url');
        if(action == 'default'){
            alert("Xin chọn action để thực hiện!");
        }else{
            if(checkedLength){
                if(action == 'delete'){
                    url=url.replace("value_new",action);
                }else{
                    url=url.replace("value_new",'changeMultyStatus');
                }
                $('#admin-form').attr("action",url);
                $('#admin-form').submit();
            }else{
                alert("Xin chọn ít nhất một checkbox để thực hiện!");
            }
        }
    })
})