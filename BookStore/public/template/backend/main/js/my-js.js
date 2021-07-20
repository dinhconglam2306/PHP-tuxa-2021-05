function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    console.log(checkboxes);
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
$(document).ready(function(){
    $('.btn-delete').on('click',function(e){
        e.preventDefault();
        let result = confirm("Bạn có chắc chắn xóa item này!");
        if(result){
            window.location.href = $(this).attr('href');
        }
    })
})