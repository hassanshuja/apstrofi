!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?e(require("jquery"),require("bootstrap")):"function"==typeof define&&define.amd?define(["jquery","bootstrap"],e):e(t.jQuery)}(this,function(t){"use strict";function e(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}function n(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function o(t){for(var e=1;e<arguments.length;e++){var o=null!=arguments[e]?arguments[e]:{},i=Object.keys(o);"function"==typeof Object.getOwnPropertySymbols&&(i=i.concat(Object.getOwnPropertySymbols(o).filter(function(t){return Object.getOwnPropertyDescriptor(o,t).enumerable}))),i.forEach(function(e){n(t,e,o[e])})}return t}if(void 0===(t=t&&t.hasOwnProperty("default")?t.default:t).fn.popover||"4"!==t.fn.popover.Constructor.VERSION.split(".").shift())throw new Error("Bootstrap Confirmation 4 requires Bootstrap Popover 4");var i,r=t.fn.popover.Constructor,s="confirmation",c="bs."+s,a="."+c,l=t.fn[s],f="btn btn-sm h-100 d-flex align-items-center",u=o({},r.DefaultType,{singleton:"boolean",popout:"boolean",copyAttributes:"(string|array)",onConfirm:"function",onCancel:"function",btnOkClass:"string",btnOkLabel:"string",btnOkIconClass:"string",btnOkIconContent:"string",btnCancelClass:"string",btnCancelLabel:"string",btnCancelIconClass:"string",btnCancelIconContent:"string",buttons:"array"}),p=o({},r.Default,{_attributes:{},_selector:null,placement:"top",title:"Are you sure?",trigger:"click",confirmationEvent:void 0,content:"",singleton:!1,popout:!1,copyAttributes:"href target",onConfirm:t.noop,onCancel:t.noop,btnOkClass:"btn-primary",btnOkLabel:"Yes",btnOkIconClass:"",btnOkIconContent:"",btnCancelClass:"btn-secondary",btnCancelLabel:"No",btnCancelIconClass:"",btnCancelIconContent:"",buttons:[],template:'\n<div class="popover confirmation">\n  <div class="arrow"></div>\n  <h3 class="popover-header"></h3>\n  <div class="popover-body">\n    <p class="confirmation-content"></p>\n    <div class="confirmation-buttons text-center">\n      <div class="btn-group">\n        <a href="#" class="'+f+'" data-apply="confirmation"></a>\n        <a href="#" class="'+f+'" data-dismiss="confirmation"></a>\n      </div>\n    </div>\n  </div>\n</div>'}),h="fade",g="show",d=".popover-header",C=".confirmation-content",b=".confirmation-buttons .btn-group",y="[data-apply=confirmation]",m="[data-dismiss=confirmation]",v={13:"Enter",27:"Escape",39:"ArrowRight",40:"ArrowDown"},E={HIDE:"hide"+a,HIDDEN:"hidden"+a,SHOW:"show"+a,SHOWN:"shown"+a,INSERTED:"inserted"+a,CLICK:"click"+a,FOCUSIN:"focusin"+a,FOCUSOUT:"focusout"+a,MOUSEENTER:"mouseenter"+a,MOUSELEAVE:"mouseleave"+a,CONFIRMED:"confirmed"+a,CANCELED:"canceled"+a,KEYUP:"keyup"+a},_=function(n){var o,r,l,_,O;function k(t,e){var o;if(((o=n.call(this,t,e)||this).config.popout||o.config.singleton)&&!o.config.rootSelector)throw new Error("The rootSelector option is required to use popout and singleton features since jQuery 3.");return o._isDelegate=!1,e.selector?(e._selector=e.rootSelector+" "+e.selector,o.config._selector=e._selector):e._selector?(o.config._selector=e._selector,o._isDelegate=!0):o.config._selector=e.rootSelector,void 0===o.config.confirmationEvent&&(o.config.confirmationEvent=o.config.trigger),o.config.selector||o._copyAttributes(),o._setConfirmationListeners(),o}r=n,(o=k).prototype=Object.create(r.prototype),o.prototype.constructor=o,o.__proto__=r,l=k,O=[{key:"VERSION",get:function(){return"4.0.2"}},{key:"Default",get:function(){return p}},{key:"NAME",get:function(){return s}},{key:"DATA_KEY",get:function(){return c}},{key:"Event",get:function(){return E}},{key:"EVENT_KEY",get:function(){return a}},{key:"DefaultType",get:function(){return u}}],(_=null)&&e(l.prototype,_),O&&e(l,O);var I=k.prototype;return I.isWithContent=function(){return!0},I.setContent=function(){var e=t(this.getTipElement()),n=this._getContent();"function"==typeof n&&(n=n.call(this.element)),this.setElementContent(e.find(d),this.getTitle()),e.find(C).toggle(!!n),n&&this.setElementContent(e.find(C),n),this.config.buttons.length>0?this._setCustomButtons(e):this._setStandardButtons(e),e.removeClass(h+" "+g),this._setupKeyupEvent()},I.dispose=function(){this._cleanKeyupEvent(),n.prototype.dispose.call(this)},I.hide=function(t){this._cleanKeyupEvent(),n.prototype.hide.call(this,t)},I._copyAttributes=function(){var e=this;this.config._attributes={},this.config.copyAttributes?"string"==typeof this.config.copyAttributes&&(this.config.copyAttributes=this.config.copyAttributes.split(" ")):this.config.copyAttributes=[],this.config.copyAttributes.forEach(function(n){e.config._attributes[n]=t(e.element).attr(n)})},I._setConfirmationListeners=function(){var e=this;this.config.selector?t(this.element).on(this.config.trigger,this.config.selector,function(t,e){e||(t.preventDefault(),t.stopPropagation(),t.stopImmediatePropagation())}):(t(this.element).on(this.config.trigger,function(t,e){e||(t.preventDefault(),t.stopPropagation(),t.stopImmediatePropagation())}),t(this.element).on(E.SHOWN,function(){e.config.singleton&&t(e.config._selector).not(t(this)).filter(function(){return void 0!==t(this).data(c)}).confirmation("hide")})),this._isDelegate||(this.eventBody=!1,this.uid=this.element.id||k.getUID(s+"_group"),t(this.element).on(E.SHOWN,function(){e.config.popout&&!e.eventBody&&(e.eventBody=t("body").on(E.CLICK+"."+e.uid,function(n){t(e.config._selector).is(n.target)||(t(e.config._selector).filter(function(){return void 0!==t(this).data(c)}).confirmation("hide"),t("body").off(E.CLICK+"."+e.uid),e.eventBody=!1)}))}))},I._setStandardButtons=function(e){var n=this,o=e.find(y).addClass(this.config.btnOkClass).html(this.config.btnOkLabel).attr(this.config._attributes);(this.config.btnOkIconClass||this.config.btnOkIconContent)&&o.prepend(t("<i></i>").addClass(this.config.btnOkIconClass||"").text(this.config.btnOkIconContent||"")),o.off("click").one("click",function(e){"#"===t(this).attr("href")&&e.preventDefault(),n.config.onConfirm.call(n.element),t(n.element).trigger(E.CONFIRMED),t(n.element).trigger(n.config.confirmationEvent,[!0]),n.hide()});var i=e.find(m).addClass(this.config.btnCancelClass).html(this.config.btnCancelLabel);(this.config.btnCancelIconClass||this.config.btnCancelIconContent)&&i.prepend(t("<i></i>").addClass(this.config.btnCancelIconClass||"").text(this.config.btnCancelIconContent||"")),i.off("click").one("click",function(e){e.preventDefault(),n.config.onCancel.call(n.element),t(n.element).trigger(E.CANCELED),n.hide()})},I._setCustomButtons=function(e){var n=this,o=e.find(b).empty();this.config.buttons.forEach(function(e){var i=t('<a href="#"></a>').addClass(f).addClass(e.class||"btn btn-secondary").html(e.label||"").attr(e.attr||{});(e.iconClass||e.iconContent)&&i.prepend(t("<i></i>").addClass(e.iconClass||"").text(e.iconContent||"")),i.one("click",function(o){"#"===t(this).attr("href")&&o.preventDefault(),e.onClick&&e.onClick.call(t(n.element)),e.cancel?(n.config.onCancel.call(n.element,e.value),t(n.element).trigger(E.CANCELED,[e.value])):(n.config.onConfirm.call(n.element,e.value),t(n.element).trigger(E.CONFIRMED,[e.value])),n.hide()}),o.append(i)})},I._setupKeyupEvent=function(){i=this,t(window).off(E.KEYUP).on(E.KEYUP,this._onKeyup.bind(this))},I._cleanKeyupEvent=function(){i===this&&(i=void 0,t(window).off(E.KEYUP))},I._onKeyup=function(e){if(this.tip){var n,o=t(this.getTipElement()),i=e.key||v[e.keyCode||e.which],r=o.find(b),s=r.find(".active");switch(i){case"Escape":this.hide();break;case"ArrowRight":n=s.length&&s.next().length?s.next():r.children().first(),s.removeClass("active"),n.addClass("active").focus();break;case"ArrowLeft":n=s.length&&s.prev().length?s.prev():r.children().last(),s.removeClass("active"),n.addClass("active").focus()}}else this._cleanKeyupEvent()},k.getUID=function(t){var e=t;do{e+=~~(1e6*Math.random())}while(document.getElementById(e));return e},k._jQueryInterface=function(e){return this.each(function(){var n=t(this).data(c),o="object"==typeof e?e:{};if(o.rootSelector=t(this).selector||o.rootSelector,(n||!/destroy|hide/.test(e))&&(n||(n=new k(this,o),t(this).data(c,n)),"string"==typeof e)){if(void 0===n[e])throw new TypeError('No method named "'+e+'"');n[e]()}})},k}(r);t.fn[s]=_._jQueryInterface,t.fn[s].Constructor=_,t.fn[s].noConflict=function(){return t.fn[s]=l,_._jQueryInterface}});