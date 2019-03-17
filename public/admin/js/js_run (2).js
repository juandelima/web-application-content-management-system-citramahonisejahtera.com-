$(document).ready(function () {
    bannerAnim();//animation circle banner
    //accordionSideMenu();//side menu accordion
    zoomOperationMap();//zoom feature for map at operational networks
    accordionGCG();
    productListType();
    productImagePreview();
    floatingHeader();
    repostionBannerImage();
    imageIndentifyStyling();//add styling default for image or list image at standart content
    mobileMenu();//mobile menu toggle
    productMenu();
    footer_dropdown();
    contentHeight();
    ImageBanner();
    
	/* back to top */
	scrolltoTop();
	
    $('.banner_home .bg_1').mouseEffect({
        distance_move: 0.8,
        type_move: "margin",
        transition_time: 1
    });

    $(".filter_product input[type=checkbox]").optCustom();
    $(".std_content select").styledSelect()
    $(".top_nav select").styledSelect()
    $(".operational_net select").styledSelect()
    $(".solution_home .box,.home_bottom .box").hoverBoxStd({title: 'h4'});//hover animation box content at home
    $(".link_about .box").hoverBoxStd({title: 'h5'});//hover animation box link about
    $(".apply .input_file").fileInputC();// input file custom

    //lang_Menu(); //Select box language
    popupMobile(); //Responsive image on investor page

});
$(window).load(function () {
    TweenLite.to($("body"), 0.2, {opacity: 1});
});