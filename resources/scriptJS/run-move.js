AFRAME.registerComponent('run-move', {
    schema: {
        target: {type: 'string', default: 'cameraRig'},
        speed: {type: 'number', default: '10'},
        menuSelect: {type: 'number', default: '-1'}
    },

    init: function(){
        var el = this.el;
        
        el.movecontrols2 = {
            leftcontrol: document.getElementById("left-control"),
            rightcontrol: document.getElementById("right-control"),
            delta_list: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            deltaY_old: 0,
            speed: 0
        };
        
        movecontrols2 = function () {
            var posL = el.movecontrols2.leftcontrol.getAttribute('position');
            var posR = el.movecontrols2.rightcontrol.getAttribute('position');
            if (posL != null && posR != null) {
                var deltaY = Math.abs(posL.y - posR.y);
                var delta = Math.abs(deltaY - el.movecontrols2.deltaY_old);
                if (delta > 0.05) { // A changer
                    el.movecontrols2.delta_list[0] = delta;
                } else {
                    el.movecontrols2.delta_list[0] = 0;
                }
                el.movecontrols2.deltaY_old = deltaY;

                for (var i = 24; i >= 0; i--) {
                    el.movecontrols2.delta_list[i + 1] = el.movecontrols2.delta_list[i];
                }
                var speed = 0;
                for (var i = 0, max = 25; i < max; i++) {
                    speed += el.movecontrols2.delta_list[i];
                }
                el.movecontrols2.speed = speed / 25;
            }
            setTimeout(movecontrols2, 50);
        };
        movecontrols2();
        
    },

    tick: function (time, timeDelta) {
        var menuSelect = this.data.menuSelect;
        if (menuSelect == -1 || this.el.menu.select == menuSelect) {
            var target = document.getElementById(this.data.target);
            var pos = target.getAttribute("position");
            var speed = this.data.speed / 2;
            var camera = document.getElementById("camera");
            var rot = camera.getAttribute("rotation");
            var move = this.el.movecontrols2.speed;
            var movX = -Math.sin(rot.y / 180 * Math.PI) * speed * move / 10 * Math.cos(rot.x / 180 * Math.PI);
            var movY = 0; //Math.sin(rot.x / 180 * Math.PI) * speed * move / 10;
            var movZ = -Math.cos(rot.y / 180 * Math.PI) * speed * move / 10 * Math.cos(rot.x / 180 * Math.PI);

            target.setAttribute('position', {
                x: pos.x + movX,
                y: pos.y + movY,
                z: pos.z + movZ
            });
        }
    }
});