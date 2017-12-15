AFRAME.registerComponent('mobile-move', {
    schema: {
        target: {type: 'string'},
        height: {type: 'string', default: 2}
    },

    init: function () {
        var el = this.el;
        var target = document.getElementById(this.data.target);
        var pos = el.getAttribute("position");
        var height = this.data.height;
        
        if (target == null && target == undefined) {
            console.error("ERROR [mobile-move] : target is null")
        } else {
            el.addEventListener('click', function () {
                target.setAttribute("position", { x: pos.x, y: pos.y + height, z: pos.z });
            });
        }
    }
});