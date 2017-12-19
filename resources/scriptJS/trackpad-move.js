/**
 * Trackpad controller to move
 * 
 * Schema : 
 * 
 * Name                 | Type      | Description                               | Default
 * ================================================================================================
 * targetMove           | string    | Element to move                           | cameraRig
 * speedMoveTrackpad    | number    | Speed                                     | 10
 * menuSelect           | number    | the number of option in menu to activate  | -1
 * 
 */
AFRAME.registerComponent('trackpad-move', {
    schema: {
        targetMove: {type: 'string', default: 'cameraRig'},
        speedMoveTrackpad: {type: 'number', default: 10},
        menuSelect: {type: 'number', default: -1}
    },

    init: function () {
        var el = this.el;
        this.el.targetMove = document.getElementById(this.data.targetMove);
        if (this.el.targetMove == null) {
            console.error("ERROR [trackpad-move] : target is null");
            return;
        }
        
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
    },
    
    tick: function (time, timeDelta) {
        var menuSelect = this.data.menuSelect;
        if (menuSelect == -1 || this.el.menu == undefined || this.el.menu.select == menuSelect) {
            var target = this.el.targetMove;
            var pos = target.getAttribute("position");
            var speed = this.data.speedMoveTrackpad / 300;
            target.setAttribute("position", {
                x: pos.x + this.el.movecontrols.movX * timeDelta * speed,
                y: pos.y + this.el.movecontrols.movY * timeDelta * speed,
                z: pos.z + this.el.movecontrols.movZ * timeDelta * speed
            });
        }
    }
});