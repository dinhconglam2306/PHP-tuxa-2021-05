$(document).ready(function () {
    let tableForm = $('#table-form');
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Xác nhận xóa',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $(this).attr('href');
            }
          })
    });

    $('.btn-apply-bulk-action').click(function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let action = $('.slb-bulk-action').val();
        console.log(action)
        if (action) {
            let countChecked = $('input[name="cid[]"]:checked').length;
            if (countChecked) {
                url = url.replace('value_new', action);
                console.log(url);
                tableForm.attr('action', url);
                tableForm.submit();
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Vui lòng chọn ít nhất một dòng dữ liệu!',
                    showConfirmButton: false,
                    timer: 2500
                  })
            }
        } else {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Vui lòng chọn action để thực hiện!',
                showConfirmButton: false,
                timer: 2500
              })
        }
    });

    $('#check-all-cid').change(function () {
        let checked = $(this).is(':checked');
        $('input[name="cid[]').prop('checked', checked);
    });
});
