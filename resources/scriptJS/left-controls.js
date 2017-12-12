var getAbsolutePosition = function (element) {
    var getPos = function (el) {
        if (el.getAttribute("id") === "a-scene") {
            return {x: 0, y: 0, z: 0};
        }
        var pos = el.getAttribute("position");
        var posP = getPos(el.parentNode);

        return {x: pos.x + posP.x, y: pos.y + posP.y, z: pos.z + posP.z};
    };
    return getPos(element);
};


AFRAME.registerComponent('left-controls', {
    schema: {
        targetMove: {type: 'string', default: 'cameraRig'},
        speedMoveTrackpad: {type: 'number', default: '10'},
        powerSpawnSpheres: {type: 'number', default: '50'},
        eventSpawnSpheres: {type: 'string', default: 'menudown'},
        distanceSpheres: {type: 'number', default: '0.4'}
    },

    init: function () {
        var el = this.el;
        
        /// Trackpad move
        el.movecontrols = {movX: 0, movY: 0, movZ: 0};
        el.movecontrols.enabled = false;
        var texts = document.getElementById("texts");
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
        
        
        /// Menu
        el.menu = { visible:false, select: 1}
        var menu = document.getElementById("menu-left");
        el.addEventListener('gripdown', function (event) {
            el.menu.visible = !el.menu.visible;
            if (el.menu.visible) {
                menu.children[0].setAttribute('visible', 'true');
            } else {
                menu.children[0].setAttribute('visible', 'false');
            }
        });
        
        menu.children[0].children[0].addEventListener('click', function(){
            if (el.menu.visible) {
                el.menu.select = 1;
                menu.children[0].children[0].children[0].setAttribute("color", "red");
                menu.children[0].children[1].children[0].setAttribute("color", "black");
                menu.children[0].children[2].children[0].setAttribute("color", "black");
            }
        });
        menu.children[0].children[1].addEventListener('click', function(){
            if (el.menu.visible) {
                el.menu.select = 2;
                menu.children[0].children[0].children[0].setAttribute("color", "black");
                menu.children[0].children[1].children[0].setAttribute("color", "red");
                menu.children[0].children[2].children[0].setAttribute("color", "black");
            }
        });
        menu.children[0].children[2].addEventListener('click', function(){
            if (el.menu.visible) {
                el.menu.select = 3;
                menu.children[0].children[0].children[0].setAttribute("color", "black");
                menu.children[0].children[1].children[0].setAttribute("color", "black");
                menu.children[0].children[2].children[0].setAttribute("color", "red");
            }
        });

        
        /// Interaction cylinder
        var down;
        el.addEventListener('triggerdown', function () {
            clearTimeout(down);
            for (i = 0; i < 4; i++) {
                el.children[i].setAttribute('visible', 'true');
                el.children[i].emit("up");
            }
        });
        el.addEventListener('triggerup', function () {
            for (i = 0; i < 4; i++) {
                el.children[i].emit("down");
            }
            down = setTimeout(function () {
                for (i = 0; i < 4; i++) {
                    el.children[i].setAttribute('visible', 'false');
                    el.children[i].setAttribute('position', '0 0 0');
                }
            }, 300);
        });


        /// Spawn spheres
        var scene = document.getElementById("a-scene");
        var power = this.data.powerSpawnSpheres;
        var dataEvent = this.data.eventSpawnSpheres;
        var distanceStart = this.data.distanceSpheres;
        el.addEventListener(dataEvent, function (event) {
            console.log(event);
            var sphere = document.createElement("a-sphere");
            var pos = getAbsolutePosition(el);
            var rot = el.getAttribute("rotation");

            sphere.setAttribute("position", {
                x: pos.x - Math.sin(rot.y / 180 * Math.PI) * Math.cos(rot.x / 180 * Math.PI) * distanceStart,
                y: pos.y + Math.sin(rot.x / 180 * Math.PI) * distanceStart,
                z: pos.z - Math.cos(rot.y / 180 * Math.PI) * Math.cos(rot.x / 180 * Math.PI) * distanceStart
            });

            sphere.setAttribute("radius", "0.2");
            sphere.setAttribute("dynamic-body", "");
            scene.appendChild(sphere);

            var impulse = {
                x: power * Math.sin(rot.y / 180 * Math.PI) * Math.cos(rot.x / 180 * Math.PI),
                y: -power * Math.sin(rot.x / 180 * Math.PI),
                z: power * Math.cos(rot.y / 180 * Math.PI) * Math.cos(rot.x / 180 * Math.PI)
            };

            sphere.addEventListener("body-loaded", function () {
                sphere.body.applyImpulse(new CANNON.Vec3(impulse.x, impulse.y, impulse.z), new CANNON.Vec3().copy(sphere.getAttribute('position')));
                setTimeout(function () {
                    sphere.body.applyImpulse(new CANNON.Vec3(-impulse.x, -impulse.y, -impulse.z), new CANNON.Vec3().copy(sphere.getAttribute('position')));
                }, 50);
            });

            setTimeout(function () {
                sphere.setAttribute('opacity', "0.5");
            }, 4000);

            setTimeout(function () {
                scene.removeChild(sphere)
            }, 5000);
        });
        

        el.movecontrols2 = {
            leftcontrol: document.getElementById("left-control"),
            rightcontrol: document.getElementById("right-control"),
            delta_list: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            deltaY_old:0,
            speed: 0
        }
        
        movecontrols2 = function(){
            var posL = el.movecontrols2.leftcontrol.getAttribute('position');
            var posR = el.movecontrols2.rightcontrol.getAttribute('position');
            var deltaY = Math.abs(posL.y - posR.y);
            var delta = Math.abs(deltaY - el.movecontrols2.deltaY_old);
            console.log(delta);
            if(delta > 0){ // A changer
                el.movecontrols2.delta_list[0] = delta;
            } else {
                el.movecontrols2.delta_list[0] = 0;
            }
            
            el.movecontrols2.deltaY_old = deltaY;
            var speed = 0;
            for (var i = 49, max = 0; i > max; i--) {
                el.movecontrols2.delta_list[i+1] = el.movecontrols2.delta_list[i];
            }
            for (var i = 0, max = 50; i < max; i++) {
                speed += el.movecontrols2.delta_list[i];
            }
            el.movecontrols2.speed = speed;
            setTimeout(movecontrols2, 500);
        };
        
        movecontrols2();
    },

    tick: function (time, timeDelta) {
        /// Trackpad move
        if (this.el.menu.select == 2) {
            var target = document.getElementById(this.data.targetMove);
            var pos = target.getAttribute("position");
            var speed = this.data.speedMoveTrackpad / 300;

            target.setAttribute("position", {
                x: pos.x + this.el.movecontrols.movX * timeDelta * speed,
                y: pos.y + this.el.movecontrols.movY * timeDelta * speed,
                z: pos.z + this.el.movecontrols.movZ * timeDelta * speed
            });
        }
        
        /// Movecontrols2
        if(this.el.menu.select == 3) {
            var target = document.getElementById(this.data.targetMove);
            var pos = target.getAttribute("position");
            var speed = this.data.speedMoveTrackpad / 5;
            var rot = this.el.getAttribute("rotation");
            var move = this.el.movecontrols2.speed;
            var movX = -Math.sin(rot.y / 180 * Math.PI) * speed * move / 10 * Math.cos(rot.x / 180 * Math.PI);
            var movY = Math.sin(rot.x / 180 * Math.PI) * speed * move / 10;
            var movZ = -Math.cos(rot.y / 180 * Math.PI) * speed * move / 10 * Math.cos(rot.x / 180 * Math.PI);
            
            target.setAttribute('position', {
                x: pos.x + movX,
                y: pos.y + movY,
                z: pos.z + movZ
            });
        }
    }

});