const _buttonUtils = {

    generateButton: function (action, options) {

        let button = `<a class="btn btn-icon ${options.classButton} btn-sm mr-2" href="${action}" data-toggle="tooltip" title="${options.title}"><i class="${options.icon} align-middle"></i></a>`;

        $('[data-toggle="tooltip"]').tooltip();
        return button;
    },

    generateButtonByEvent: function (eventOnClick, options) {
        let button = `<button class="btn btn-icon ${options.classButton} btn-sm me-2" onclick="${eventOnClick}" data-toggle="tooltip" title="${options.title}"><i class="${options.icon} align-middle"></i></button>`;
        $('[data-toggle="tooltip"]').tooltip();

        return button;
    },
}
