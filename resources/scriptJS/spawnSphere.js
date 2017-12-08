var getAbsolutePosition = function (element) {
    var getPos = function (el) {
        if (el.getAttribute("id") === "a-scene") {
            return {x: 0, y: 0, z: 0};
        }
        var pos = el.getAttribute("position");
        var posP = getPos(el.parentNode);

        return {x: pos.x + posP.x, y: pos.y + posP.y, z: pos.z + posP.z};
    }
    return getPos(element);
}


AFRAME.registerComponent("spawn-sphere", {
    schema: {
        power: {type: 'number', default: '50'},
        key: {type: 'string', default: 'n'},
        event: {type: 'string', default: 'keydown'},
        distanceStart: {type: 'number', default: '1'}
    },
    
    init: function () {
        var el = this.el;
        var scene = document.getElementById("a-scene");
        var power = this.data.power;
        var key = this.data.key;
        var dataEvent = this.data.event;
        var distanceStart = this.data.distanceStart;
        
        document.addEventListener(dataEvent, function (event) {
            if (dataEvent !== 'keydown' || event.key === key) {
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
                
                setTimeout(function(){
                    sphere.setAttribute('opacity', "0.5");
                }, 8000);
                
                setTimeout(function(){
                    scene.removeChild(sphere)
                }, 10000);
            }
        });
    }
});