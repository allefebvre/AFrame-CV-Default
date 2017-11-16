/**
 * Simulate pressing on the scroll up-button
 * @type type
 */
AFRAME.registerComponent('button-up', {
    schema: {type: 'string'},

    init: function () {
        var target = document.getElementById(this.data);
        var src = this.el;
        
        src.addEventListener('click', function () {
            src.children[0].setAttribute("position", { x: 0, y: 0, z: -0.03});
            target.scrollUp(200);
            setTimeout(function () {
                src.children[0].setAttribute("position", { x: 0, y: 0, z: 0});
            }, 200);
        });
        
        src.addEventListener('mouseenter', function(){
            src.children[0].children[0].setAttribute("color", "#534949");
            src.children[0].children[1].setAttribute("color", "#534949");
            src.children[0].children[2].setAttribute("color", "#534949");
            src.children[0].children[3].setAttribute("color", "#534949");
        });
        src.addEventListener('mouseleave', function(){
            src.children[0].children[0].setAttribute("color", "#b9a8a8");
            src.children[0].children[1].setAttribute("color", "#b9a8a8");
            src.children[0].children[2].setAttribute("color", "#b9a8a8");
            src.children[0].children[3].setAttribute("color", "#b9a8a8");
        });

    }
});

/**
 * Simulate pressing on the scroll down-button
 * @type type
 */
AFRAME.registerComponent('button-down', {
    schema: {type: 'string'},

    init: function () {
        var target = document.getElementById(this.data);
        var src = this.el;
        src.addEventListener('click', function () {
            src.children[0].setAttribute("position", { x: 0, y: 0, z: -0.03});
            target.scrollDown(200);
            setTimeout(function () {
                src.children[0].setAttribute("position", { x: 0, y: 0, z: 0});
            }, 200);
        });
        
        src.addEventListener('mouseenter', function(){
            src.children[0].children[0].setAttribute("color", "#534949");
            src.children[0].children[1].setAttribute("color", "#534949");
            src.children[0].children[2].setAttribute("color", "#534949");
            src.children[0].children[3].setAttribute("color", "#534949");
        });
        src.addEventListener('mouseleave', function(){
            src.children[0].children[0].setAttribute("color", "#b9a8a8");
            src.children[0].children[1].setAttribute("color", "#b9a8a8");
            src.children[0].children[2].setAttribute("color", "#b9a8a8");
            src.children[0].children[3].setAttribute("color", "#b9a8a8");
        });

    }
});

/**
 * Allows scrolling in the panel
 * @type type
 */
AFRAME.registerComponent('scroll', {
    schema: {type: 'string'},

    init: function () {
        var htmlElm = document.getElementById(this.data);
        var margin = 0;
        this.el.scrollDown = function (nbrPx) {
            margin = margin - nbrPx;
            htmlElm.style.marginTop = margin + "px";
        };
        this.el.scrollUp = function (nbrPx) {
            margin = margin + nbrPx;
            if (margin > 0)
                margin = 0;
            htmlElm.style.marginTop = margin + "px";
        };
    }
});