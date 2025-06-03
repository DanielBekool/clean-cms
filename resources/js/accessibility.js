window.interdeal = {
    "sitekey": "c0c1365aba73619c10d93602d35453bf",
    "Position": "left",
    "domains": {
        "js": "https://cdn.equalweb.com/",
        "acc": "https://access.equalweb.com/"
    },
    "Menulang": "EN",
    "btnStyle": {
        "vPosition": [
            "102%",
            "20%"
        ],
        "scale": [
            "0.5",
            "0.5"
        ],
        "color": {
            "main": "#1c4bb6",
            "second": "#ffffff"
        },
        "icon": {
            "outline": false,
            "type": 1,
            "shape": "circle"
        }
    }
};
(function(doc, head, body){
    var coreCall             = doc.createElement('script');
    coreCall.src             = interdeal.domains.js + 'core/5.1.2/accessibility.js';
    coreCall.defer           = true;
    coreCall.integrity       = 'sha512-PUyQFF3HFjRiVfjOiFFu+RTc0nGmLV5FN3CVw8zWFK6pVbWPAEKy9X2bTUn10GNu1EbxN56MuWu0P8ZHC6xv3Q==';
    coreCall.crossOrigin     = 'anonymous';
    coreCall.setAttribute('data-cfasync', true );
    body? body.appendChild(coreCall) : head.appendChild(coreCall);
})(document, document.head, document.body);