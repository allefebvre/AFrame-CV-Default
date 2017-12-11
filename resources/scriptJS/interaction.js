AFRAME.registerComponent("interaction", {
    init: function () {
        var el = this.el;
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
    }
});