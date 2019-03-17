$.fn.styledSelect = function (options) {
    var isFF2 = false;
    var prefs = {
        coverClass: 'cover_combo',
        innerClass: 'inner_combo',
        adjustPosition: {
            top: 0,
            left: 0
        },
        selectOpacity: 0
    }
    if (options)
        $.extend(prefs, options);
    return this.each(function () {
        if (isFF2)
            return false;
        var selElm = $(this);
        if (!selElm.next('span.' + prefs.innerClass).length) {
            selElm.wrap('<span><' + '/span>');
            selElm.after('<span><' + '/span>');
            var selReplace = selElm.next();
            var selCover = selElm.parent();
            selElm.css({
                'opacity': prefs.selectOpacity,
                'visibility': 'visible',
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'display': 'inline',
                'z-index': 1
            });
            selCover.addClass(prefs.coverClass).css({
                'display': 'inline-block',
                'position': 'relative',
                'top': prefs.adjustPosition.top,
                'left': prefs.adjustPosition.left,
                'z-index': 0,
                'vertical-align': 'middle',
                'text-align': 'left'
            });
            selReplace.addClass(prefs.innerClass).css({
                'display': 'block',
                'white-space': 'nowrap'
            });
            selElm.bind('change', function () {
                $(this).next().text(this.options[this.selectedIndex].text);
            }).bind('resize', function () {
                $(this).parent().width($(this).width() + 'px');
            });
            selElm.trigger('change').trigger('resize');
        } else {
            var selElm = $(this);
            var selReplace = selElm.next();
            var selCover = selElm.parent();
            selElm.css({
                'opacity': prefs.selectOpacity,
                'visibility': 'visible',
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'display': 'inline',
                'z-index': 1
            });
            selCover.css({
                'display': 'inline-block',
                'position': 'relative',
                'top': prefs.adjustPosition.top,
                'left': prefs.adjustPosition.left,
                'z-index': 0,
                'vertical-align': 'middle',
                'text-align': 'left'
            });
            selReplace.css({
                'display': 'block',
                'white-space': 'nowrap'
            });
        }
    });
}
$.fn.placeHolder = function () {
    var
            elem = this,
            data = elem.attr('data-placeholder'),
            _this;
    elem.each(function () {
        _this = $(this);
        data = _this.attr('data-placeholder');
        _this.val(data);
        _this.focusin(function () {
            data = $(this).attr('data-placeholder');
            if ($(this).val() === data) {
                $(this).val("")
            }
        });
        _this.focusout(function () {
            data = $(this).attr('data-placeholder');
            if ($(this).val() === "") {
                $(this).val(data);
            }
        });
    });
};

function bannerAnim() {
    var elem = $(".banner_home .large_circle");
    if ($(window).width() > 767) {
        TweenLite.set(elem.find(".c_ayam"), {opacity: 0, scale: 0.7});
        TweenLite.set(elem.find(".little_circle"), {opacity: 0});
        TweenLite.set(elem.find(".little_circle .text"), {opacity: 0});
        TweenLite.set(elem.find(".little_circle .cirlce span"), {scale: 0});
        $(window).load(function () {
            TweenLite.to(elem.find(".c_ayam"), 1, {opacity: 1, scale: 1, ease: Cubic.easeOut})
            TweenMax.staggerTo(elem.find(".little_circle"), 1.5, {
                margin: 0,
                opacity: 1,
                ease: Cubic.easeOut,
                delay: 0.8
            }, 0.3);
            TweenLite.to(elem.find(".little_circle .text"), 1, {opacity: 1, delay: 4});
            TweenLite.to(elem.find(".little_circle .cirlce span"), 1, {scale: 1, delay: 3});
        });
    }
    elem.find(".little_circle").hover(function () {
        if ($(window).width() > 767) {
            var elem_ = $(this);
            if (elem_.find(".cirlce span").attr('dataTop') === undefined)
                elem_.find(".cirlce span").attr({
                    dataTop: elem_.find(".cirlce span").css('top'),
                    dateLeft: elem_.find(".cirlce span").css('left')
                });
            TweenLite.to(elem_.find(".text"), 0.2, {color: '#f79e00'});
            TweenLite.to(elem_.find(".cirlce span"), 0.3, {top: 0, left: 0});
        }
    }, function () {
        if ($(window).width() > 767) {
            var elem_ = $(this);
            TweenLite.to(elem_.find(".text"), 0.2, {color: '#ffffff'});
            TweenLite.to(elem_.find(".cirlce span"), 0.3, {
                top: elem_.find(".cirlce span").attr('dataTop'),
                left: elem_.find(".cirlce span").attr('dateLeft'),
            });
        }
    });
}
function accordionSideMenu() {
    $(".side_nav .box.have_child").children('a').click(function (e) {
        e.preventDefault();
        $(this).parent('.box').children('.child').slideToggle(300);
    });
}
function accordionGCG() {
    $(".list_certificate .head").click(function (e) {
        e.preventDefault();
        $(this).toggleClass('active')
        $(this).parent('.box').children('.content_desc').slideToggle(300);
    });
}

function zoomOperationMap() {
    $(".operational_net .zoomin").click(function (e) {
        e.preventDefault();
        var
                map = $(".operational_net .map img"),
                zoom_state = map.attr('zoom-state');
        if (zoom_state === undefined) {
            map.attr('zoom-state', '1.1');
            zoom_state = 1.1;
        }
        if (zoom_state < 3) {
            var zoom_state = parseFloat(map.attr('zoom-state')) + 0.1;
            map.attr('zoom-state', zoom_state);
            TweenLite.to(map, 0.3, {scale: zoom_state, ease: Power1.easeOut});
        }
    });
    $(".operational_net .zoomout").click(function (e) {
        e.preventDefault();
        var
                map = $(".operational_net .map img"),
                zoom_state = map.attr('zoom-state');
        if (zoom_state === undefined) {
            map.attr('zoom-state', '0.9');
            zoom_state = 0.9;
        }
        if (zoom_state > 0.1) {
            var zoom_state = parseFloat(map.attr('zoom-state')) - 0.1;
            map.attr('zoom-state', zoom_state);
            TweenLite.to(map, 0.3, {scale: zoom_state, ease: Power1.easeOut});
        }
    });
}
$.fn.hoverBoxStd = function (s) {
    var elem_box = this;
    elem_box.hover(function () {
        var
                elem = $(this).children('a'),
                img = elem.children("img"),
                title = elem.children(s.title),
                title_line = elem.children("span");
        TweenLite.set(title_line, {height: title.outerHeight()});
        TweenLite.to(img, 20, {scale: 1.3, ease: Linear.linear});
        TweenLite.to(title, 0.3, {background: "rgba(0,0,0,0)"})
        TweenLite.to(title_line, 0.5, {width: "100%", ease: Cubic.easeOut});
    }, function () {
        var
                elem = $(this).children('a'),
                img = elem.children("img"),
                title = elem.children(s.title),
                title_line = elem.children("span");
        TweenLite.to(img, 0.3, {scale: 1, ease: Cubic.easeInOut});
        TweenLite.to(title, 0.3, {background: "rgba(0,0,0,0.7)"})
        TweenLite.to(title_line, 0.5, {width: '0', ease: Cubic.easeOut});
    })
}

$.fn.fileInputC = function (e) {
    var elem = this, input = elem.find("input");
    input.on('change', function () {
        value = $(this).val();
        if (value != "") {
            value = value.substring(12, value.length);
            $(this).next("span").html(value);
        } else {
            $(this).next("span").html(elem.attr('placeholder-text'));
        }
    });
}

$.fn.optCustom = function (q) {
    var
            elem = this,
            s = {
                className: 'checkbox_custom',
            };
    s = $.extend(s, q);
    elem.wrap("<div class='" + s.className + "' style='position:relative' ></div>");
    elem.css({
        position: 'absolute',
        top: 0,
        left: 0,
        opacity: 0,
        width: "100%",
        height: "100%"
    });
    elem.each(function () {
        if ($(this).is(":checked")) {
            $(this).parent().addClass('active');
        }
    });
    elem.on('change', function () {
        if ($(this).attr('type') === "checkbox")
            if (!$(this).is(":checked")) {
                $(this).parent().removeClass('active');
                console.log('c')
            } else {
                $(this).parent().addClass('active');
                console.log('a')

            }
        else
            $("input[type=radio][name=" + $(this).attr('name') + "]").each(function () {
                if ($(this).is(":checked")) {
                    $("input[type=radio][name=" + $(this).attr('name') + "]").parent().removeClass('active');
                    $(this).parent().addClass('active');
                    return false;
                }
            });
    });
    elem.parents().on('click', function () {
        if ($(this).attr('type') === "checkbox") {
//            if ($(this).children('input').is(":checked")) {
//                $(this).removeClass('active');
//            } else {
//                console.log('sa')
//                $(this).addClass('active');
//            }
        } else
            $("input[type=radio][name=" + $(this).attr('name') + "]").each(function () {
                if ($(this).is(":checked")) {
                    $("input[type=radio][name=" + $(this).attr('name') + "]").parent().removeClass('active');
                    $(this).parent().addClass('active');
                    return false;
                }
            });
    });
};
function productListType() {
    $(".viewtype_bar a").removeClass('active');
    if ($(".list_product").hasClass('grid')) {
        $(".viewtype_bar a.grid").addClass('active');
    } else if ($(".list_product").hasClass('list')) {
        $(".viewtype_bar a.list").addClass('active');
    }

    $(".viewtype_bar a").on('click', function (e) {
        e.preventDefault();
        $(".viewtype_bar a").removeClass('active');
        $(this).addClass('active');
        $(".list_product")
                .removeClass('grid')
                .removeClass('list');
        if ($(this).hasClass('grid'))
            $(".list_product").addClass('grid')
        else if ($(this).hasClass('list'))
            $(".list_product").addClass('list')
    });
}

function productImagePreview() {

    $(".image_preview .slide a").click(function (e) {
        e.preventDefault();
        var src = $(this).attr('href');
        $(".image_preview .image_large")
                .stop()
                .animate({opacity: 0}, 300, '', function () {
                    $(".image_preview .image_large img").attr('src', src);
                    $(".image_preview .image_large img").load(function () {
                        $(".image_preview .image_large")
                                .delay(50)
                                .stop()
                                .animate({opacity: 1}, 300);
                    })
                });
    });
}

function floatingHeader() {
    $(window).scroll(function () {
        var elem = $("header .floating_header");
        if ($(window).width() > 768) {
            if ($(this).scrollTop() > $("header").height()) {
                if (!elem.hasClass('active')) {
                    elem.addClass('active');
                    TweenLite.set(elem, {top: -$("header").height()});
                    TweenLite.to(elem, 0.5, {top: 0, ease: Power1.easeOut});
                }
            } else {
                elem.removeClass('active');
            }
        }
        else {
            elem.removeClass('active');
        }
    });
}
function repostionBannerImage() {
    var act = function (elem) {
        var
                width = elem.width(),
                window_width = $(".banner_home").width(),
                result = ((window_width - width) / 2);
        if ($(window).width() < 768)
            result = result / 4;
        elem.css({
            left: (result + 4) + "px"
        });
    };
    $(window).load(function () {
        act($(".banner_home .bg_1"));
        act($(".banner_home .bg_2"));
    });
    $(window).resize(function () {
        act($(".banner_home .bg_1"));
        act($(".banner_home .bg_2"));
    });
}

$.fn.mouseEffect = function (s) {
    var
            elem = this,
            fixer = 0.5,
            e = {
                transition_time: 0.5,
                distance_move: 1,
                type_move: 'position',
                wrapper: elem.parent()
            };
    s = $.extend({}, e, s);
    if ($(window).width() >= 1280) {
        s.wrapper.mousemove(function (e) {
            elem.each(function () {

                var
                        elem = $(this),
                        posX = e.pageX - s.wrapper.offset().left,
                        posY = e.pageY - s.wrapper.offset().top,
                        percentX = posX / s.wrapper.width() * 100,
                        percentY = posY / s.wrapper.height() * 100,
                        moveX = (percentX * s.distance_move),
                        moveY = (percentY * s.distance_move),
                        css = {};
                if (s.type_move === "position") {
                    css.left = "-" + moveX;
                    css.top = "-" + moveY;
                } else if (s.type_move === "margin") {
                    css.marginLeft = "-" + moveX;
                    css.marginTop = "-" + moveY;
                }
                TweenMax.to(elem, s.transition_time, {
                    css: css,
                    ease: Linear.Linear,
                    overwrite: 'auto'
                });
            });
        });
    }
};
function imageIndentifyStyling() {
    $(".std_content p,div.list_image").each(function () {
        $(this).children('img').removeAttr('style');
        if ($(this).children('img').length > 1 && $(this).children('img').length < 4) {
            $(this).children('br').remove();
            var inner_html = $(this).html();
            inner_html.replace("&nbsp;");
            $(this).replaceWith("<div class='list_image'>" + inner_html.replace(/&nbsp;/gi, '') + "</div>");
        } else if ($(this).children('img').length > 3) {
            $(this).children('br').remove();
            var inner_html = $(this).html();
            $(this).replaceWith("<div class='list_image type2'>" + inner_html.replace(/&nbsp;/gi, '') + "</div>");
        } else if ($(this).children('img').length === 1) {
            $(this).children('br').remove();
            var inner_html = $(this).html();
            inner_html.replace("&nbsp;");
            $(this).replaceWith("<div class='image'>" + inner_html.replace(/&nbsp;/gi, '') + "</div>");
        }
    });
}

function mobileMenu() {
	$("header .header_top .box.lang").clone().appendTo("header .wrapper");
    $("header .wrapper").append("<a class='toggle_menu'>toggle menu<span></span> <span></span> <span></span></a>");
    $("header .header_top").clone().appendTo("header nav");
    $("header").on('click', '.toggle_menu', function (e) {
        e.preventDefault();
        var nav = $("header nav")

        if (!nav.hasClass('expand')) {
            TweenLite.to(nav, 0.5, {
                right: 0,
                ease: Cubic.easeOut
            });
            TweenLite.to($('body,.floating_header'), 0.5, {
                left: -nav.width(),
                ease: Cubic.easeOut
            });
            nav.addClass('expand');
            TweenLite.to($(".toggle_menu span:nth-child(1),.toggle_menu span:nth-child(3)"), 0.3, {
                top: '13.5px',
                delay: 0.5
            });
            TweenLite.to($(".toggle_menu span:nth-child(2)"), 0.3, {
                opacity: 0,
                delay: 0.5
            });
            TweenLite.to($(".toggle_menu span:nth-child(1)"), 0.3, {
                transform: 'rotate(45deg)',
                delay: 0.8,
                ease: Cubic.easeOut
            });
            TweenLite.to($(".toggle_menu span:nth-child(3)"), 0.3, {
                transform: 'rotate(-45deg)',
                delay: 0.8,
                ease: Cubic.easeOut
            });
        } else {
            TweenLite.to(nav, 0.5, {
                right: -nav.width(),
                ease: Cubic.easeOut
            });
            TweenLite.to($('body,.floating_header'), 0.5, {
                left: 0,
                ease: Cubic.easeOut
            });
            TweenLite.to($(".toggle_menu span:nth-child(1)"), 0.3, {
                transform: 'rotate(0)',
                delay: 0.5
            });
            TweenLite.to($(".toggle_menu span:nth-child(3)"), 0.3, {
                transform: 'rotate(0)',
                delay: 0.5
            });
            TweenLite.set($(".toggle_menu span:nth-child(2)"), {
                opacity: 1,
                delay: 0.8
            });
            TweenLite.to($(".toggle_menu span:nth-child(1)"), 0.4, {
                top: '6.5px',
                delay: 0.8,
                ease: Cubic.easeOut
            });
            TweenLite.to($(".toggle_menu span:nth-child(3)"), 0.4, {
                top: '20.5px',
                delay: 0.8,
                ease: Cubic.easeOut,
                onComplete: function () {
                    nav.removeClass('expand');
                }
            });
        }
    });
    $(".side_nav h2").click(function () {
        if (!$(this).hasClass('expand')) {
            $(this).next().slideDown(300);
            $(this).addClass('expand')
        } else {
            $(this).next().slideUp(300);
            $(this).removeClass('expand')

        }
    });
}

function productMenu() {
    $(".side_nav .box.have_child").removeClass('active');
    $(".side_nav .box.have_child").each(function () {
        if ($(this).find('.active').length) {
            $(this).addClass('active');
        }
    });

}

function footer_dropdown() {
    $("footer .box h5 span").click(function (e) {
        if ($(window).width() < 768) {
            // e.preventDefault();
            if ($(this).parent().parent().hasClass('active'))
                $(this).parent().parent().removeClass('active');
            else {
                $(this).parent().parent().addClass('active');
            }

        }
    });
}

function contentHeight() {
    if ($(".side_nav").length)
        $(".std_content").css('min-height', $('.side_nav').outerHeight());
}

function popupMobile(){
    var ww= $(window).width();

    $(window).resize(function(){
        ww= $(window).width();
        if(ww > 1024)
            $("#popup_mobile").fadeOut(300);
    });

    $(".stock-and-bond-information .inner_content .image img").click(function(){
        if($(window).width() < 1024){
            var elem= $(this);
            if(!$("#pop_img .content img").length){
                $("#pop_img .content").append("<img src='' alt='img'/>");
            }
            $("#pop_img .content img").attr('src',elem.attr('src'));
            $("#pop_img").fadeIn(300);
        }
    });
}

function ImageBanner() {
    if($(window).width() <=767) {

    act = function () {
        var
                window_width = $(window).width(),
                img_width = $(".std_content .respo img").outerWidth();
            $(".std_content .respo img").css({
                position: 'relative',
                left: -(img_width - window_width) / 2
            });
    };
    $(window).load(function () {
        act();
    })
    $(window).resize(function () {
        act();
    });
    act();
    }
}

/* back to top
-------------------------------------------------------------- */
$(window).on('onFooter', function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - ($('footer').outerHeight() * 1)) {
        $(".go_top").addClass('absSroll');
        TweenLite.to($(".go_top"),0,{bottom: $('footer').outerHeight() + 20, ease: Power1.easeOut});
    } else {
        $('.go_top').removeClass('absSroll');
        TweenLite.to($(".go_top"),0,{bottom: '30px'});
    }

}).scroll(function () {
    $(this).trigger('onFooter');
}).resize(function () {
    $(this).trigger('onFooter');
});

function scrolltoTop(){    
    $(window).scroll(function(){
        if ($(this).scrollTop() > 150) {
            $('.go_top').fadeIn();
        } else {
            $('.go_top').fadeOut();
        }
    });        
    $('.go_top .ico_top').click(function(){
        //alert('hahaha');
        $('html, body').animate({scrollTop : 0},1000);
    });
};