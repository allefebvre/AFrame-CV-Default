/**
 * Run to move
 * 
 * Schema : 
 * 
 * Name                 | Type      | Description                               | Default
 * ================================================================================================
 * target               | string    | id of element to move                     | cameraRig
 * camera               | string    | id of camera                              | camera
 * speed                | number    | speed                                     | 10
 * menuSelect           | number    | the number of option in menu to activate  | -1
 * leftControl          | string    | id of leftController                      | left-control
 * rightControl         | string    | id of rightController                     | right-control
 * 
 */
AFRAME.registerComponent('run-move', {
    schema: {
        target: {type: 'string', default: 'cameraRig'},
        camera: {type: 'string', default: 'camera'},
        speed: {type: 'number', default: 10},
        menuSelect: {type: 'number', default: -1},
        leftControl: {type: 'string', default: 'left-control'},
        rightControl: {type: 'string', default: 'right-control'}
    },

    init: function () {
        var el = this.el;
        el.enableRunMove = false;
        var leftControl_id = this.data.leftControl;
        var rightControl_id = this.data.rightControl;
        var leftControl = document.getElementById(leftControl_id);
        var rightControl = document.getElementById(rightControl_id);
        var target = document.getElementById(this.data.target);
        var camera = document.getElementById(this.data.camera);

        if (leftControl == null) {
            console.error("ERROR [run-move] : leftControl is null");
            return;
        }
        if (rightControl == null) {
            console.error("ERROR [run-move] : rightControl is null");
            return;
        }
        if (target == null) {
            console.error("ERROR [run-move] : target is null");
            return;
        }
        if (camera == null) {
            console.error("ERROR [run-move] : camera is null");
            return;
        }

        el.movecontrols2 = {
            leftcontrol: leftControl,
            rightcontrol: rightControl,
            delta_list: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            deltaY_old: 0,
            speed: 0,
            target: target,
            camera: camera
        };

        //---------------------------------------------------------------------- Test in computer
        /*var test = false;
         document.addEventListener("keydown", function (event) {
         if (event.key === 'v') {
         test = true;
         }
         });
         document.addEventListener("keyup", function (event) {
         if (event.key === 'v') {
         test = false;
         }
         });*/
        //-----------------------------------------------------------------------

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

                for (var i = 9; i >= 0; i--) { ///=== -1
                    el.movecontrols2.delta_list[i + 1] = el.movecontrols2.delta_list[i];
                }
                var speed = 0;
                for (var i = 0, max = 10; i < max; i++) { ///===
                    speed += el.movecontrols2.delta_list[i];
                }
                //---------------------------------------- Test in computer
                /*if (test)
                 el.movecontrols2.speed = 1;
                 else*/
                //----------------------------------------
                el.movecontrols2.speed = speed / 10;///===

            }
            setTimeout(movecontrols2, 50);
        };
        movecontrols2();

        if (el.ramps == undefined)
            el.ramps = [];
        if (el.walls == undefined)
            el.walls = [];

        el.enableRunMove = true;
    },

    tick: function (time, timeDelta) {
        if (this.el.enableRunMove) {
            var menuSelect = this.data.menuSelect;                                          //test in computer//
            if (menuSelect == -1 || this.el.menu == undefined || this.el.menu.select == menuSelect/* || true*/) {
                var target = this.el.movecontrols2.target;
                var pos = target.getAttribute("position");
                var speed = this.data.speed / 30;
                var camera = this.el.movecontrols2.camera;
                var rot = camera.getAttribute("rotation");
                var move = this.el.movecontrols2.speed;
                if(move == 0){
                    return;
                }
                var movX = -Math.sin(rot.y / 180 * Math.PI) * speed * move / 10 * Math.cos(rot.x / 180 * Math.PI);
                var movZ = -Math.cos(rot.y / 180 * Math.PI) * speed * move / 10 * Math.cos(rot.x / 180 * Math.PI);

                for (var d = 1; d < 9; d = d * 2) {
                    var newPosX = pos.x + movX * timeDelta / d;
                    var newPosZ = pos.z + movZ * timeDelta / d;
                    this.el.walls.forEach(function (wall) {
                        if (newPosX > wall.x1 && newPosX < wall.x2 && pos.z > wall.z1 && pos.z < wall.z2 && pos.y > wall.y1 && pos.y < wall.y2) {
                            if (!(pos.x > wall.x1 && pos.x < wall.x2 && pos.z > wall.z1 && pos.z < wall.z2)) {
                                movX = 0;
                            }
                        }
                        if (newPosZ > wall.z1 && newPosZ < wall.z2 && pos.x > wall.x1 && pos.x < wall.x2 && pos.y > wall.y1 && pos.y < wall.y2) {
                            if (!(pos.x > wall.x1 && pos.x < wall.x2 && pos.z > wall.z1 && pos.z < wall.z2)) {
                                movZ = 0;
                            }
                        }
                    });
                }

                var ramp = this.el.ramps[0];
                var movY = 0;
                if (pos.x > ramp.x1 && pos.x < ramp.x2 && pos.z > ramp.z1 && pos.z < ramp.z2) {
                    if (pos.y > ramp.y1 - 1 && pos.y < ramp.y2 + 3) {
                        var dir = ramp.dir;
                        switch (dir) {
                            case 0:
                                break;
                            case 1:

                                var deltaY = Math.abs(ramp.y2 - ramp.y1);
                                var deltaZ = Math.abs(ramp.z2 - ramp.z1);
                                var incline = deltaY / deltaZ;
                                if (movZ > 0 || pos.y > ramp.y1) {
                                    if (movZ < 0 || pos.y < ramp.y2 + 2) {
                                        movY = incline * movZ;
                                    }
                                }
                                break;
                            case 2:
                                break;
                            case 3:
                                var deltaY = Math.abs(ramp.y2 - ramp.y1);
                                var deltaZ = Math.abs(ramp.z2 - ramp.z1);
                                var incline = deltaY / deltaZ;
                                if (movY > 0 || pos.y > ramp.y1) {
                                    movY = incline * -movZ;
                                }
                                break;
                        }
                    }
                }

                target.setAttribute('position', {
                    x: pos.x + movX * timeDelta,
                    y: pos.y + movY * timeDelta,
                    z: pos.z + movZ * timeDelta
                });
            }
        }
    }
});