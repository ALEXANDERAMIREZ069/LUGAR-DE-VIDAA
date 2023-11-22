let s = new Snap('#surface');
var letterSpeed = 10; //higher = faster
var colorSpeed = 2; //higher = faster
let colors = [
    '#e9edef', '#efad42', '#e9435a', '#4aadad', '#83cead'
];
let letters = s.selectAll('.letter');
let tl = new TimelineMax({
    repeat: -1,
    yoyo: true
});

for (var i = 0; i < letters.length; i += 1) {
    var letter = letters[i];

    tl.set(letter.node, {
        rotation: 180 - (Math.random() * 360),
        x: 20,
        y: -200
    }, 0);

    var tw = TweenMax.to(letter.node, 0.6, {
        rotation: 0,
        x: 0,
        y: 0,
        ease: Back.easeOut
    });

    tl.add(tw, 0.5 + (i / letterSpeed));

    var paths = letter.selectAll('*');
    for (var k = 0; k < paths.length; k += 1) {
        for (var j = 0; j < colors.length; j += 1) {

            var l = paths[k].clone();
            l.attr({
                stroke: colors[j]
            });

            var delay = (0.1 + (i / letterSpeed) + ((colors.length - (j / colorSpeed))) / 10);
            var tw = TweenMax.fromTo(l.node, 1, {
                drawSVG: '0%'
            }, {
                drawSVG: '100%',
                ease: Power2.easeInOut
            });
            tl.add(tw, delay);

        }

        //paths[k].remove();
        letter.prepend(paths[k]);
        TweenMax.set(paths[k].node, {
            x: -3,
            y: -3
        });
        var tw = TweenMax.fromTo(paths[k].node, 1, {
            drawSVG: '0%'
        }, {
            drawSVG: '100%',
            ease: Power2.easeInOut
        });
        tl.add(tw, delay);

    }

}