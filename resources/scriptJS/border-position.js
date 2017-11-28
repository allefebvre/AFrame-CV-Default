AFRAME.registerComponent('border-position', {

    init: function () {
        var el = this.el;

        setInterval(function () {
            if (el.getAttribute("position").x > 50 || el.getAttribute("position").x < -50 ||
                    el.getAttribute("position").z > 50 || el.getAttribute("position").z < -50) {
                el.setAttribute("position", {x: 0, z: 0});
            }
        }, 5000);
    }
});