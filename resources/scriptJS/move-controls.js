AFRAME.registerComponent('move-controls', {
    schema: {
        target: {type: 'string'},
        speed: {type: 'number', default: '10'}
    },

    init: function () {
        var el = this.el;
        
        var target = document.getElementById(this.data.target);
        
        var posY = 0;

        el.movecontrols = {movX: 0, movY: 0, movZ: 0};
        el.movecontrols.enabled = false;

        el.addEventListener('axismove', function (event) {
            var axis1 = event.detail.axis[0];
            var axis2 = event.detail.axis[1];
            var rot = el.getAttribute("rotation");

            el.movecontrols.movX = -Math.sin(rot.y / 180 * Math.PI) * axis2 / 10 * Math.cos(rot.x / 180 * Math.PI)
                    + Math.cos(rot.y / 180 * Math.PI) * axis1 / 10 * Math.cos(rot.z / 180 * Math.PI);

            el.movecontrols.movY = Math.sin(rot.x / 180 * Math.PI) * axis2 / 10 
                    + Math.sin(rot.z / 180 * Math.PI) * axis1 / 10;

            el.movecontrols.movZ = -Math.cos(rot.y / 180 * Math.PI) * axis2 / 10 * Math.cos(rot.x / 180 * Math.PI)
                    - Math.sin(rot.y / 180 * Math.PI) * axis1 / 10 * Math.cos(rot.z / 180 * Math.PI);

        });

        var texts = document.getElementById("texts");

        el.addEventListener('gripdown', function (event) {
            el.movecontrols.enabled = !el.movecontrols.enabled;
            if (el.movecontrols.enabled) {
                texts.children[1].setAttribute("visible", "false");
                texts.children[0].setAttribute("visible", "true");
                setTimeout(function () {
                    texts.children[0].setAttribute("visible", "false");
                }, 1000);
            } else {
                texts.children[0].setAttribute("visible", "false");
                texts.children[1].setAttribute("visible", "true");
                setTimeout(function () {
                    texts.children[1].setAttribute("visible", "false");
                }, 1000);
                

                var pos = target.getAttribute('position');
                target.setAttribute('position', {x: pos.x , y: posY, z: pos.z});
            }
        });
        
        target.addEventListener('teleported', function(event){
            posY = event.detail.newPosition.y;
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