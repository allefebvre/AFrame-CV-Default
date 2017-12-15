/**
 * Allows to toggle the display of Framerate
 * 
 * Schema : 
 * 
 * Name                 | Type      | Description                               | Default
 * ================================================================================================
 * key                  | string    | key to toggle display Framerate           | p
 * 
 */
AFRAME.registerComponent('button-stats', {
    schema: {
        key: {type: 'string', default: "p"}
    },

    init: function () {
        var key = this.data;
        var el = this.el;
        document.addEventListener('keydown', function (event) {
            if (event.key === key) {
                if (!el.getAttribute("stats"))
                    el.setAttribute("stats", true);
                else
                    el.setAttribute("stats", false);
            }
            ;
        });
    }
});