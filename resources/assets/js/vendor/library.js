/**
 * librairies.js
 *
 * JavaScript's library
 **/

export let getLocation = {
  anchor: function() {
    return window.location.hash;
  },
  pathname: function() {
    return window.location.pathname;
  },
  search: function() {
    let parameters = {};
    if (window.location.search.length > 1) {
      for (let aItKey, nKeyId = 0, aCouples = window.location.search.substr(1).split("&"); nKeyId < aCouples.length; nKeyId++) {
        aItKey = aCouples[nKeyId].split("=");
        parameters[unescape(aItKey[0])] = aItKey.length > 1 ? unescape(aItKey[1]) : "";
      }
    }
    return parameters;
  }
};

export let isMobile = {
  Android: function() {
    return navigator.userAgent.match(/Android/i);
  },
  BlackBerry: function() {
    return navigator.userAgent.match(/BlackBerry/i);
  },
  iOS: function() {
    return navigator.platform.match(/iPhone|iPad|iPod/i);
  },
  iPhone: function() {
    return navigator.platform.match(/iPhone/i);
  },
  Opera: function() {
    return navigator.userAgent.match(/Opera Mini/i);
  },
  Windows: function() {
    return navigator.userAgent.match(/IEMobile/i);
  },
  any: function() {
    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
  }
};

export let debugTools = {
  consoleLog: function (message) {
    if (console && console.log) {
      console.log(message);
    }
  },
  objToString: function (obj, showAllProperties = false, indent = 0) {
    let out = 'Object {\n';
    for (let prop in obj) {
      if (showAllProperties || obj.hasOwnProperty(prop)) {
        for (let i = 0; i < indent; i++) {
          out += ' ';
        }
        out += "  - " + prop + " = ";
        if (obj[prop] !== null && typeof obj[prop] === 'object') {
          out += this.objToString(obj[prop], showAllProperties, indent + 2);
        } else {
          out += obj[prop] + "\n";
        }
      }
    }
    for (let i = 0; i < indent; i++) {
      out += ' ';
    }
    out += '}';
    if (indent > 0) {
      out += '\n';
    }
    return out;
  },
};

export let utils = {
  sayHello: function () {
    window.addEventListener('load', () => {
      console.log('Oh hey, hello there!');
    });
  },
  getRandomNb: function (min, max) {
    return Math.random() * (max - min) + min;
  },
  getRandomInt: function (min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  },
  getRandomBool: function () {
    return Math.random() >= 0.5;
  },
  getRandomSign: function () {
    return Math.round(Math.random()) * 2 - 1;
  },
  sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  },
};

/** utils.sleep demo usage
async function demo() {
  console.log('Taking a break...');
  await sleep(2000);
  console.log('Two second later');
}
**/
