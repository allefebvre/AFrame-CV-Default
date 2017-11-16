/**
 * Function that will correct the player's position :
 *  el : element to correct
 *  it : number of times the correction will be performed (with 100 ms interval)
 *  correction : new height
 * @type type
 */
AFRAME.registerComponent('height-correction', {

    init: function () {
        positioning = function (el, it, correction) {
            if (el.getAttribute("position").y < correction) //we verify if the correction is necessary
                el.setAttribute("position", {x: el.getAttribute("position").x, y: correction, z: el.getAttribute("position").z});
            if (it > 1)
                setTimeout(positioning, 100, el, it - 1, correction);
        };

        setInterval(function (el) {

            if (el.getAttribute("position").y < 1.6) { // if we are above the floor
                positioning(el, 2, 1.6);
            } else {
                var posY = el.getAttribute("position").y;
                if (posY > 5 && posY < 6.9) { // we are in the 1st stage
                    var posX = el.getAttribute("position").x;
                    if (posX > -10 && posX <= 10) { // we are on the plateforme (in X)
                        var posZ = el.getAttribute("position").z;
                        if (posZ > -14.5 && posZ < 14.5) { // we are on the plateforme (in Z)
                            positioning(el, 2, 6.9);
                        }
                    } else if (posX > 10 && posX < 14.4) { // we are on the plateforme (in X)
                        var posZ = el.getAttribute("position").z;
                        if (posZ > 5 && posZ < 11) // On the east at the top of the ramp (in Z)
                            positioning(el, 2, 6.9);
                    }
                }
            }
        }, 200, this.el);
    }
});