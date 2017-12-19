/**
 * Animation when click in mobile (fuse = 1000)
 * 
 */
AFRAME.registerComponent('cursor-mobile', {
    init: function () {
        var el = this.el;
        var circle = document.createElement("a-ring");
        circle.setAttribute("geometry", "thetaStart:-90; thetaLength:0; radiusInner: 0.03; radiusOuter: 0.06");
        circle.setAttribute("color", "#00FF55");
        el.appendChild(circle);
        var timeout;
        var fusing = false;

        var setEvent = function () {
            var displayFusing = function (prog) {
                circle.setAttribute("geometry", "thetaStart:90; thetaLength:" + prog + "; radiusInner: 0.03; radiusOuter: 0.06");
                if (prog < 360 && fusing) {
                    timeout = setTimeout(displayFusing, 70, prog + 45);
                } else {
                    timeout = setTimeout(function(){
                        circle.setAttribute("geometry", "thetaStart:90; thetaLength:0; radiusInner: 0.03; radiusOuter: 0.06");
                    }, 600)
                }
            }

            el.addEventListener('fusing', function () {
                fusing = true;
                displayFusing(45);
            });

            el.addEventListener('mouseleave', function () {
                fusing = false;
                clearTimeout(timeout);
                circle.setAttribute("geometry", "thetaStart:90; thetaLength:0; radiusInner: 0.03; radiusOuter: 0.06");
            });
        };
        setTimeout(setEvent, 3000);
    }
});