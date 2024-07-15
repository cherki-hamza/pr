// Define the mime type lookup
var mimeTypes = {
    aif  : "audio/x-aiff",
    aiff : "audio/x-aiff",
    wav  : "audio/x-wav",
    mp3  : 'audio/mpeg',
    m3u  : "audio/x-mpegurl",
    mid  : "audio/midi",
    midi : "audio/midi",
    m4a  : 'audio/m4a',
    ogg  : 'audio/ogg'
};

function mimeOf(url) {
    return mimeTypes[url.split('.').pop()];
}

// Define the render function
function render() {
    var audioHtml = '<audio preload="auto"></audio>';
    var div = document.createElement('div');
    div.innerHTML = audioHtml;
    return div.firstChild;
}

// Define the player creation function
window.play = function(urls, dom) {
    var el = render(),
        dom = dom || document.documentElement;

    dom.appendChild(el);

    var chain = {
        autoplay: function(value) { el.autoplay = !!value; return chain; },
        controls: function(value) { el.controls = !!value; return chain; },
        load: function() { el.load(); return chain; },
        loop: function(value) { el.loop = !!value; return chain; },
        muted: function(value) { el.muted = !!value; return chain; },
        play: function() { el.play(); return chain; },
        pause: function() { el.pause(); return chain; },
        preload: function(value) { el.preload = !!value; return chain; },
        currentTime: function(value) {
            if (arguments.length) { el.currentTime = value; return chain; }
            return el.currentTime;
        },
        volume: function(value) {
            if (arguments.length) { el.volume = value; return chain; }
            return el.volume;
        },
        src: function(value) {
            if (arguments.length) {
                el.src = mimeOf(value) ? value : undefined;
                return chain;
            }
            return el.src;
        },
        remove: function() { el.parentNode.removeChild(el); return chain; },
        element: function() { return el; }
    };

    if (urls) chain.src(urls);
    return chain;
};
