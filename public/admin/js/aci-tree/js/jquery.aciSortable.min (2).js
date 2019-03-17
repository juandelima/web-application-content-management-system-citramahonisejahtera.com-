
/*
 * aciSortable jQuery Plugin v1.6.0
 * http://acoderinsights.ro
 *
 * Copyright (c) 2013 Dragos Ursu
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Require jQuery Library >= v1.7.1 http://jquery.com
 * + aciPlugin >= v1.4.0 https://github.com/dragosu/jquery-aciPlugin
 */

(function(d,c,e){var b={container:"ul",item:"li",distance:4,handle:"*",disable:"a,input,textarea,select,option,button",child:null,childHolder:'<ul class="aciSortableChild"></ul>',childHolderSelector:".aciSortableChild",exclude:null,vertical:true,placeholder:'<li class="aciSortablePlaceholder"><div></div></li>',placeholderSelector:".aciSortablePlaceholder",helper:'<div class="aciSortableHelper"></div>',helperSelector:".aciSortableHelper",relative:false,draggable:true,gluedPlaceholder:false,connectDrop:null,dropPosition:null,simpleDrop:null,scroll:80,scrollParent:"window",before:function(g){if(this._instance.options.exclude){var f=this.containerFrom(g);return !f.is(this._instance.options.exclude)&&!g.is(this._instance.options.exclude)}return true},start:function(g,h,f){var i=g.clone();i.children(this._instance.options.container).remove();f.html(i.text())},valid:function(j,h,k,g,l,i){if(this._instance.options.exclude){if(g){return !h.is(this._instance.options.exclude)}else{var f=this.containerFrom(h);return !f.is(this._instance.options.exclude)}}return true},drag:function(g,i,h,f){},create:function(g,f){f.append(this._instance.options.childHolder);return true},remove:function(g,f){f.children(this._instance.options.childHolderSelector).remove()},end:function(h,f,i,g){if(i.parent().length){i.after(h).detach()}g.detach()}};var a={__extend:function(){d.extend(this._instance,{sorting:false,item:null,hoverItem:null,isContainer:false,pointStart:null,pointNow:null,placeholder:null,helper:null,relative:null,children:null,scroll:false,lastCheck:{}})},init:function(){if(this.wasInit()){return}this._instance.jQuery.on("mousedown"+this._instance.nameSpace,this._instance.options.item,this.proxy(function(f){var g=d(f.target);if(!g.is(this._instance.options.handle)||g.is(this._instance.options.disable)){return}if(!g.is(this._instance.options.disable)){f.preventDefault()}if(g.is(this._instance.options.container)){d(c.document.body).css("cursor","no-drop")}else{this._delayStart(f)}})).on("mousemove"+this._instance.nameSpace,this._instance.options.item,this.proxy(function(h){if(this._instance.sorting){h.stopPropagation();this._instance.isContainer=false;var g=this.itemFrom(h.target);if(this._instance.item.has(g).length){this._instance.hoverItem=null}else{if(this._instance.options.dropPosition===null){this._instance.hoverItem=g}else{var f=this.containerFrom(h.target);this._dropPosition(f)}}}this._drag(h)})).on("mousemove"+this._instance.nameSpace,this._instance.options.container,this.proxy(function(g){if(this._instance.sorting){g.stopPropagation();var f=this.containerFrom(g.target);if(!this._instance.item.has(f).length){if(this.isEmpty(f)){this._instance.hoverItem=f;this._instance.isContainer=true}else{this._instance.isContainer=false;if(this._instance.options.dropPosition===null){this._instance.hoverItem=this._closestFrom(g)}else{this._dropPosition(f)}}}}this._drag(g)}));this._initConnect();this._initSimple();d(c.document).bind("mousemove"+this._instance.nameSpace+this._instance.index,this.proxy(function(f){if(this._instance.sorting){this._instance.hoverItem=null;this._drag(f)}})).on("mousemove"+this._instance.nameSpace+this._instance.index,this._instance.options.helperSelector,this.proxy(function(g){if(this._instance.sorting){var f=this._fromCursor(g);if(f){this._instance.jQuery.trigger(d.Event("mousemove",{target:f,pageX:g.pageX,pageY:g.pageY}));g.stopPropagation()}}})).bind("selectstart"+this._instance.nameSpace+this._instance.index,this.proxy(function(f){if(this._instance.sorting){f.preventDefault()}})).bind("mouseup"+this._instance.nameSpace+this._instance.index,this.proxy(function(){if(this._instance.sorting){this._end()}else{this._instance.item=null;d(c.document.body).css("cursor","default")}}));this._super()},_dropPosition:function(f){if(this._instance.options.dropPosition==-1){this._instance.hoverItem=this._firstItem(f)}else{this._instance.hoverItem=this._lastItem(f)}if(!this._instance.hoverItem.length){this._instance.hoverItem=f;this._instance.isContainer=true}},_firstItem:function(f){return f.children(this._instance.options.item).not(this._instance.options.placeholderSelector).first()},_lastItem:function(f){return f.children(this._instance.options.item).not(this._instance.options.placeholderSelector).last()},_closestFrom:function(j){var i=null;var h=d(j.target);if(this._instance.options.vertical){var f=d(c).scrollTop();var g=h.height();h.find(this._instance.options.item).not(this._instance.options.placeholderSelector).each(function(){var k=this.getBoundingClientRect();var l=c.Math.abs(f+k.top+(k.bottom-k.top)/2-j.pageY);if(l<g){g=l;i=d(this)}})}else{var f=d(c).scrollLeft();var g=h.width();h.find(this._instance.options.item).not(this._instance.options.placeholderSelector).each(function(){var k=this.getBoundingClientRect();var l=c.Math.abs(f+k.left+(k.right-k.left)/2-j.pageX);if(l<g){g=l;i=d(this)}})}return i},_fromCursor:function(g){if(this._instance.helper&&this._instance.helper.parent().length){if(d(g.target).closest(this._instance.options.helperSelector).length){this._instance.helper.hide();var f=c.document.elementFromPoint(g.clientX,g.clientY);this._instance.helper.show();if(f&&(f!=c.document.body)){return f}}}return null},_initConnect:function(){if(this._instance.options.connectDrop){d(c.document).on("mousemove"+this._instance.nameSpace+"connect"+this._instance.index,this._instance.options.connectDrop,this.proxy(function(g){var f=d(g.target);if(this._instance.sorting&&!this._instance.jQuery.has(f).length){if(!f.is(this._instance.options.connectDrop)){f=f.closest(this._instance.options.connectDrop)}this._connect(f)}}))}},_doneConnect:function(){d(c.document).off(this._instance.nameSpace+"connect"+this._instance.index)},_initSimple:function(){if(this._instance.options.simpleDrop){d(c.document).on("mousemove"+this._instance.nameSpace+"simple"+this._instance.index,this._instance.options.simpleDrop,this.proxy(function(g){var f=d(g.target);if(this._instance.sorting&&!this._instance.jQuery.has(f).length){g.stopPropagation();if(!f.is(this._instance.options.simpleDrop)){f=f.closest(this._instance.options.simpleDrop)}this._instance.hoverItem=f;this._instance.isContainer=false}this._drag(g)}))}},_doneSimple:function(){d(c.document).off(this._instance.nameSpace+"simple"+this._instance.index)},_trigger:function(f,h){var g=d.Event("acisortable");this._instance.jQuery.trigger(g,[this,f,h]);return !g.isDefaultPrevented()},_call:function(j,k){var h=[];for(var g in k){h.push(k[g])}var f=true;if(!this._trigger("before"+j,k)){return false}if(this._instance.options[j]){f=this._instance.options[j].apply(this,h)}if(!this._trigger(j,k)){f=false}return f},_connect:function(f){var h=f.aciSortable("api");if(h.wasInit()){h._instance.item=this._instance.item;h._instance.pointStart=this._instance.pointStart;h._instance.relative=this._instance.relative;h._instance.helper=this._instance.helper.clone();var g=d('<div style="display:none"></div>');d(c.document.body).append(g);this._instance.item=g;this._instance.placeholder.detach();this._instance.helper.detach();this._end();g.remove();h._start()}},hasItem:function(f){return this._instance.jQuery.has(f).length>0},sortableFrom:function(f){if(this._instance.jQuery.has(f).length){return this._instance.jQuery}if(this._instance.options.connectDrop){return d(f).closest(this._instance.options.connectDrop)}return d()},itemFrom:function(f){return d(f).closest(this._instance.options.item)},containerFrom:function(f){return d(f).closest(this._instance.options.container)},hasChildrens:function(f){return f.children(this._instance.options.container).children(this._instance.options.item).not(this._instance.options.placeholderSelector).length>0},hasContainer:function(f){return f.children(this._instance.options.container).length>0},isEmpty:function(f){return !f.children(this._instance.options.item).not(this._instance.options.placeholderSelector).length},_delayStart:function(h){var g=this.itemFrom(h.target);if(this._call("before",{item:g})){this._instance.item=g;this._instance.pointStart={x:h.pageX,y:h.pageY};if(this._instance.options.relative){var j=d(c).scrollTop();var i=d(c).scrollLeft();var f=this._instance.item.get(0).getBoundingClientRect();this._instance.relative={x:f.left+i-h.pageX,y:f.top+j-h.pageY}}else{this._instance.relative={x:0,y:0}}this._drag(h)}else{d(c.document.body).css("cursor","no-drop")}},_start:function(){this._instance.sorting=true;if(!this._instance.placeholder){this._instance.placeholder=d(this._instance.options.placeholder)}if(!this._instance.helper){this._instance.helper=d(this._instance.options.helper)}this._call("start",{item:this._instance.item,placeholder:this._instance.placeholder,helper:this._instance.helper});if(this._instance.options.gluedPlaceholder){this._instance.item.after(this._instance.placeholder)}d(c.document.body).append(this._instance.helper);d(c.document.body).css("cursor","move")},_minDistance:function(){return(c.Math.abs(this._instance.pointStart.x-this._instance.pointNow.x)>this._instance.options.distance)||(c.Math.abs(this._instance.pointStart.y-this._instance.pointNow.y)>this._instance.options.distance)},_drag:function(f){this._instance.pointNow={x:f.pageX,y:f.pageY};if(this._instance.sorting){this._helper();this._placeholder()}else{if(this._instance.item){if(this._minDistance()){this._start()}}}},_onDrag:function(f){this._call("drag",{item:this._instance.item,placeholder:this._instance.placeholder,isValid:f,helper:this._instance.helper})},_isValid:function(g,f){if(!this._instance.options.draggable&&this.hasItem(this._instance.item)&&(this._instance.isContainer||(this.containerFrom(this._instance.item).get(0)!=this.containerFrom(this._instance.hoverItem).get(0)))){return false}if(this._call("valid",{item:this._instance.item,hover:this._instance.hoverItem,before:f?null:((g===null)?false:g),isContainer:f?false:this._instance.isContainer,placeholder:this._instance.placeholder,helper:this._instance.helper})){d(c.document.body).css("cursor","move");return true}return false},_onCreate:function(){this._onRemove();if(this._instance.hoverItem.is(this._instance.options.exclude)){return false}if(this._isSimple()){return false}if(this._call("create",{item:this._instance.item,hover:this._instance.hoverItem})){this._instance.childItem=this._instance.hoverItem;this._instance.hoverItem=this._instance.hoverItem.children(this._instance.options.childHolderSelector);this._instance.isContainer=true;this._placeholder();return true}return false},_onRemove:function(f){if(this._instance.childItem&&(!f||(f.get(0)!=this._instance.childItem.get(0)))){if(this._instance.placeholder){this._instance.placeholder.detach()}if(!this.hasChildrens(this._instance.childItem)){this._call("remove",{item:this._instance.item,hover:this._instance.childItem})}this._instance.childItem=null}},_wasValid:function(j,h,g){if(this._instance.lastCheck){var i=g?this._instance.lastCheck.check:this._instance.lastCheck.normal;var f=i&&(i.hoverItem.get(0)==this._instance.hoverItem.get(0))&&(i.before===j)&&(i.create===h)&&(i.isContainer==this._instance.isContainer)}this._instance.lastCheck[g?"check":"normal"]={hoverItem:this._instance.hoverItem,before:j,create:h,isContainer:this._instance.isContainer};return f},_isSimple:function(){return this._instance.options.simpleDrop&&this._instance.hoverItem&&this._instance.hoverItem.is(this._instance.options.simpleDrop)},_placeholder:function(){this._instance.pointStart=this._instance.pointNow;if(this._instance.hoverItem){if(this._instance.hoverItem.is(this._instance.options.placeholderSelector)){return}if(this._instance.isContainer){if(this._wasValid(null,false)){return}if(this._isValid(null)){this._instance.hoverItem.append(this._instance.placeholder);this._onDrag(true);return}}else{if(this._instance.hoverItem.get(0)!=this._instance.item.get(0)){var m=false,j=false;var k=this._instance.hoverItem.get(0).getBoundingClientRect();var i=this._instance.hoverItem.children(this._instance.options.container);if(this._instance.options.vertical){var n=d(c).scrollTop();var g=k.bottom-((i.length&&i.is(":visible"))?i.outerHeight(true):0);if(this._instance.options.child&&(this._instance.options.draggable||!this.hasItem(this._instance.item))&&!this.hasChildrens(this._instance.hoverItem)){var h=(g-k.top)*(0.5-this._instance.options.child/200);if((this._instance.pointNow.y>n+k.top+h)&&(this._instance.pointNow.y<n+g-h)){j=i.length?null:true}}if(this._instance.pointNow.y<n+k.top+(g-k.top)/2){m=true}}else{var n=d(c).scrollLeft();var o=k.right-((i.length&&i.is(":visible"))?i.outerWidth(true):0);if(this._instance.options.child&&(this._instance.options.draggable||!this.hasItem(this._instance.item))&&!this.hasChildrens(this._instance.hoverItem)){var h=(o-k.left)*(0.5-this._instance.options.child/200);if((this._instance.pointNow.x>n+k.left+h)||(this._instance.pointNow.x<n+o-h)){j=i.length?null:true}}if(this._instance.pointNow.x<n+k.left+(o-k.left)/2){m=true}}if(this._instance.options.dropPosition==-1){m=true}else{if(this._instance.options.dropPosition==1){m=false}}if(j!==false){if(this._wasValid(m,j,true)){return}if(this._isValid(null,true)===false){j=false}}if(j===null){this._onRemove(this._instance.hoverItem);this._instance.childItem=this._instance.hoverItem;this._instance.hoverItem=this._instance.hoverItem.children(this._instance.options.childHolderSelector);this._instance.isContainer=true;if(this._wasValid(null,true)){return}if(this._isValid(null)){if(!this._isSimple()){this._instance.hoverItem.append(this._instance.placeholder)}this._onDrag(true);return}}else{if(m){if(this._wasValid(true,j)){return}if(this._isValid(true)){if(j&&this._onCreate()){return}var l=this._instance.hoverItem.prev(this._instance.options.item);if(this._instance.options.gluedPlaceholder||(l.get(0)!=this._instance.item.get(0))){if(!this._isSimple()){this._instance.hoverItem.before(this._instance.placeholder)}this._onDrag(true);return}}}else{if(this._wasValid(false,j)){return}if(this._isValid(false)){if(j&&this._onCreate()){return}var f=this._instance.hoverItem.next(this._instance.options.item);if(this._instance.options.gluedPlaceholder||(f.get(0)!=this._instance.item.get(0))){if(!this._isSimple()){this._instance.hoverItem.after(this._instance.placeholder)}this._onDrag(true);return}}}}}}}else{this._instance.lastCheck={}}if(!this._instance.options.gluedPlaceholder){this._instance.placeholder.detach()}d(c.document.body).css("cursor","no-drop");this._onDrag(false)},_scrollParent:function(f){if(f){f=f.parents(this._instance.options.scrollParent).first()}else{var f=this._instance.jQuery.parents(this._instance.options.scrollParent).first()}if(f.length){if(!this._scrollContainer(f)){return f}}else{if(this._instance.options.scrollParent.match(/^(.*,)?window(,.*)?$/)){this._scrollContainer(d(c),true)}}return null},_amount:function(f,g){return f/(1+c.Math.pow(1.04,-g+60))},_scrollContainer:function(g,j){var n=false;var p=d(c).scrollTop(),k=d(c).scrollLeft(),q=g.height(),i=g.width();var r=j?c.document.body.scrollHeight:g.get(0).scrollHeight;var l=c.Math.min(this._instance.options.scroll,q/3);var o=j?{left:0,top:0,right:i,bottom:q}:g.get(0).getBoundingClientRect();if((r>q)&&(this._instance.pointNow.x>k+o.left)&&(this._instance.pointNow.x<k+o.right)){var h=g.scrollTop();if(this._instance.pointNow.y<p+o.top+l){if(h>0){var f=p+o.top+l-this._instance.pointNow.y;g.scrollTop(c.Math.max(h-this._amount(l,f),0));n=true}}else{if(this._instance.pointNow.y>p+o.bottom-l){if(h+q<r){var f=this._instance.pointNow.y-(p+o.bottom-l);g.scrollTop(c.Math.min(h+this._amount(l,f),r-q));n=true}}}}var m=j?c.document.body.scrollWidth:g.get(0).scrollWidth;l=c.Math.min(this._instance.options.scroll,i/3);if((m>i)&&(this._instance.pointNow.y>p+o.top)&&(this._instance.pointNow.y<p+o.bottom)){var h=g.scrollLeft();if(this._instance.pointNow.x<k+o.left+l){if(h>0){var f=k+o.left+l-this._instance.pointNow.x;g.scrollLeft(c.Math.max(h-this._amount(l,f),0));n=true}}else{if(this._instance.pointNow.x>k+o.right-l){if(h+i<m){var f=this._instance.pointNow.x-(k+o.right-l);g.scrollLeft(c.Math.min(h+this._amount(l,f),m-i));n=true}}}}if(j&&n){this._instance.pointNow.x+=g.scrollLeft()-k;this._instance.pointNow.y+=g.scrollTop()-p}return n},_scroll:function(){if(this._instance.scroll){return}this._instance.scroll=true;if(!this._scrollContainer(this._instance.jQuery)&&this._instance.options.scrollParent){var f=null;while(true){f=this._scrollParent(f);if(f===null){break}}}if(this._instance.sorting){c.setTimeout(this.proxy(function(){this._instance.scroll=false;this._helper()}),50)}else{this._instance.scroll=false}},_helper:function(){if(this._instance.options.scroll){this._scroll()}this._instance.helper.css({left:(this._instance.pointNow.x+this._instance.relative.x)+"px",top:(this._instance.pointNow.y+this._instance.relative.y)+"px"})},_end:function(){if(this._instance.placeholder.parent().length){if((this._instance.placeholder.prev(this._instance.options.item).get(0)==this._instance.item.get(0))||(this._instance.placeholder.next(this._instance.options.item).get(0)==this._instance.item.get(0))){this._instance.placeholder.detach()}}var g=this.containerFrom(this._instance.item);this._call("end",{item:this._instance.item,hover:this._instance.hoverItem,placeholder:this._instance.placeholder,helper:this._instance.helper});this._onRemove();var f=this.itemFrom(g);if(f.length&&!this.hasChildrens(f)){this._instance.childItem=f;this._onRemove()}this._instance.sorting=false;this._instance.item=null;this._instance.hoverItem=null;this._instance.lastCheck={};d(c.document.body).css("cursor","default")},option:function(f,g){if(this.wasInit()){switch(f){case"connectDrop":if(g!=this._instance.options.connectDrop){this._doneConnect();this._instance.options.connectDrop=g;this._initConnect()}break;case"simpleDrop":if(g!=this._instance.options.simpleDrop){this._doneSimple();this._instance.options.simpleDrop=g;this._initSimple()}break}}this._super(f,g)},destroy:function(){if(!this.wasInit()){return}this._instance.jQuery.off(this._instance.nameSpace);this._doneConnect();d(c.document).unbind(this._instance.nameSpace+this._instance.index).off(this._instance.nameSpace+this._instance.index);if(this._instance.placeholder){this._instance.placeholder.detach()}if(this._instance.helper){this._instance.helper.detach()}this._super()}};aciPluginClass.plugins.aciSortable=aciPluginClass.aciPluginUi.extend(a,"aciSortable");aciPluginClass.publish("aciSortable",b)})(jQuery,this);