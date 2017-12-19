/**
 * Control the height of the camera with keyboard
 * 
 * Schema : 
 * 
 * Name                 | Type      | Description                               | Default
 * ================================================================================================
 * up                   | string    | key to go up                              | +
 * down                 | string    | key to go down                            | -
 * 
 */
AFRAME.registerComponent("control-height", {
    schema: {
        up: {type: 'string', default: '+'},
        down: {type: 'string', default: '-'}
    },

    init: function () {
        var up = this.data.up;
        var down = this.data.down;
        var el = this.el;

        document.addEventListener('keydown', function (event) {
            if (event.key === up) {
                var y = el.getAttribute('position').y;
                el.setAttribute('position', {y: y + 0.05});
            }
            if (event.key === down) {
                var y = el.getAttribute('position').y;
                el.setAttribute('position', {y: y - 0.05});
            }
        });
    }
});