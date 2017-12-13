AFRAME.registerComponent('menu-controls', {
    schema: {
        value1: { type : 'string', default: 'value1'},
        value2: { type : 'string', default: 'value2'},
        value3: { type : 'string', default: 'value3'}
    },
    
    init: function(){
        var el = this.el;
        
        var entity = document.createElement("a-entity");
        el.appendChild(entity);
        
        var box = document.createElement("a-box");
        box.setAttribute("visible", "false");
        box.setAttribute("color", "#22EEFF");
        box.setAttribute("position", "0 0.05 -0.1");
        box.setAttribute("rotation", "30 0 0");
        box.setAttribute("scale", "0.2 0.005 0.2");
        box.setAttribute("opacity", "0.25");
        entity.appendChild(box);

        var box2 = [];
        var text = [];
        for (var i = 0; i < 3; i++) {
            box2[i] = document.createElement("a-box");
            box2[i].setAttribute("mixin", "link");
            box2[i].setAttribute("scale", "0.9 1 0.2");
            box2[i].setAttribute("event-set__enter", "_event: mouseenter; color: #AAFFBB");
            box2[i].setAttribute("event-set__leave", "_event: mouseleave; color: #FFFFFF");
            text[i] = document.createElement("a-text");
            text[i].setAttribute("rotation", "-90 0 0");
            text[i].setAttribute("scale", "1 3.3 1");
            text[i].setAttribute("position", "0 0.6 0");
            text[i].setAttribute("text", "anchor:center; align:center");
            text[i].setAttribute("color", "black");
            box.appendChild(box2[i]);
            box2[i].appendChild(text[i]);
        }
        box2[0].setAttribute("position", "0 0.1 -0.3");
        box2[1].setAttribute("position", "0 0.1 0");
        box2[2].setAttribute("position", "0 0.1 0.3");
        text[0].setAttribute("value", this.data.value1);
        text[1].setAttribute("value", this.data.value2);
        text[2].setAttribute("value", this.data.value3);
        text[0].setAttribute("color", "red");
        
        
        el.menu = { visible:false, select: 1}
        var menu = entity;
        this.el.addEventListener('gripdown', function () {
            el.menu.visible = !el.menu.visible;
            if (el.menu.visible) {
                menu.children[0].setAttribute('visible', 'true');
            } else {
                menu.children[0].setAttribute('visible', 'false');
            }
        });
        
        menu.children[0].children[0].addEventListener('click', function(){
            if (el.menu.visible) {
                el.menu.select = 1;
                menu.children[0].children[0].children[0].setAttribute("color", "red");
                menu.children[0].children[1].children[0].setAttribute("color", "black");
                menu.children[0].children[2].children[0].setAttribute("color", "black");
            }
        });
        menu.children[0].children[1].addEventListener('click', function(){
            if (el.menu.visible) {
                el.menu.select = 2;
                menu.children[0].children[0].children[0].setAttribute("color", "black");
                menu.children[0].children[1].children[0].setAttribute("color", "red");
                menu.children[0].children[2].children[0].setAttribute("color", "black");
            }
        });
        menu.children[0].children[2].addEventListener('click', function(){
            if (el.menu.visible) {
                el.menu.select = 3;
                menu.children[0].children[0].children[0].setAttribute("color", "black");
                menu.children[0].children[1].children[0].setAttribute("color", "black");
                menu.children[0].children[2].children[0].setAttribute("color", "red");
            }
        });
    }
});