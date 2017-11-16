/**
 * Turn off / Turn on the spots
 * @type type
 */
AFRAME.registerComponent('light-toggle-spot', {
    init: function(){
        var el = this.el;
        el.addEventListener('click', function () {
            if(el.children[0].getAttribute('visible')){
                el.children[0].setAttribute('visible', false);
                el.children[1].setAttribute('visible', false);
            } else {
                el.children[0].setAttribute('visible', true);
                el.children[1].setAttribute('visible', true);
            }
        });
    }
});

/**
 * Turn off / Turn on the lights
 * @type type
 */
AFRAME.registerComponent('light-toggle', {
    init: function(){
        var el = this.el;
        el.addEventListener('click', function () {
            if(el.children[0].getAttribute('visible')){
                el.children[0].setAttribute('visible', false);
                el.children[1].setAttribute('color', "#999999");
            } else {
                el.children[0].setAttribute('visible', true);
                el.children[1].setAttribute('color', "#ffffff");
            }
        });
    }
});