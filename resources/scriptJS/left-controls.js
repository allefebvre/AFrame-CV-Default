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
        /// Toggle trackpad move
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
    },

    tick: function (time, timeDelta) {
        /// Trackpad move
        if (this.el.movecontrols.enabled) {
            var target = document.getElementById(this.data.targetMove);
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