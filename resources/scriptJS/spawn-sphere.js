AFRAME.registerComponent('spawn-sphere', {
    schema: {
        power: {type: 'number', default: '50'},
        distance: {type: 'number', default: '1'},
        key: {type: 'string', default: 'n'},
        idScene: {type: 'string', default: 'a-scene'}
    },

    init: function () {
        var el = this.el;
        var scene = document.getElementById(this.data.idScene);
        var power = this.data.power;
        var distanceStart = this.data.distance;
        var key = this.data.key;
        var canSpawn = true;

        document.addEventListener('keydown', function (event) {
            if (event.key === key && canSpawn === true) {
                canSpawn = false;
                setTimeout(function () {
                    canSpawn = true;
                }, 100);

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
            }
        });
    }
})