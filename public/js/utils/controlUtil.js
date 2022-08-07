$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(function () {
    const eleMenuAccordionLink = $('.menu-accordion');
    const eleMenuLink = $('.menu-accordion .menu-sub-accordion .menu-link');
    eleMenuAccordionLink.each(function () {
        const eleMenu = $(this);
        const keyMenu = eleMenu.data('menu-key');

        eleMenuLink.each(function () {
            if ($(this).hasClass('active')) {
                const keySubMenu = $(this).data('menu-key');
                if (keyMenu === keySubMenu.substring(0, keySubMenu.indexOf('.'))) {
                    eleMenu.addClass('show');
                }
            }

        });
    })

})
const _controlUtils = {
    configSweetDeleteAlert: function () {
        return {
            title: `<label>Bạn có chắc muốn xóa thông tin này?</label>`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: `Xác nhận`,
            cancelButtonText: ` Hủy bỏ`,
            cancelButtonColor: "#F64E60",
        };
    },

    datatablesOptions: function (drawCallback) {
        return {
            processing: true,
            serverSide: true,
            filter: false,
            info: true,
            ordering: false,
            lengthChange: true,
            lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],
            pageLength: 10,
            dom: "frtlp",
            autoWidth: true,
            searchDelay: 1000,
            fnDrawCallback: function (oSettings) {
                if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                } else {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                }

                if (drawCallback) {
                    drawCallback();
                }
            }
        };
    },
    datatablesLanguages: function (languageMessage) {
        return {
            language: {
                decimal: '',
                emptyTable: languageMessage && languageMessage.emptyTable ? languageMessage.emptyTable : 'Không tìm thấy dữ liệu phù hợp',
                info: 'Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi',
                infoEmpty: 'Hiển thị 0 từ 0 của 0 bản ghi',
                infoFiltered: '(tìm kiếm từ _MAX_ bản ghi)',
                infoPostFix: '',
                thousands: '',
                lengthMenu: 'Hiển thị _MENU_ bản ghi',
                loadingRecords: '<div class="table-loading-message">Đang xử lý...</div>',
                processing: '<div class="table-loading-message">Đang xử lý...</div>',
                search: 'Tìm Kiếm: ',
                zeroRecords: 'Không tìm thấy dữ liệu phù hợp',
                paginate: {
                    first: 'Đầu',
                    last: 'Cuối',
                    next: '>>',
                    previous: '<<',
                },
                aria: {
                    sortAscending: ': activate to sort column ascending',
                    sortDescending: ': activate to sort column descending',
                }
            }
        };
    },

    datatablesAjax: function (selector) {
        return {
            'ajax': {
                'url': $(selector)[0].action,
                'type': 'POST',
                'data': function (d) {
                    let formElement = $(selector)[0];
                    let formData = new FormData(formElement);
                    formData.forEach((value, key) => {
                        if (!Reflect.has(d, key)) {
                            d[key] = value;
                            return;
                        }
                        if (!Array.isArray(d[key])) {
                            d[key] = [d[key]];
                        }
                        d[key].push(value);
                    });
                }
            }
        };
    },

    datatablesColumns: function (selector, actionColumn) {
        let columns = [];

        $(selector).find('thead tr th').each(function (index, element) {
            let jqElement = $(element);
            let skip = jqElement.data('table-skip') == 'true' || jqElement.data('table-skip') == true;
            let avatar = jqElement.data('table-avatar') == 'true' || jqElement.data('table-avatar') == true;
            let image = jqElement.data('table-image') == 'true' || jqElement.data('table-image') == true;
            let href = jqElement.data('table-href');
            let dot = jqElement.data('table-dot');
            let onClick = jqElement.data('table-onClick');
            let target = jqElement.data('table-target');
            let order = jqElement.data('table-order');
            let typeBadge = jqElement.data('table-type-badge');
            let quantityBadge = jqElement.data('table-quantity-badge');
            let statusBadge = jqElement.data('table-status-badge');
            let controlName = jqElement.data('table-name');
            let controlChecked = jqElement.data('table-checked');
            let controlIcon = jqElement.data('table-icon');
            let controlSwitch = jqElement.data('table-switch');
            let clickSwitch = jqElement.data('table-switch-click');
            let controlClass = jqElement.data('table-class') || '';
            let controlQtyClass = jqElement.data('table-qty-class') || '';

            if (skip) return;

            if (avatar) {
                columns.push({
                    'class': controlClass,
                    'render': function (data, type, full, meta) {
                        var sanitized = $.fn.dataTable.render.text().display(full.userProfile.imagePath);
                        return `<img src = "${sanitized}" class="image-fuild max-h-50px rounded" />`;
                    },
                });
            } else if (image) {
                columns.push({
                    'class': controlClass,
                    'render': function (data, type, full, meta) {
                        var sanitized = $.fn.dataTable.render.text().display(full.imagePath);
                        return '<img class="image-fuild max-h-50px rounded" src="' + sanitized + '" />';
                    },
                });

            } else if (href) {
                columns.push({
                    'class': controlClass,
                    'autoWidth': true,
                    'render': function (data, type, full, meta) {
                        if (target == null || target == undefined) {
                            target = '';
                        }
                        href = href.replace("ValId", full.id);

                        return `<a href="${href}" target="${target}">${full.code}</a>`;
                    },
                });
            } else if (onClick) {
                columns.push({
                    'class': controlClass,
                    'autoWidth': true,
                    'render': function (data, type, full, meta) {

                        return `<a href="javascript:void(0)" onclick="${onClick}">${full.code}</a>`;
                    },
                });
            } else if (order) {
                columns.push({
                    'class': controlClass,
                    'render': function (data, type, full, meta) {
                        return (meta.settings.oAjaxData.start + 1) + meta.row;
                    },
                });
            } else if (statusBadge) {
                columns.push({
                    'class': controlClass,
                    'autoWidth': true,
                    'render': function (data, type, full, meta) {
                        return `<span style="font-size: 100%" class="badge bg-${full.status_badge} mr-2"> ${full.status_name}</span>`;
                    },
                });
            } else if (typeBadge) {
                columns.push({
                    'class': controlClass,
                    'autoWidth': true,
                    'render': function (data, type, full, meta) {
                        return `<span style="font-size: 100%" class="badge bg-${full.type_badge} mr-2"> ${full.type_name}</span>`;
                    },
                });
            } else if (quantityBadge) {
                columns.push({
                    'class': controlClass,
                    'autoWidth': true,
                    'render': function (data, type, full, meta) {
                        return `<span style="font-size: 100%" class="badge bg-${full.quantity_badge} mr-2"> ${full.quantityStatusName}</span>`;
                    },
                });
            } else if (controlIcon) {
                columns.push({
                    'class': controlClass,
                    'autoWidth': true,
                    'render': function (data, type, full, meta) {
                        return `<i class="${full.icon}"></i>`;
                    },
                });
            } else if (controlChecked) {
                columns.push({
                    'class': controlClass,
                    'data': controlChecked,
                    'name': controlChecked,
                    'autoWidth': true,
                    'render': function (data, type, full, meta) {
                        if (full.parentId == null || full.parentId == undefined) {
                            return `${data} <i class="flaticon2-correct text-success icon-md ml-2"></i> `;
                        }
                        return `${data}`;

                    },
                });
            } else if (controlSwitch) {
                columns.push({
                    'class': controlClass,
                    'render': function (data, type, full, meta) {
                        return `<span class="switch switch-sm switch-icon">
                                <label>
                                 <input type="checkbox" ${full.isShow ? "checked" : ""} name="switch" data-id="${full.id}" onclick="${clickSwitch}"/>
                                 <span></span>
                                </label>
                               </span>`;
                    },
                });
            } else if (dot) {
                columns.push({
                    'class': controlClass,
                    'data': dot,
                    'name': dot,
                    'autoWidth': true,
                    'render': function (data, type, full, meta) {
                        return `<span class="label label-xl label-dot label-${full.dotType} mr-2"></span> ${data}`;
                    },
                });
            } else if (controlQtyClass) {
                columns.push({
                    'autoWidth': true,
                    'class': controlClass,
                    'render': function (data, type, full, meta) {
                        var sanitized = $.fn.dataTable.render.text().display(full[controlName]);
                        if (full[controlName] == 0) {
                            return `<span class="${controlQtyClass}">${sanitized}</span>`;
                        } else {
                            return sanitized;
                        }
                    },
                });
            } else {
                columns.push({
                    'data': controlName,
                    'name': controlName,
                    'autoWidth': true,
                    'render': $.fn.dataTable.render.text(),
                    'class': controlClass,
                });
            }
        });

        if (actionColumn) {
            columns.push(actionColumn);
        }

        return {
            'columns': columns,
        };
    },

    datatablesInit: function (filterSelector, tableSelector, actionColumn, drawCallback, languageMessage) {
        const datatableOptions = Object.assign({},
            _controlUtils.datatablesOptions(drawCallback),
            _controlUtils.datatablesAjax(filterSelector),
            _controlUtils.datatablesColumns(tableSelector, actionColumn),
            _controlUtils.datatablesLanguages(languageMessage));
        return $(tableSelector).DataTable(datatableOptions);
    },
}
