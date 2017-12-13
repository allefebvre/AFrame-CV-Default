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
        
        
        ///
        el.ramps = [];
        var ramps = el.ramps;
        ramps[0] = { x1: 10.5, y1: 0 , z1: -5.35, x2: 14.5, y2: 5.2, z2: 5, dir:2};
        
        ///
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
            var movZ = -Math.cos(rot.y / 180 * Math.PI) * speed * move / 10 * Math.cos(rot.x / 180 * Math.PI);
            
            var ramp = this.el.ramps[0];
            var movY = 0;
            if(pos.x > ramp.x1 && pos.x < ramp.x2 && pos.z > ramp.z1 && pos.z < ramp.z2){
                if(pos.z > ramp.z1 - 1 && pos.z < ramp.z2 + 1){
                    if(ramp.dir == 2){
                        var deltaY = Math.abs(ramp.y2 - ramp.y1);
                        var deltaZ = Math.abs(ramp.z2 - ramp.z1);
                        var incline = deltaY / deltaZ;
                        movY = incline * movZ;
                    }
                }
            }
            
        
        

            target.setAttribute('position', {
                x: pos.x + movX,
                y: pos.y + movY,
                z: pos.z + movZ
            });
        }
    }
});