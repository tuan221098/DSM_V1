const _buttonUtils = {

    generateButton: function (action, options) {

        let button = `<a class="btn btn-icon btn-light ${options.classButton} btn-sm mr-2" href="${action}" data-toggle="tooltip" title="${options.title}"><span class="svg-icon svg-icon-md ${options.classIcon}">${options.icon}</span></a>`;

        $('[data-toggle="tooltip"]').tooltip();
        return button;
    },

    generateButtonByEvent: function (eventOnClick, options) {
        let button = `<button class="btn btn-icon btn-light ${options.classButton} btn-sm me-2" onclick="${eventOnClick}" data-toggle="tooltip" title="${options.title}"><span class="svg-icon svg-icon-md ${options.classIcon}">${options.icon}</span></button>`;
        $('[data-toggle="tooltip"]').tooltip();

        return button;
    },
}
