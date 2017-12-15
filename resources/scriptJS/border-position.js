/**
 * Teleport at 0 0 if the player go too far.
 * 
 *  * Schema : 
 * 
 * Name                 | Type      | Description                               | Default
 * ================================================================================================
 * width                | number    | max distance of camera to 0 0 (square)    | 50
 * 
 */
AFRAME.registerComponent('border-position', {
    schema: {
        width: { type: "number", default: 50},
    },
    
    init: function () {
        var el = this.el;
        var width = this.data.width;
        setInterval(function () {
            if (el.getAttribute("position").x > width || el.getAttribute("position").x < -width ||
                    el.getAttribute("position").z > width || el.getAttribute("position").z < -width) {
                el.setAttribute("position", {x: 0, z: 0});
            }
        }, 5000);
    }
});