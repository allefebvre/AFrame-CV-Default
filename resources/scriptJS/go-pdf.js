/**
 * Open the PDF folder in another tab
 * @type type
 */
AFRAME.registerComponent('go-pdf', {
    init: function () {
        var el = this.el;

        el.addEventListener('click', function () {
            window.open('resources/PDF', 'pdf','','');
        });
    }
});

/**
 * Open the PDF conference folder in another tab
 * @type type
 */
AFRAME.registerComponent('go-pdf-conferences', {
    init: function () {
        var el = this.el;

        el.addEventListener('click', function () {
            window.open('resources/PDF/Conferences', 'conferences','','');
        });
    }
});

/**
 * Open the PDF journals folder in another tab
 * @type type
 */
AFRAME.registerComponent('go-pdf-journals', {
    init: function () {
        var el = this.el;

        el.addEventListener('click', function () {
            window.open('resources/PDF/Journals', 'journals','','');
        });
    }
});

/**
 * Open the PDF others folder in another tab
 * @type type
 */
AFRAME.registerComponent('go-pdf-others', {
    init: function () {
        var el = this.el;

        el.addEventListener('click', function () {
            window.open('resources/PDF/Others', 'others','','');
        });
    }
});
