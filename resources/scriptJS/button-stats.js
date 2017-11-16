/**
 * Allows the display of Framerate
 * @type type
 */
AFRAME.registerComponent('button-stats', {
    schema: {type: 'string'},
    
    init: function(){
        var key = this.data;
        var el = this.el;
        document.addEventListener('keydown', function(event){
            if(event.key === key){
                if(!el.getAttribute("stats"))
                    el.setAttribute("stats", true);
                else 
                    el.setAttribute("stats", false);
            };
        });
    }
});