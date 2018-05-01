(function(){var t,e,n,r,o,s,i,a,u,c,l,h,p,f,d,g,m,y,v,w,b,k,S,x,q,j,L,T,P,R,E,M,O,C,N,A,_,F,U,W,Q,H,X,D,I,z,G,B,J,K=[].slice,V={}.hasOwnProperty,Y=function(t,e){function n(){this.constructor=t}for(var r in e)V.call(e,r)&&(t[r]=e[r]);return n.prototype=e.prototype,t.prototype=new n,t.__super__=e.prototype,t},$=[].indexOf||function(t){for(var e=0,n=this.length;n>e;e++)if(e in this&&this[e]===t)return e;return-1};for(b={catchupTime:100,initialRate:.03,minTime:250,ghostTime:100,maxProgressPerFrame:20,easeFactor:1.25,startOnPageLoad:!0,restartOnPushState:!0,restartOnRequestAfter:500,target:"body",elements:{checkInterval:100,selectors:["body"]},eventLag:{minSamples:10,sampleCount:3,lagThreshold:3},ajax:{trackMethods:["GET"],trackWebSockets:!0,ignoreURLs:[]}},P=function(){var t;return null!=(t="undefined"!=typeof performance&&null!==performance&&"function"==typeof performance.now?performance.now():void 0)?t:+new Date},E=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame,w=window.cancelAnimationFrame||window.mozCancelAnimationFrame,null==E&&(E=function(t){return setTimeout(t,50)},w=function(t){return clearTimeout(t)}),O=function(t){var e,n;return e=P(),(n=function(){var r;return r=P()-e,r>=33?(e=P(),t(r,function(){return E(n)})):setTimeout(n,33-r)})()},M=function(){var t,e,n;return n=arguments[0],e=arguments[1],t=3<=arguments.length?K.call(arguments,2):[],"function"==typeof n[e]?n[e].apply(n,t):n[e]},k=function(){var t,e,n,r,o,s,i;for(e=arguments[0],r=2<=arguments.length?K.call(arguments,1):[],s=0,i=r.length;i>s;s++)if(n=r[s])for(t in n)V.call(n,t)&&(o=n[t],null!=e[t]&&"object"==typeof e[t]&&null!=o&&"object"==typeof o?k(e[t],o):e[t]=o);return e},m=function(t){var e,n,r,o,s;for(n=e=0,o=0,s=t.length;s>o;o++)r=t[o],n+=Math.abs(r),e++;return n/e},x=function(t,e){var n,r,o;if(null==t&&(t="options"),null==e&&(e=!0),o=document.querySelector("[data-pace-"+t+"]")){if(n=o.getAttribute("data-pace-"+t),!e)return n;try{return JSON.parse(n)}catch(t){return r=t,"undefined"!=typeof console&&null!==console?console.error("Error parsing inline pace options",r):void 0}}},i=function(){function t(){}return t.prototype.on=function(t,e,n,r){var o;return null==r&&(r=!1),null==this.bindings&&(this.bindings={}),null==(o=this.bindings)[t]&&(o[t]=[]),this.bindings[t].push({handler:e,ctx:n,once:r})},t.prototype.once=function(t,e,n){return this.on(t,e,n,!0)},t.prototype.off=function(t,e){var n,r,o;if(null!=(null!=(r=this.bindings)?r[t]:void 0)){if(null==e)return delete this.bindings[t];for(n=0,o=[];n<this.bindings[t].length;)o.push(this.bindings[t][n].handler===e?this.bindings[t].splice(n,1):n++);return o}},t.prototype.trigger=function(){var t,e,n,r,o,s,i,a,u;if(n=arguments[0],t=2<=arguments.length?K.call(arguments,1):[],null!=(i=this.bindings)?i[n]:void 0){for(o=0,u=[];o<this.bindings[n].length;)a=this.bindings[n][o],r=a.handler,e=a.ctx,s=a.once,r.apply(null!=e?e:this,t),u.push(s?this.bindings[n].splice(o,1):o++);return u}},t}(),c=window.Pace||{},window.Pace=c,k(c,i.prototype),R=c.options=k({},b,window.paceOptions,x()),G=["ajax","document","eventLag","elements"],X=0,I=G.length;I>X;X++)_=G[X],!0===R[_]&&(R[_]=b[_]);u=function(t){function e(){return B=e.__super__.constructor.apply(this,arguments)}return Y(e,t),e}(Error),e=function(){function t(){this.progress=0}return t.prototype.getElement=function(){var t;if(null==this.el){if(!(t=document.querySelector(R.target)))throw new u;this.el=document.createElement("div"),this.el.className="pace pace-active",document.body.className=document.body.className.replace(/pace-done/g,""),document.body.className+=" pace-running",this.el.innerHTML='<div class="pace-progress">\n  <div class="pace-progress-inner"></div>\n</div>\n<div class="pace-activity"></div>',null!=t.firstChild?t.insertBefore(this.el,t.firstChild):t.appendChild(this.el)}return this.el},t.prototype.finish=function(){var t;return t=this.getElement(),t.className=t.className.replace("pace-active",""),t.className+=" pace-inactive",document.body.className=document.body.className.replace("pace-running",""),document.body.className+=" pace-done"},t.prototype.update=function(t){return this.progress=t,this.render()},t.prototype.destroy=function(){try{this.getElement().parentNode.removeChild(this.getElement())}catch(t){u=t}return this.el=void 0},t.prototype.render=function(){var t,e,n,r,o,s,i;if(null==document.querySelector(R.target))return!1;for(t=this.getElement(),r="translate3d("+this.progress+"%, 0, 0)",i=["webkitTransform","msTransform","transform"],o=0,s=i.length;s>o;o++)e=i[o],t.children[0].style[e]=r;return(!this.lastRenderedProgress||this.lastRenderedProgress|0!==this.progress|0)&&(t.children[0].setAttribute("data-progress-text",(0|this.progress)+"%"),this.progress>=100?n="99":(n=this.progress<10?"0":"",n+=0|this.progress),t.children[0].setAttribute("data-progress",""+n)),this.lastRenderedProgress=this.progress},t.prototype.done=function(){return this.progress>=100},t}(),a=function(){function t(){this.bindings={}}return t.prototype.trigger=function(t,e){var n,r,o,s,i;if(null!=this.bindings[t]){for(s=this.bindings[t],i=[],r=0,o=s.length;o>r;r++)n=s[r],i.push(n.call(this,e));return i}},t.prototype.on=function(t,e){var n;return null==(n=this.bindings)[t]&&(n[t]=[]),this.bindings[t].push(e)},t}(),H=window.XMLHttpRequest,Q=window.XDomainRequest,W=window.WebSocket,S=function(t,e){var n,r,o;o=[];for(r in e.prototype)try{o.push(null==t[r]&&"function"!=typeof e[r]?"function"==typeof Object.defineProperty?Object.defineProperty(t,r,{get:function(){return e.prototype[r]},configurable:!0,enumerable:!0}):t[r]=e.prototype[r]:void 0)}catch(t){n=t}return o},L=[],c.ignore=function(){var t,e,n;return e=arguments[0],t=2<=arguments.length?K.call(arguments,1):[],L.unshift("ignore"),n=e.apply(null,t),L.shift(),n},c.track=function(){var t,e,n;return e=arguments[0],t=2<=arguments.length?K.call(arguments,1):[],L.unshift("track"),n=e.apply(null,t),L.shift(),n},A=function(t){var e;if(null==t&&(t="GET"),"track"===L[0])return"force";if(!L.length&&R.ajax){if("socket"===t&&R.ajax.trackWebSockets)return!0;if(e=t.toUpperCase(),$.call(R.ajax.trackMethods,e)>=0)return!0}return!1},l=function(t){function e(){var t,n=this;e.__super__.constructor.apply(this,arguments),t=function(t){var e;return e=t.open,t.open=function(r,o){return A(r)&&n.trigger("request",{type:r,url:o,request:t}),e.apply(t,arguments)}},window.XMLHttpRequest=function(e){var n;return n=new H(e),t(n),n};try{S(window.XMLHttpRequest,H)}catch(t){}if(null!=Q){window.XDomainRequest=function(){var e;return e=new Q,t(e),e};try{S(window.XDomainRequest,Q)}catch(t){}}if(null!=W&&R.ajax.trackWebSockets){window.WebSocket=function(t,e){var r;return r=null!=e?new W(t,e):new W(t),A("socket")&&n.trigger("request",{type:"socket",url:t,protocols:e,request:r}),r};try{S(window.WebSocket,W)}catch(t){}}}return Y(e,t),e}(a),D=null,q=function(){return null==D&&(D=new l),D},N=function(t){var e,n,r,o;for(o=R.ajax.ignoreURLs,n=0,r=o.length;r>n;n++)if("string"==typeof(e=o[n])){if(-1!==t.indexOf(e))return!0}else if(e.test(t))return!0;return!1},q().on("request",function(e){var n,r,o,s,i;return s=e.type,o=e.request,i=e.url,N(i)?void 0:c.running||!1===R.restartOnRequestAfter&&"force"!==A(s)?void 0:(r=arguments,n=R.restartOnRequestAfter||0,"boolean"==typeof n&&(n=0),setTimeout(function(){var e,n,i,a,u,l;if(e="socket"===s?o.readyState<2:0<(a=o.readyState)&&4>a){for(c.restart(),u=c.sources,l=[],n=0,i=u.length;i>n;n++){if((_=u[n])instanceof t){_.watch.apply(_,r);break}l.push(void 0)}return l}},n))}),t=function(){function t(){var t=this;this.elements=[],q().on("request",function(){return t.watch.apply(t,arguments)})}return t.prototype.watch=function(t){var e,n,r,o;return r=t.type,e=t.request,o=t.url,N(o)?void 0:(n="socket"===r?new f(e):new d(e),this.elements.push(n))},t}(),d=function(){function t(t){var e,n,r,o,s,i,a=this;if(this.progress=0,null!=window.ProgressEvent)for(n=null,t.addEventListener("progress",function(t){return a.progress=t.lengthComputable?100*t.loaded/t.total:a.progress+(100-a.progress)/2},!1),i=["load","abort","timeout","error"],r=0,o=i.length;o>r;r++)e=i[r],t.addEventListener(e,function(){return a.progress=100},!1);else s=t.onreadystatechange,t.onreadystatechange=function(){var e;return 0===(e=t.readyState)||4===e?a.progress=100:3===t.readyState&&(a.progress=50),"function"==typeof s?s.apply(null,arguments):void 0}}return t}(),f=function(){function t(t){var e,n,r,o,s=this;for(this.progress=0,o=["error","open"],n=0,r=o.length;r>n;n++)e=o[n],t.addEventListener(e,function(){return s.progress=100},!1)}return t}(),r=function(){function t(t){var e,n,r,s;for(null==t&&(t={}),this.elements=[],null==t.selectors&&(t.selectors=[]),s=t.selectors,n=0,r=s.length;r>n;n++)e=s[n],this.elements.push(new o(e))}return t}(),o=function(){function t(t){this.selector=t,this.progress=0,this.check()}return t.prototype.check=function(){var t=this;return document.querySelector(this.selector)?this.done():setTimeout(function(){return t.check()},R.elements.checkInterval)},t.prototype.done=function(){return this.progress=100},t}(),n=function(){function t(){var t,e,n=this;this.progress=null!=(e=this.states[document.readyState])?e:100,t=document.onreadystatechange,document.onreadystatechange=function(){return null!=n.states[document.readyState]&&(n.progress=n.states[document.readyState]),"function"==typeof t?t.apply(null,arguments):void 0}}return t.prototype.states={loading:0,interactive:50,complete:100},t}(),s=function(){function t(){var t,e,n,r,o,s=this;this.progress=0,t=0,o=[],r=0,n=P(),e=setInterval(function(){var i;return i=P()-n-50,n=P(),o.push(i),o.length>R.eventLag.sampleCount&&o.shift(),t=m(o),++r>=R.eventLag.minSamples&&t<R.eventLag.lagThreshold?(s.progress=100,clearInterval(e)):s.progress=3/(t+3)*100},50)}return t}(),p=function(){function t(t){this.source=t,this.last=this.sinceLastUpdate=0,this.rate=R.initialRate,this.catchup=0,this.progress=this.lastProgress=0,null!=this.source&&(this.progress=M(this.source,"progress"))}return t.prototype.tick=function(t,e){var n;return null==e&&(e=M(this.source,"progress")),e>=100&&(this.done=!0),e===this.last?this.sinceLastUpdate+=t:(this.sinceLastUpdate&&(this.rate=(e-this.last)/this.sinceLastUpdate),this.catchup=(e-this.progress)/R.catchupTime,this.sinceLastUpdate=0,this.last=e),e>this.progress&&(this.progress+=this.catchup*t),n=1-Math.pow(this.progress/100,R.easeFactor),this.progress+=n*this.rate*t,this.progress=Math.min(this.lastProgress+R.maxProgressPerFrame,this.progress),this.progress=Math.max(0,this.progress),this.progress=Math.min(100,this.progress),this.lastProgress=this.progress,this.progress},t}(),F=null,C=null,y=null,U=null,g=null,v=null,c.running=!1,j=function(){return R.restartOnPushState?c.restart():void 0},null!=window.history.pushState&&(z=window.history.pushState,window.history.pushState=function(){return j(),z.apply(window.history,arguments)}),null!=window.history.replaceState&&(J=window.history.replaceState,window.history.replaceState=function(){return j(),J.apply(window.history,arguments)}),h={ajax:t,elements:r,document:n,eventLag:s},(T=function(){var t,n,r,o,s,i,a,u;for(c.sources=F=[],i=["ajax","elements","document","eventLag"],n=0,o=i.length;o>n;n++)t=i[n],!1!==R[t]&&F.push(new h[t](R[t]));for(u=null!=(a=R.extraSources)?a:[],r=0,s=u.length;s>r;r++)_=u[r],F.push(new _(R));return c.bar=y=new e,C=[],U=new p})(),c.stop=function(){return c.trigger("stop"),c.running=!1,y.destroy(),v=!0,null!=g&&("function"==typeof w&&w(g),g=null),T()},c.restart=function(){return c.trigger("restart"),c.stop(),c.start()},c.go=function(){var t;return c.running=!0,y.render(),t=P(),v=!1,g=O(function(e,n){var r,o,s,i,a,u,l,h,f,d,g,m,w,b,k,S;for(h=100-y.progress,o=g=0,s=!0,u=m=0,b=F.length;b>m;u=++m)for(_=F[u],d=null!=C[u]?C[u]:C[u]=[],a=null!=(S=_.elements)?S:[_],l=w=0,k=a.length;k>w;l=++w)i=a[l],f=null!=d[l]?d[l]:d[l]=new p(i),s&=f.done,f.done||(o++,g+=f.tick(e));return r=g/o,y.update(U.tick(e,r)),y.done()||s||v?(y.update(100),c.trigger("done"),setTimeout(function(){return y.finish(),c.running=!1,c.trigger("hide")},Math.max(R.ghostTime,Math.max(R.minTime-(P()-t),0)))):n()})},c.start=function(t){k(R,t),c.running=!0;try{y.render()}catch(t){u=t}return document.querySelector(".pace")?(c.trigger("start"),c.go()):setTimeout(c.start,50)},"function"==typeof define&&define.amd?define(["pace"],function(){return c}):"object"==typeof exports?module.exports=c:R.startOnPageLoad&&c.start()}).call(this),function($){$(".parallax-window").parallax({naturalWidth:1920,naturalHeight:1080}),$(".mejs-overlay-loading").closest(".mejs-overlay").addClass("load");var t=$("div.video video"),e=t.attr("width"),n=t.attr("height");$(window).resize(function(){if($(window).width()>550){var t=$(this).width();$("#banner, .video, .video .mejs-container").css("height",Math.ceil(n*(t/e)-50))}})}(jQuery),function($){$(".hamburger").on("click",function(t){t.preventDefault(),$(this).toggleClass("is-active")}),$(".menu-toggle").click(function(){$(this).text(function(t,e){return"MENU"===e?"CLOSE":"MENU"})})}(jQuery),function($){$('img[src$=".svg"]').each(function(){var t=jQuery(this),e=t.attr("src"),n=t.prop("attributes");$.get(e,function(e){var r=jQuery(e).find("svg");r=r.removeAttr("xmlns:a"),$.each(n,function(){r.attr(this.name,this.value)}),t.replaceWith(r)},"xml")})}(jQuery),function($){$(".testimonials").slick({autoplay:!1,infinite:!0,dots:!0,slidesToShow:1,adaptiveHeight:!0,arrows:!1,vertical:!0})}(jQuery),function($){var t=$(document),e=$("#masthead"),n=$("#masthead");t.scroll(function(){e.toggleClass("hidden",t.scrollTop()>=99)}),t.scroll(function(){e.toggleClass("fixed",t.scrollTop()>=400)})}(jQuery);