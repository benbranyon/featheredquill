
(function(e,c,a,g){var d="slimmenu",f={resizeWidth:"768",collapserTitle:"Main Menu",animSpeed:"medium",easingEffect:null,indentChildren:false,childrenIndenter:"&nbsp;&nbsp;"};function b(i,h){this.element=i;this.$elem=e(this.element);this.options=e.extend({},f,h);this.init()}b.prototype={init:function(){var h=this.options,j=this.$elem,i='<div class="menu-collapser">'+h.collapserTitle+'<div class="collapse-button"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></div></div>',k;j.before(i);k=j.prev(".menu-collapser");j.on("click",".sub-collapser",function(m){m.preventDefault();m.stopPropagation();var l=e(this).closest("li");if(e(this).hasClass("expanded")){e(this).removeClass("expanded");e(this).find("i").html("&#9660;");l.find(">ul").slideUp(h.animSpeed,h.easingEffect)}else{e(this).addClass("expanded");e(this).find("i").html("&#9650;");l.find(">ul").slideDown(h.animSpeed,h.easingEffect)}});k.on("click",".collapse-button",function(l){l.preventDefault();j.slideToggle(h.animSpeed,h.easingEffect)});this.resizeMenu({data:{el:this.element,options:this.options}});e(c).on("resize",{el:this.element,options:this.options},this.resizeMenu)},resizeMenu:function(k){var l=e(c),h=k.data.options,i=e(k.data.el),j=e("body").find(".menu-collapser");i.find("li").each(function(){if(e(this).has("ul").length){if(e(this).has(".sub-collapser").length){e(this).children(".sub-collapser i").html("&#9660;")}else{e(this).append('<span class="sub-collapser"><i>&#9660;</i></span>')}}e(this).children("ul").hide();e(this).find(".sub-collapser").removeClass("expanded").children("i").html("&#9660;")});if(h.resizeWidth>=l.width()){if(h.indentChildren){i.find("ul").each(function(){var m=e(this).parents("ul").length;if(!e(this).children("li").children("a").has("i").length){e(this).children("li").children("a").prepend(b.prototype.indent(m,h))}})}i.find("li").has("ul").off("mouseenter mouseleave");i.addClass("collapsed").hide();j.show()}else{i.find("li").has("ul").on("mouseenter",function(){e(this).find(">ul").stop().slideDown(h.animSpeed,h.easingEffect)}).on("mouseleave",function(){e(this).find(">ul").stop().slideUp(h.animSpeed,h.easingEffect)});i.find("li > a > i").remove();i.removeClass("collapsed").show();j.hide()}},indent:function(k,j){var h="";for(var l=0;l<k;l++){h+=j.childrenIndenter}return"<i>"+h+"</i>"}};e.fn[d]=function(h){return this.each(function(){if(!e.data(this,"plugin_"+d)){e.data(this,"plugin_"+d,new b(this,h))}})}})(jQuery,window,document);