$(function() {
    // 슬라이드 관련 js
    $('.slider').each(function(){
        var $slideGroup = $('.slideshow-slide'),
            $slides = $slideGroup.find('li'),
            slideCount = $slides.length,
            currentIndex = 0 ;
            //console.log(slideCount);

            //slides 각각 left 가로로 정렬
        $slides.each(function(i){
            $(this).css({left:100*i+'%'});
        })  ;
        
        function gotoSlide(index){
            $slideGroup.stop(true).animate({left:-100*index+'%'},500);
            currentIndex = index;
        }

        setInterval(function(){
            var nextIndex = (currentIndex+1)%slideCount;
            gotoSlide(nextIndex);
        },5000)

    }); // end // 슬라이드 관련 js

    // header sticky  -----------------------
    var $header = $('header');
    $(window).scroll(function(){
        var $currentSct = $(this).scrollTop();       

        if($currentSct > 0){
            $header.addClass('sticky');
        }else{
            $header.removeClass('sticky');
        };

        // servives 나타나기
        
        var serviceThreshold = $('.services').offset().top - 400,
            serviceExe = false;
            
            //console.log(serviceThreshold);

        if(!serviceExe){
            if(serviceThreshold < $currentSct){
                $('.services').addClass('active');
                serviceExe = true;
            };
        };
        //console.log(serviceThreshold);
        //console.log($currentSct);
        

    });
    
    //video  .overlay
    $('.video .icon').click(function(e){
        e.preventDefault();
        $('#overlay').addClass('visible');

        //자동재생
        var currentUrl = $('iframe').attr('src');
        var newStr = '?autoplay=1';
        var newUrl =currentUrl.concat(newStr);
        //console.log(newUrl);

        $('iframe').attr('src',newUrl);

    });
    $('.video .close').click(function(e){
        e.preventDefault();
        $('#overlay').removeClass('visible');
        //끄면, 다시 처음으로 시작하는
        $(this).siblings('iframe').attr('src',$('iframe').attr('src'));
    });

});// end ready