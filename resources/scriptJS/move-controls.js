AFRAME.registerComponent('move-controls', {
    schema: {
        target: {type: 'string'},
        speed: {type: 'number', default: '10'}
    },

    init: function () {
        console.log("init move-controls");

        var el = this.el;

        el.movecontrols = {movX: 0, movY: 0, movZ: 0};
        el.movecontrols.enabled = false;

        /*el.addEventListener('touchstart', function (event) {
         console.log("===== touch start =====");
         console.log(event);
         });
         
         el.addEventListener('touchend', function (event) {
         console.log("===== touch end =====");
         console.log(event);
         });*/

        el.addEventListener('axismove', function (event) {
            var axis1 = event.detail.axis[0];
            var axis2 = event.detail.axis[1];
            var rot = el.getAttribute("rotation");

            el.movecontrols.movX = -Math.sin(rot.y / 180 * Math.PI) * axis2 / 10 * Math.cos(rot.x / 180 * Math.PI)
                    + Math.cos(rot.y / 180 * Math.PI) * axis1 / 10 * Math.cos(rot.z / 180 * Math.PI);

            el.movecontrols.movY = Math.sin(rot.x / 180 * Math.PI) * axis2 / 10 + Math.sin(rot.z / 180 * Math.PI) * axis1 / 10;

            el.movecontrols.movZ = -Math.cos(rot.y / 180 * Math.PI) * axis2 / 10 * Math.cos(rot.x / 180 * Math.PI)
                    - Math.sin(rot.y / 180 * Math.PI * axis1 / 10) * Math.cos(rot.z / 180 * Math.PI);

        });

        el.addEventListener('gripdown', function (event) {
            el.movecontrols.enabled = !el.movecontrols.enabled;
        });

    },

    tick: function (time, timeDelta) {
        if (this.el.movecontrols.enabled) {
            var target = document.getElementById(this.data.target);
            var pos = target.getAttribute("position");
            var speed = this.data.speed / 300;

            target.setAttribute("position", {
                x: pos.x + this.el.movecontrols.movX * timeDelta * speed,
                y: pos.y + this.el.movecontrols.movY * timeDelta * speed,
                z: pos.z + this.el.movecontrols.movZ * timeDelta * speed
            });
        }
    }

});