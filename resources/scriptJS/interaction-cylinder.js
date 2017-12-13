AFRAME.registerComponent('interaction-cylinder', {
    init: function () {
        var el = this.el;
        var down_TimeOut;

        var up = [];
        var down = [];
        for (var i = 0; i < 3; i++) {
            up[i] = document.createElement("a-animation");
            down[i] = document.createElement("a-animation");
            up[i].setAttribute("attribute", "position");
            down[i].setAttribute("attribute", "position");
            up[i].setAttribute("dur", (i + 1) * 100);
            down[i].setAttribute("dur", (i + 1) * 100);
            up[i].setAttribute("from", "0 0 0");
            down[i].setAttribute("to", "0 0 0");
            up[i].setAttribute("begin", "up");
            down[i].setAttribute("begin", "down");
            up[i].setAttribute("easing", "linear");
            down[i].setAttribute("easing", "linear");
        }
        up[0].setAttribute("to", "0 0 -0.4");
        down[0].setAttribute("from", "0 0 -0.4");
        up[1].setAttribute("to", "0 0 -0.8");
        down[1].setAttribute("from", "0 0 -0.8");
        up[2].setAttribute("to", "0 0 -1.2");
        down[2].setAttribute("from", "0 0 -1.2");

        var cylinder = [];
        for (var i = 0; i < 4; i++) {
            cylinder[i] = document.createElement("a-cylinder");
            cylinder[i].setAttribute("static-body", "");
            cylinder[i].setAttribute("visible", "false");
            cylinder[i].setAttribute("radius", "0.07");
            cylinder[i].setAttribute("height", "0.4");
            cylinder[i].setAttribute("rotation", "90 0 0");
            cylinder[i].setAttribute("color", "#555555");
            if (i > 0) {
                cylinder[i].appendChild(up[i - 1]);
                cylinder[i].appendChild(down[i - 1]);
            }
            el.appendChild(cylinder[i]);
        }


        el.addEventListener('triggerdown', function () {
            clearTimeout(down_TimeOut);
            for (i = 0; i < 4; i++) {
                el.children[i].setAttribute('visible', 'true');
                el.children[i].emit("up");
            }
        });

        el.addEventListener('triggerup', function () {
            for (i = 0; i < 4; i++) {
                el.children[i].emit("down");
            }
            down_TimeOut = setTimeout(function () {
                for (i = 0; i < 4; i++) {
                    el.children[i].setAttribute('visible', 'false');
                    el.children[i].setAttribute('position', '0 0 0');
                }
            }, 300);
        });
    }
});