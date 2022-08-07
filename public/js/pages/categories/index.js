var oTable = null;
$(function () {
    initialDataTable();
})

function initialDataTable() {
    const actionColumns = {
        render: function (data, type, row, meta) {
            let html = "";
            html += _buttonUtils.generateButtonByEvent(`loadForm('${row.id}')`, {
                'icon': 'ri-edit-line',
                'classButton': 'btn-primary',
                'title': 'Chi tiết',
            });

            html += _buttonUtils.generateButtonByEvent(`confirmDelete(event,'${row.id}')`, {
                'icon': 'ri-close-line',
                'classButton': 'btn-danger',
                'title': 'Xóa',
            });
            return html;
        }
    };

    oTable = _controlUtils.datatablesInit('#frmSearch', '#category-grid', actionColumns, null,
        {
            emptyTable: 'Không tìm thấy danh sách hóa đơn theo yêu cầu'
        });
}

$('#frmSearch').on('submit', function (e) {
    e.preventDefault();
    oTable.draw();
});

$('.status-search').on('change', function (e) {
    oTable.draw();
});

function showModal() {
    $('#categoryModal').modal('show');
}

function hideModal() {
    $('#categoryModal').modal('hide');
}

function loadForm(id) {
    $.ajax({
        url: categoryConstants.loadFormUrl,
        method: 'POST',
        data: {id: id},
        success: function (response) {
            $('#categoryModal #frmCategory').html(response);
            showModal();
        }
    })
}

$('#frmCategory').validate(validate('#frmCategory'));
function validate(frm) {
    return {
        onkeyup: false,
        onclick: false,
        errorClass: 'text-danger',
        errorElement: 'small',
        rules: {
            'name': {
                required: true,
                maxlength: 191,
            },
            'status': {
                required: true,
            },
        },
        messages: {
            'name': {
                required: 'Tên danh mục là bắt buộc',
                maxLength: 'Tên danh mục không được quá 191 ký tự',
            },
            'status': {
                required: 'Trạng thái là bắt buộc',
            }
        },
        submitHandler: function (form) {
            const id = $(frm).find('#categoryId').val();
            let router = categoryConstants.storeUrl;
            let method = 'POST';
            if (id !== '') {
                router = categoryConstants.updateUrl.replace('ValId', id);
                method = 'PUT';
            }

            $.ajax({
                url: router,
                method: method,
                data: $(frm).serialize(),
                success: function (response) {
                    _flashUtils.message(response.success, response.message);
                    hideModal();
                    oTable.draw();
                }
            })
        }
    }
}

function confirmDelete(e, id) {
    e.preventDefault();
    Swal.fire(_controlUtils.configSweetDeleteAlert()).then(function (result) {
        if (result.value) {
            $.ajax({
                url: categoryConstants.destroyUrl.replace("ValId", id),
                method: 'DELETE',
                success: function (response) {
                    _flashUtils.message(response.success, response.message);
                    oTable.draw();
                }
            });
        }
    });
}
