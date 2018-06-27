/*--------------------------------------------------------------------------*
 *
 *  SmoothScroll JavaScript Library V2
 *
 *  MIT-style license.
 *
 *  2007-2011 Kazuma Nishihata
 *  http://www.to-r.net
 *
 *--------------------------------------------------------------------------*/
new function(){function f(a){function d(a,c,b){setTimeout(function(){"up"==b&&a>=c?(a=a-(a-c)/20-1,window.scrollTo(0,a),d(a,c,b)):"down"==b&&a<=c?(a=a+(c-a)/20+1,window.scrollTo(0,a),d(a,c,b)):scrollTo(0,c)},10)}if(b.getElementById(a.href.replace(/.*\#/,""))){a=b.getElementById(a.href.replace(/.*\#/,"")).offsetTop;var c=b.documentElement.scrollHeight,e=window.innerHeight||b.documentElement.clientHeight;c-e<a&&(a=c-e);c=window.pageYOffset||b.documentElement.scrollTop||b.body.scrollTop||0;d(c,a,a<c?
"up":"down")}}var g=/noSmooth/,b=document;(function(a,d,c){try{a.addEventListener(d,c,!1)}catch(b){a.attachEvent("on"+d,function(){c.apply(a,arguments)})}})(window,"load",function(){for(var a=$("a").not(".noscrl"),b=0,c=a.length;b<c;b++)g.test(a[b].getAttribute("data-tor-smoothScroll"))||a[b].href.replace(/\#[a-zA-Z0-9_]+/,"")!=location.href.replace(/\#[a-zA-Z0-9_]+/,"")||(a[b].onclick=function(){f(this);return!1})})};
// noscrlというクラスを付けることでスムーススクロールの対象外にできます。（<a href="#header" class="noscrl">hoge</a>）
