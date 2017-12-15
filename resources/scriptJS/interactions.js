var getCoord = function (pos, distance, rot) {
    var newX = pos.x - Math.sin(rot.y / 180 * Math.PI) * Math.cos(rot.x / 180 * Math.PI) * distance;
    var newY = pos.y + Math.sin(rot.x / 180 * Math.PI) * distance;
    var newZ = pos.z - Math.cos(rot.y / 180 * Math.PI) * Math.cos(rot.x / 180 * Math.PI) * distance;
    return {x: newX, y: newY, z: newZ};
};

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

AFRAME.interaction = {
    interactionObjects: []
};

/**
 * This object can be take by interaction-controller
 */
AFRAME.registerComponent('interaction-object', {
    init: function () {
        AFRAME.interaction.interactionObjects.push(this.el);
    }
});

/**
 * Can take the object with attribute : interaction-object
 */
AFRAME.registerComponent('interaction-controller', {
    init: function () {
        var interactionObjects = AFRAME.interaction.interactionObjects;
        var el = this.el;
        el.takeObject = null;
        el.takeObjectDynamic = false;

        el.addEventListener('gripdown', function () {
            var pos = getCoord(getAbsolutePosition(el), 0.2, el.getAttribute('rotation'));
            for (var i = 0; i < interactionObjects.length; i++) {
                var posObject = interactionObjects[i].getAttribute("position");
                var scaleObject = interactionObjects[i].getAttribute("scale");
                if (pos.x < posObject.x + scaleObject.x / 2 && pos.x > posObject.x - scaleObject.x / 2) {
                    if (pos.y < posObject.y + scaleObject.y / 2 && pos.y > posObject.y - scaleObject.y / 2) {
                        if (pos.z < posObject.z + scaleObject.z / 2 && pos.z > posObject.z - scaleObject.z / 2) {
                            el.takeObject = interactionObjects[i];
                            if (interactionObjects[i].hasAttribute("dynamic-body")) {
                                el.takeObjectDynamic = true;
                                el.takeObject.removeAttribute("dynamic-body");
                            } else {
                                el.takeObjectDynamic = false;
                            }
                            break;
                        }
                    }
                }
            }
        });

        el.addEventListener('gripup', function () {
            if (el.takeObject != null) {
                if (el.takeObjectDynamic) {
                    el.takeObject.setAttribute("dynamic-body", "");
                    var takeObject = el.takeObject;
                    if (takeObject.deltaPos != undefined) {
                        var impulse = takeObject.deltaPos;
                        var impulse = {x: impulse.x * -4000, y: impulse.y * -4000, z: impulse.z * -4000};
                        takeObject.body.applyImpulse(new CANNON.Vec3(impulse.x, impulse.y, impulse.z), new CANNON.Vec3().copy({x: 0, y: 0, z: 0}));
                    }
                }
                el.takeObject = null;
            }
        });
    },

    tick: function (time, deltaTime) {
        if (this.el.takeObject != null) {
            var el = this.el;
            var obj = el.takeObject;
            var pos = getCoord(getAbsolutePosition(el), 0.2, el.getAttribute('rotation'));
            obj.setAttribute("position", pos);

            if (obj.lastPos != undefined) {
                obj.deltaPos = {x: (obj.lastPos.x - pos.x) / deltaTime, y: (obj.lastPos.y - pos.y) / deltaTime, z: (obj.lastPos.z - pos.z) / deltaTime};
            }
            obj.lastPos = pos;
        }
    }
});