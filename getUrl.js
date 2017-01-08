function getUrl() {
    var a = Math.floor(Math.random() * urls.length),
        b = urls[a];
    return urls.splice(a, 1), b
}

function doPopAds() {
    setTimeout(function() {
        function a(b) {
            b.isTrigger || ($("html").unbind("click", a), doSecondPop())
        }
        window._pop = [], window._pop.push(["siteId", 1076675]), window._pop.push(["minBid", 0]), window._pop.push(["popundersPerIP", 0]), window._pop.push(["delayBetween", 0]), window._pop.push(["default", "http://prestoris.com/afu.php?zoneid=478410"]), window._pop.push(["defaultPerDay", 0]), window._pop.push(["topmostLayer", !1]),
            function() {
                var a = document.createElement("script");
                a.type = "text/javascript", a.async = !0;
                var b = document.getElementsByTagName("script")[0];
                a.src = "//c1.popads.net/pop.js", a.onerror = function() {
                    var a = document.createElement("script");
                    a.type = "text/javascript", a.async = !0, a.src = "//c2.popads.net/pop.js", b.parentNode.insertBefore(a, b)
                }, b.parentNode.insertBefore(a, b)
            }(), $("html").bind("click", a)
    }, 45e3)
}

function doSecondPop() {
    if (3 != openedSecondPop) {
        openedSecondPop += 1;
        var a = getUrl();
        if ("popads" == a) return void doPopAds();
        try {
            var b = document.createElement("link");
            b.rel = "dns-prefetch", b.href = a, document.head.appendChild(b);
            var b = document.createElement("link");
            b.rel = "preconnect", b.href = a, document.head.appendChild(b)
        } catch (a) {}! function() {
            var b = !1,
                c = {
                    under: !noPopunder,
                    newTab: !1,
                    forceUnder: !0,
                    shouldFire: function() {
                        return !b
                    },
                    cookieExpires: -1,
                    forceUnder: !0,
                    popFallbackOptions: {
                        under: !1,
                        newTab: !1
                    },
                    afterOpen: function(url) {
                        b = !0, $.post("https://t2.openload.co/log", {
                            "popurl": url,
                            "poppool": "second",
                            "position": openedSecondPop + 1
                        }), doSecondPop()
                    }
                };
            if (!noPopunder) {
                var d = Math.floor(3 * Math.random());
                1 == d && (c.under = !1, c.newTab = !0), 2 == d && (c.under = !1, c.newTab = !1)
            }
            setTimeout(function() {
                BetterJsPop.add(a, c)
            }, 1 == openedSecondPop ? 250 : 45e3)
        }()
    }
}
if (!window.turnoff) var openedSecondPop = 0,
    urls = ["http://prestoris.com/afu.php?zoneid=478410", "http://syndication.exdynsrv.com/splash-zones-split.php?type=8&main_zone=2316865&fallback_zone=2316863&ref=" + encodeURIComponent(document.referrer), "http://adrunnr.com/?placement=402422&redirect", "http://www.onclickpredictiv.com/a/display.php?r=1337521", "http://prestoris.com/afu.php?zoneid=478410", "http://prestoris.com/afu.php?zoneid=478410", "http://www.onclickpredictiv.com/a/display.php?r=1379443", "http://engine.spotscenered.info/link.engine?guid=e84dbe42-32fe-4143-9994-f0f18c8bdd07&Hardlink=true&time=0&CurrentUrl=" + encodeURIComponent(document.referrer), "http://engine.spotscenered.info/link.engine?guid=e84dbe42-32fe-4143-9994-f0f18c8bdd07&Hardlink=true&time=0&CurrentUrl=" + encodeURIComponent(document.referrer)];