
/*
 * aciFragment jQuery Plugin v1.1.0
 * http://acoderinsights.ro
 *
 * Copyright (c) 2013 Dragos Ursu
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Require jQuery Library >= v1.7.1 http://jquery.com
 * + aciPlugin >= v1.1.1 https://github.com/dragosu/jquery-aciPlugin
 *
 * Date: Apr Fri 26 18:00 2013 +0200
 */

(function(e,t,n){var r={anchor:"anchor",poolDelay:250,scroll:{duration:"medium",easing:"linear"}};var i={__extend:function(){e.extend(this._instance,{lastHash:null,lastParsed:null,parsed:{},anchor:true,timeOut:null,"native":"onhashchange"in t&&(t.document.documentMode===n||t.document.documentMode>7)})},init:function(){var n=this;if(this.wasInit()){return}if(this._instance.native){e(t).bind("hashchange"+this._instance.nameSpace,function(){n._trigger()})}else{this._change()}this._instance.anchor=true;this._trigger();this._super()},_trigger:function(){this._instance.jQuery.trigger("acifragment",[this,this._instance.anchor]);this._instance.anchor=false},_change:function(){var e=this;var n=t.location.hash;if(n!=this._instance.lastHash){this._trigger();this._instance.lastHash=n}this._instance.timeOut=t.setTimeout(function(){e._change()},this._instance.options.poolDelay)},scroll:function(){var n=this.get(this._instance.options.anchor);if(n&&n.length){var r=e("#"+n+":first");if(!r.length){r=e('[name="'+n+'"]:first')}if(r.length){var i=r.get(0).getBoundingClientRect();var s=e(t).scrollLeft()+i.left,o=e(t).scrollTop()+i.top;if(this._instance.options.scroll){e("html,body").stop(true).animate({scrollLeft:s,scrollTop:o},this._instance.options.scroll)}else{t.scrollTo(s,o)}}}},click:function(e,t){var n=e.attr("href");if(n){var r=this.parse(n);this.update(r);if(t&&this.hasAnchor(r)){this.scroll()}}},parse:function(e){var n=e.indexOf("#"),r={};if(n!=-1){e=e.substr(n+1);var i=e.split("&"),s;for(var o in i){s=i[o].split("=");if(s.length>1){r[t.decodeURIComponent(s[0])]=t.decodeURIComponent(s[1])}else{r[this._instance.options.anchor]=t.decodeURIComponent(s[0])}}}return r},hasAnchor:function(e){return e[this._instance.options.anchor]&&e[this._instance.options.anchor].length>0},setAnchor:function(e){this.set(this._instance.options.anchor,e)},getAnchor:function(e){return this.get(this._instance.options.anchor,e)},parseHash:function(){var e=t.location.hash;if(e==this._instance.lastParsed){return this._instance.parsed}var n=this.parse(e);this._instance.parsed=n;this._instance.lastParsed=e;return n},get:function(e,r){var i=this.parseHash();if(i[e]!==null&&i[e]!==n&&t.String(i[e]).length){return i[e]}else{return r}},replace:function(e,r){var i=[];for(var s in e){if(e[s]!==null&&e[s]!==n&&t.String(e[s]).length){i[i.length]=t.encodeURIComponent(s)+"="+t.encodeURIComponent(e[s])}}if(!r&&this.hasAnchor(e)){this._instance.anchor=true}var o=t.location.hash;if(i.length){t.location.hash="#"+i.join("&")}else if(t.history&&t.history.pushState){t.history.pushState("",t.document.title,t.location.pathname+t.location.search)}else{t.location.hash=""}if(t.location.hash==o){this._trigger()}},update:function(e){var t=this.parseHash();for(var n in e){t[n]=e[n]}if(this.hasAnchor(e)){this._instance.anchor=true}this.replace(t,true)},set:function(e,t){var n=this.parseHash();n[e]=t;if(e==this._instance.options.anchor){this._instance.anchor=true}this.replace(n,true)},destroy:function(){if(!this.wasInit()){return}if(this._instance.native){e(t).unbind(this._instance.nameSpace)}t.clearTimeout(this._instance.timeOut);this._super()}};aciPluginClass.plugins.aciFragment=aciPluginClass.aciPluginUi.extend(i,"aciFragment");aciPluginClass.publish("aciFragment",r)})(jQuery,this);