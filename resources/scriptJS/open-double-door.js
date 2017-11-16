// Allows the call of the annimation of the opening of the publication door
AFRAME.registerComponent('open-double-door', {
    init: function () {

        var door1 = document.getElementById('door1');
        var door2 = document.getElementById('door2');
        var el = this.el;

        el.addEventListener('click', function () {
            var door1X = door1.getAttribute('position').x;
            var door2X = door2.getAttribute('position').x;

            if (door1X === 0.418 && door2X === -1.737) {
                document.querySelector('#door1').emit('come');
                document.querySelector('#door2').emit('come');
                setTimeout("document.querySelector('#door1').emit('move')", 1000);
                setTimeout("document.querySelector('#door2').emit('move')", 1000);
                setTimeout("document.querySelector('#door1').emit('remove')", 4500);
                setTimeout("document.querySelector('#door2').emit('remove')", 4500);
                setTimeout("document.querySelector('#door1').emit('back')", 5500);
                setTimeout("document.querySelector('#door2').emit('back')", 5500);
            }

            el.setAttribute("scale", {x: 1, y: 0.35, z: 1});
            el.children[0].setAttribute("distance", 1);
            el.children[1].setAttribute("distance", 1);

            setTimeout(function () {
                el.setAttribute("scale", {x: 1, y: 0.4, z: 1});
            }, 200);

            setTimeout(function () {
                el.children[0].setAttribute("distance", 0.001);
                el.children[1].setAttribute("distance", 0.001);
            }, 4500);
        });
    }
});