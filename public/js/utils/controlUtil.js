$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
const _controlUtil={
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
}
