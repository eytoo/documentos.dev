jQuery(document).ready(function($) {
    var isTouch = !!('ontouchstart' in window),
    clickEvent = isTouch ? 'tap' : 'click';


    (function(){
        var $example = $('#example'),
        $frame = $('.frame', $example),
        $caption = $('#caption', $example),
        $fullscreen = $('#fullscreen', $example),
        lastIndex = 0;

        $frame.mightySlider({
            speed: 1000,
            viewport: 'fill',
            easing: 'easeOutExpo',

                    // Navigation options
                    navigation: {
                        slideSize: '100%',
                        keyboardNavBy: 'slides'
                    },

                    // Dragging
                    dragging: {
                        mouseDragging: 0,
                        touchDragging: 0
                    },

                    // Pages
                    pages: {
                        activateOn: clickEvent
                    },

                    // Buttons
                    buttons: {
                        fullScreen: $fullscreen
                    },

                    // Commands
                    commands: {
                        pages: 1,
                        buttons: 1
                    }
                },
                {
                    active: function(name, index) {
                        if (lastIndex === index)
                            return false;

                        var self = this,
                        el = this.slides[index].element,
                        $videos = $('video', $example),
                        $video = $('video', el);
                        video = $video[0];

                        $videos.unbind('ended').each(function() {
                            this.pause();
                        });

                        if (video && video.paused) {
                            if (video.currentTime !== 0)
                                video.currentTime = 0;

                            video.play();

                            $video.one('ended', function(){
                                if (index === self.slides.length-1)
                                    self.activate('0');
                                else
                                    self.next();
                            });
                        }

                        lastIndex = index;
                    },
                    coverLoaded: function(name, index) {
                        var self = this,
                        el = this.slides[index].element,
                        $video = $('video', el);
                        video = $video[0];

                        if (video) {
                            video.removeAttribute('loop');

                            if (self.relative.activeSlide !== index)
                                video.pause();
                            else
                                $video.one('ended', function(){
                                    if (index === self.slides.length-1)
                                        self.activate('0');
                                    else
                                        self.next();
                                });
                        }
                    },
                    enterFullScreen: function() {
                        $fullscreen.removeClass('icon-expand').addClass('icon-compress');
                    },
                    exitFullScreen: function() {
                        $fullscreen.addClass('icon-expand').removeClass('icon-compress');
                    }
                });

        $(document).on(clickEvent, '.paper_watch', function() {
            var $parent = $(this).parents('.mSSlide'),
            $playIcon = $('.mSVideo', $parent);

            $playIcon.trigger('click');
        });
    })();
});