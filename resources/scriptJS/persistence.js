/**
 * cookies allowing the preservation of the camera position
 * @param {type} sName
 * @param {type} sValue
 * @returns {undefined}
 */
function setCookie(sName, sValue) {
    var today = new Date(), expires = new Date();
    expires.setTime(today.getTime() + (7 * 24 * 60 * 60 * 1000));
    document.cookie = sName + "=" + encodeURIComponent(sValue) + ";expires=" + expires.toGMTString();
}
/**
 * Allow the preservation of the camera position
 * @type type
 */
AFRAME.registerComponent("persistence-position", {
    init: function () {
        var el = this.el;
        setInterval(function () {
            setCookie("posX", el.getAttribute("position").x);
            setCookie("posY", el.getAttribute("position").y);
            setCookie("posZ", el.getAttribute("position").z);
            setCookie("rotation", el.getAttribute("rotation").y);
        }, 2000);
    }
});