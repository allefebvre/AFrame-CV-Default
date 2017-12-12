AFRAME.registerComponent('right-controls', {
    schema: {
        powerSpawnSpheres: {type: 'number', default: '50'},
        eventSpawnSpheres: {type: 'string', default: 'menudown'},
        distanceSpheres: {type: 'number', default: '0.4'}
    },

    init: function () {
        var el = this.el;
        
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
    }
});