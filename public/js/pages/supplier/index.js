// supplier
var oTable = null;
$(function () {
    initialDataTable();

})

 function showModal() {
     $('#supplierModal').modal('show');
 }

 function hideModal() {
     $('#supplierModal').modal('hide');
 }
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

    oTable = _controlUtils.datatablesInit('#frmSearch', '#supplier-grid', actionColumns, null,
        {
            emptyTable: 'Không tìm thấy danh mục sản phẩm theo yêu cầu'
        });
}

$('#frmSearch').on('submit', function (e) {
    e.preventDefault();
    oTable.draw();
});

$('.status-search').on('change', function (e) {
    oTable.draw();
});


function loadForm(id) {
    $.ajax({
        url: supplierConstants.loadFormUrl,
        method: 'POST',
        data: {id: id},
        success: function (response) {
            $('#supplierModal #frmSupplier').html(response);
            showModal();
        }
    })
}

$('#frmSupplier').validate(validate('#frmSupplier'));
function validate(frm) {
    return {
        onkeyup: false,
        onclick: false,
        errorClass: 'text-danger',
        errorElement: 'small',
        rules: {
            'code_supplier': {
                required: true,
            },
            'name_supplier': {
                required: true,
                maxlength: 191,
            },
            'email': {
                required: true,
                maxlength: 191,
            },
            'phone': {
                number:true,
            },
            'status': {
                required: true,
            },
        },
        messages: {
            'code_supplier': {
                required: 'Mã nhà cung cấp là bắt buộc',
            },
            'name_supplier': {
                required: 'Tên nhà cung cấp là bắt buộc',
                maxlength: 'Tên nhà cung cấp không được quá 191 ký tự',
            },
            'email': {
                required: 'Email là bắt buộc',
                maxlength: 'Email không được quá 191 ký tự',
            },
            'phone': {
                number: 'Không nhập ký tự',
            },
            'status': {
                required: 'Trạng thái là bắt buộc',
            }
        },
        submitHandler: function (form) {
            const id = $(frm).find('#supplierId').val();
            let router = supplierConstants.storeUrl;
            let method = 'POST';
            if (id !== '') {
                router = supplierConstants.updateUrl.replace('ValId', id);
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
                url: supplierConstants.destroyUrl.replace("ValId", id),
                method: 'DELETE',
                success: function (response) {
                    _flashUtils.message(response.success, response.message);
                    oTable.draw();
                }
            });
        }
    });
}
