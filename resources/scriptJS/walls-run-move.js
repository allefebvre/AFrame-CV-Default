AFRAME.registerComponent('walls-run-move', {
    init : function(){
        if(this.el.ramps == undefined)
            this.el.ramps = [];
        if(this.el.walls == undefined)
            this.el.walls = [];
        
        var ramps = this.el.ramps;
        var walls = this.el.walls;

        ramps[0] = {x1: 10.5, y1: 0, z1: -5.35, x2: 14.5, y2: 5.2, z2: 5, dir: 1};

        walls[0] = {x1: 19, y1: -5, z1: -100, x2: 20.4, y2: 20, z2: 15.2};
        walls[1] = {x1: -23, y1: -5, z1: 14, x2: 26, y2: 20, z2: 20};
        walls[2] = {x1: -24, y1: -5, z1: -20, x2: -19, y2: 20, z2: 20};
        walls[3] = {x1: -25, y1: -5, z1: -100, x2: 10.75, y2: 20, z2: -14};
        walls[4] = {x1: -25, y1: -5, z1: -100, x2: 25, y2: 20, z2: -45};
        walls[5] = {x1: 10.1, y1: -5, z1: -5.4, x2: 10.6, y2: 20, z2: 5.5};
        walls[6] = {x1: 14.4, y1: -5, z1: -5.4, x2: 14.8, y2: 20, z2: 5.5};
        walls[7] = {x1: 10.1, y1: 4.6, z1: -15, x2: 10.6, y2: 20, z2: -5.4};
        walls[8] = {x1: 10.1, y1: 4.6, z1: 10.7, x2: 11.6, y2: 20, z2: 20};
        walls[9] = {x1: 10.1, y1: 4.6, z1: 10.7, x2: 14.6, y2: 20, z2: 11.7};
        walls[10] = {x1: 14.1, y1: 4.6, z1: 4.7, x2: 14.6, y2: 20, z2: 11.3};
        walls[11] = {x1: -11, y1: 4.6, z1: -16, x2: -10, y2: 20, z2: 16};
        walls[12] = {x1: -10.5, y1: 4.6, z1: 5, x2: -2.5, y2: 20, z2: 6};
        walls[13] = {x1: 1.4, y1: 4.6, z1: 5, x2: 7.1, y2: 20, z2: 6};
        walls[14] = {x1: 6.5, y1: 4.6, z1: -15, x2: 7.1, y2: 20, z2: 6};
        walls[15] = {x1: 10, y1: -5, z1: -18, x2: 24, y2: 20, z2: -14.2};
        
        var ext_door = document.getElementById("ext-door")
        ext_door.children[0].addEventListener("close", function(){
            walls[15] = {x1: 10, y1: -5, z1: -18, x2: 24, y2: 20, z2: -14.2};
        });
        ext_door.children[0].addEventListener("open", function(){
            walls[15] = {x1: 0, y1: 0, z1: 0, x2: 0, y2: 0, z2: 0};
        });
    }
});