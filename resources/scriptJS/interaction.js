AFRAME.registerComponent("interaction", {
    init: function () {
        var el = this.el;

        el.addEventListener('trackpaddown', function () {
            for (i = 0; i < 4; i++) {
                el.children[i].setAttribute('visible', 'true');
                el.children[i].emit("up");
            }
        });

        el.addEventListener('trackpadup', function () {
            for (i = 0; i < 4; i++) {
                el.children[i].emit("down");
            }
            setTimeout(function () {
                for (i = 0; i < 4; i++) {
                    el.children[i].setAttribute('visible', 'false');
                    el.children[i].setAttribute('position', '0 0 0');
                }
            }, 300);
        });
    }
});