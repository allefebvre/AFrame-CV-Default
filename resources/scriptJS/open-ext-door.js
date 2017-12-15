/*
 * Open the ext door
 */
AFRAME.registerComponent('open-ext-door', {
    init: function () {
        var el = this.el;
        var ext_door = document.getElementById("ext-door");
        var floor3 = document.getElementById("floor3");
        var open = 0;
        var timeout;
        
        var emit = function(event, index){
            floor3.children[index].emit(event);
            if(index < floor3.children.length - 1)
                setTimeout(emit, 100, event, index+1);
        };

        el.addEventListener('click', function () {
            if (open === 0) {
                ext_door.children[0].emit('open');
                ext_door.children[1].emit('open');
                open = 1;
                timeout = setTimeout(function() {
                    ext_door.setAttribute('position', "14.25 -20 -14.5");
                }, 1000);
                setTimeout(emit, 500, "up", 0);
            } else {
                clearTimeout(timeout);
                ext_door.setAttribute('position', "14.25 5 -14.5");
                ext_door.children[0].emit('close');
                ext_door.children[1].emit('close');
                open = 0;
                setTimeout(emit, 1000, "down", 0);
            }
            
            el.setAttribute("scale", {x: 1, y: 0.15, z: 1});
            setTimeout(function () {
                el.setAttribute("scale", {x: 1, y: 0.2, z: 1});
            }, 200);
        });
    }
});