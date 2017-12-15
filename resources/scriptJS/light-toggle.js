/**
 * Turn off / Turn on the spots
 */
AFRAME.registerComponent('light-toggle-spot', {
    init: function(){
        var el = this.el;
        var distance0 = el.children[0].getAttribute('distance');
        var distance1 = el.children[1].getAttribute('distance');
        
        el.addEventListener('click', function () {
            if(el.children[0].getAttribute('distance') != 0.001){
                el.children[0].setAttribute('distance', 0.001);
                el.children[1].setAttribute('distance', 0.001);
            } else {
                el.children[0].setAttribute('distance', distance0);
                el.children[1].setAttribute('distance', distance1);
            }
        });
    }
});

/**
 * Turn off / Turn on the lights
 */
AFRAME.registerComponent('light-toggle', {
    init: function(){
        var el = this.el;
        var distance0 = el.children[0].getAttribute('distance');
        
        el.addEventListener('click', function () {
            if(el.children[0].getAttribute('distance') != 0.001){
                el.children[0].setAttribute('distance', 0.001);
                el.children[1].setAttribute('color', "#999999");
            } else {
                el.children[0].setAttribute('distance', distance0);
                el.children[1].setAttribute('color', "#ffffff");
            }
        });
    }
});