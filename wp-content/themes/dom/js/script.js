function svgInit() {
  $('img[src$=".svg"]').each(function () {
    let $img = $(this);
    let imgID = $img.attr('id');
    let imgClass = $img.attr('class');
    let imgURL = $img.attr('src');
    $.get(imgURL, function (data) {
      // Get the SVG tag, ignore the rest
      let $svg = $(data).find('svg');
      // Get Class name
      let $svgClass = $svg.attr('class') ? $svg.attr('class') : '';
      // Add replaced image's ID to the new SVG
      if (typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID);
      }
      // Add replaced image's classes to the new SVG
      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' ' + $svgClass + ' replaced-svg');
      }
      // Remove any invalid XML tags as per http://validator.w3.org
      $svg.removeAttr('xmlns:a');
      // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
      if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
      }
      // Replace image with new SVG
      $img.replaceWith($svg);
    }, 'xml');
  });
}

svgInit(); // Convert img to svg


$(document).ready(function () {
  // Start - Header
  function toggleMenu() {
    let header = $('.site-header');
    if (header.hasClass('open')) {
      header.removeClass('open');
    } else {
      header.addClass('open');
    }
  }

  $('#NavMenuButton').click(function () {
    toggleMenu();
  });

  $('#CloseMenuButton').click(function () {
    toggleMenu();
  });

  $(document).keyup(function (e) {
    // press esc
    if (e.keyCode === 27) {
      toggleMenu();
    }
  });
  // End - Header


  // Slider
  let body = $('body');
  $('.introductionSlider').slick({
    infinite: true,
    dots: false,
    arrows: true,
    mobileFirst: true,
    autoplay: true,
    autoplaySpeed: 2000
  });

  let settings = {
    infinite: true,
    dots: false,
    arrows: true,
    mobileFirst: true,
    adaptiveHeight: true
  };

  if (body.is('.page-gallery')) {
    settings = {
      infinite: true,
      dots: false,
      arrows: true,
      mobileFirst: true,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            fade: true
          }
        }
      ]
    };
  }

  if (body.is('.page-promotions, .single-post')) {
    settings = {
      infinite: true,
      dots: false,
      arrows: true,
      mobileFirst: true,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        }
      ]
    }
  }

  $('.defaultSlick').slick(settings);

  // Menu Page
  let pageMENU = {
    _currentWidth: $(window).width(),
    _header: $('header.site-header'),
    _tabControl: $('.menu_section .tabControl'),
    _tabContent: $('.menu_section .tabContent'),
    _tabContentHeight: $(window).height(),
    _listenTabContentScrollIsEnable: false,
    _lastScroll: 0,

    init: function () {
      this.listenTabControlClick();
      this.initStickyMenu();
    },

    listenTabControlClick: function () {
      console.log('=== listenTabControlClick');
      $('.tabControl ._tab').click(function () {
        let current = $(this);
        let targetTab = current.attr('data-id');
        // Toggle Effect
        $('.tabControl ._tab').removeClass('activated');
        current.addClass('activated');
        $('.tabContent ._content').removeClass('activated');
        $('#' + targetTab).addClass('activated');
        // Update the size of slick slider
        $('.defaultSlick').slick('setPosition');
      })
    },

    initStickyMenu: function () {
      this.doResize();
      this.listenResize();
    },

    listenResize: function () {
      let _this = this;
      $(window).resize(function () {
        _this.doResize();
      });
    },

    doResize: function () {
      let _this = this;
      _this._currentWidth = $(window).width();
      if (_this._currentWidth < 1200) {
        _this.reset();
        return false;
      }

      let curBody = $("html, body");
      curBody.stop().animate({scrollTop: 0}, 200);
      _this.offBodyScroll();

      let menuHeight = _this._header.outerHeight();
      let tabControlHeight = _this._tabControl.outerHeight();
      let tabContentHeight = $(window).height() - menuHeight - tabControlHeight;
      _this._tabContent.css('height', tabContentHeight + 'px');

      // if (!_this._listenTabContentScrollIsEnable) {
      //   _this.listenTabContentScroll();
      // }

      return tabContentHeight;
    },

    listenTabContentScroll: function () {
      let _this = this;
      _this._tabContent.on('scroll', function () {
        let curScrollTop = _this._tabContent.scrollTop();
        _this._lastScroll = _this._tabContent.scrollTop();

        let curTabContentHeight = _this._tabContent.height();
        let scrollHeight = _this._tabContent.prop('scrollHeight');

        // if ((curScrollTop + curTabContentHeight) > (scrollHeight - 10)) {
        //   console.log("end");
        //   _this.onBodyScroll();
        //   _this.listenBodyScroll();
        //   _this._tabContent.css('overflow-y', 'hidden');
        // } else {
        //   $('body.page-menu').animate({scrollTop: 0}, 100);
        //   _this.offBodyScroll();
        //   _this._tabContent.css('overflow-y', 'auto');
        // }
      });
    },

    onBodyScroll: function () {
      $('body.page-menu').css('overflow-y', 'auto');
    },

    offBodyScroll: function () {
      $('body.page-menu').css('overflow-y', 'hidden');
    },

    reset: function () {
      this._tabContent.attr('style', '');
      $('body.page-menu').attr('style', '');
    }
  }

  if (body.is('.page-menu, .page')) {
    pageMENU.init();
  }

});