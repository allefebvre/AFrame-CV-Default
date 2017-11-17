AFRAME.registerComponent('html2canvas', {
    schema: {
        target: {type: 'string'},
        width: {type: 'number'},
        height: {type: 'number'}
    },

    init: function () {
        var el = this.el;
        var target = this.data.target;
        var width = this.data.width;
        var height = this.data.height;
        var canvas_old;
        var count = 0;

        html2canvas(document.getElementById(target), {
            onrendered: function (canvas) {
                var assets_canvas = document.getElementById("assets_canvas");
                canvas.id = target + "_canvas";
                assets_canvas.appendChild(canvas);
                el.setAttribute("src", "#" + canvas.id);
                el.updateComponents();
                canvas_old = canvas;
            },
            height: height,
            width: width,
            background: "#111111"
        });

        el.updateCanvas = function () {
            html2canvas(document.getElementById(target), {
                onrendered: function (canvas) {
                    var assets_canvas = document.getElementById("assets_canvas");
                    canvas.id = target + "_canvas" + count;
                    assets_canvas.replaceChild(canvas, canvas_old);
                    console.log(assets_canvas);
                    el.setAttribute("src", "#changement");
                    el.setAttribute("src", "#" + canvas.id);
                    el.updateComponents();
                    canvas_old = canvas;
                    count++;
                },
                height: height,
                width: width,
                background: "#111111"
            });
        };
    }
});