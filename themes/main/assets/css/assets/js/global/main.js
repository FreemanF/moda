import 'lazyloadxt/dist/jquery.lazyloadxt.js';

(function($) {

  // Matches trailing non-space characters.
  var chop = /(\s*\S+|\s)$/;

  // Matches the first word in the string.
  var start = /^(\S*)/;

  // Return a truncated html string.  Delegates to $.fn.truncate.
  $.truncate = function(html, options) {
    return $('<div></div>').append(html).truncate(options).html();
  };

  // Truncate the contents of an element in place.
  $.fn.truncate = function(options) {
    if ($.isNumeric(options)) options = {length: options};
    var o = $.extend({}, $.truncate.defaults, options);

    return this.each(function() {
      var self = $(this);

      if (o.noBreaks) self.find('br').replaceWith(' ');

      var text = self.text();
      var excess = text.length - o.length;

      if (o.stripTags) self.text(text);

      // Chop off any partial words if appropriate.
      if (o.words && excess > 0) {
        var truncated = text.slice(0, o.length).replace(chop, '').length;

        if (o.keepFirstWord && truncated === 0) {
          excess = text.length - start.exec(text)[0].length - 1;
        } else {
          excess = text.length - truncated - 1;
        }
      }

      if (excess < 0 || !excess && !o.truncated) return;

      // Iterate over each child node in reverse, removing excess text.
      $.each(self.contents().get().reverse(), function(i, el) {
        var $el = $(el);
        var text = $el.text();
        var length = text.length;

        // If the text is longer than the excess, remove the node and continue.
        if (length <= excess) {
          o.truncated = true;
          excess -= length;
          $el.remove();
          return;
        }

        // Remove the excess text and append the ellipsis.
        if (el.nodeType === 3) {
          // should we finish the block anyway?
          if (o.finishBlock) {
            $(el.splitText(length)).replaceWith(o.ellipsis);
          } else {
            $(el.splitText(length - excess - 1)).replaceWith(o.ellipsis);
          }
          return false;
        }

        // Recursively truncate child nodes.
        $el.truncate($.extend(o, {length: length - excess}));
        return false;
      });
    });
  };

  $.truncate.defaults = {

    // Strip all html elements, leaving only plain text.
    stripTags: false,

    // Only truncate at word boundaries.
    words: false,

    // When 'words' is active, keeps the first word in the string
    // even if it's longer than a target length.
    keepFirstWord: false,

    // Replace instances of <br> with a single space.
    noBreaks: false,

    // if true always truncate the content at the end of the block.
    finishBlock: false,

    // The maximum length of the truncated html.
    length: Infinity,

    // The character to use as the ellipsis.  The word joiner (U+2060) can be
    // used to prevent a hanging ellipsis, but displays incorrectly in Chrome
    // on Windows 7.
    // http://code.google.com/p/chromium/issues/detail?id=68323
    ellipsis: '\u2026' // '\u2060\u2026'

  };

})(jQuery);

$('document').ready(function () {
    // Fixed header
    var $header = $('.js-fixed_header');
    var $window = $(window);
    $window.scroll(function() {
        var windscroll = $window.scrollTop();
        if (windscroll > 130) {
            $header.addClass("b-header-fixed_type_shown");
        } else {
            $header.removeClass("b-header-fixed_type_shown");
        }
    });

    // Sorting tabs
    var $tabs = ".js-sorting-tabs";
    var $list_class = $(".js-sorting_tabs_list");
    var $item = $(".js-sorting_tabs_item");
    var $active_class = $list_class.data("itemClassactive");
    var $button = ".js-sorting_tabs_button";
    var $list = $list_class.data("classactive");

    function item_text(){
         $($tabs).each(function(){
            var $this_text = $(this).find("." + $active_class).text();
            $(this).find($button).html($this_text);
         });
    }
    item_text();
    $($item).on("click", function(){
        $(this).addClass($active_class).siblings(this).removeClass($active_class).parent().removeClass($list);
        item_text();
    });
    $($button).on("click", function(){
        $(this).parent().next().toggleClass($list);
    });

    // bind GA events
//    $('.js-ga-onclick').on('click', function () {
//        var e = $(this).data();
//        if (ga) {
//            return ga('send', 'event', e.eventCategory, e.eventAction, e.eventLabel, 1);
//        }
//        console.log('GA lib is not loaded');
//    });

    // bind GA events
//    $('.js-link').on('click', function (e) {
//        e.preventDefault();
//        e.stopPropagation();
//        var href = $(this).data('href');
//        if (href) {
//            window.location = href;
//        }
//    });
    
    // lazyload images
    $.extend($.lazyLoadXT, {
        selector: "img.js-lazy-img",
        autoInit: false,
        oninit: function() {},
        onerror: function() {
            var placeholder = $(this).data('placeholder');
            $(this).attr('src', placeholder).addClass("lazy-error");
        }
    });

    // Handle toggle favourites
    $('.js-toggle-favourite').on('click', function(e) {
        e.preventDefault();
        var data = $(e.currentTarget).data();

        $.ajax({
            url: '/util/toggle_favourite',
            type: 'POST',
            data: {
                product_id: data.productId,
                csrfmiddlewaretoken: data.csrfmiddlewaretoken
            },
            success: function (response) {
                if (response && response.success) {
                    document.location.reload();
                }
            }
        });
    });

    // Handle toggle product pin
    $('.js-toggle-pin').on('click', function(e) {
        e.preventDefault();
        var data = $(e.currentTarget).data();
        var self = this;

        $.ajax({
            url: data.url,
            type: 'POST',
            data: {
                product_id: data.productId,
                csrfmiddlewaretoken: data.csrfmiddlewaretoken
            },
            success: function (response) {
                if (response.success) {
                    window.location.reload();
                }
            }
        });
    });

    /*
     * Toggle dropdown menus.
     *
     * Menus must open/close on mouse click.
     * Click on outer area must close all opened menus.
     * Click on certain menu must close other opened menus.
     * TODO Optimize toggle logic below
      */
    // dropdown profile menu
    $('.js-profile-menu').on('click', function(e) {
        $(this).toggleClass('b-header-links__profile_state_opened');
        $('.js-catalog-menu').removeClass('b-nav__item_state_opened');
        $('.js-catalog-mobile-menu').removeClass('b-nav__mobile-menu_state_opened');
    });

    // dropdown catalog menu
    $('.js-catalog-menu').on('click', function(e) {
        $('b-nav__item_state_opened').each(function() {
            $(this).removeClass('b-header-links__profile_state_opened');
        });
        $(this).toggleClass('b-nav__item_state_opened');
        $('.js-profile-menu').removeClass('b-header-links__profile_state_opened');
    });

    // dropdown mobile catalog menu
    $('.js-catalog-mobile-menu').on('click', function(e) {
        $(this).toggleClass('b-nav__mobile-menu_state_opened');
        $('.js-profile-menu').removeClass('b-header-links__profile_state_opened');
    });

    // Click on outer area must close opened menus
    $(document).on("click", function (event) {
        var $trigger = $(".js-dropdown");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $('.js-profile-menu').removeClass('b-header-links__profile_state_opened');
            $('.js-catalog-menu').removeClass('b-nav__item_state_opened');
            $('.js-catalog-mobile-menu').removeClass('b-nav__mobile-menu_state_opened');
        }
    });

    // Toggles
    $(".js-toggle").click(function(){
        var $this = $(this);
        $("#" + $this.data("targetId")).toggleClass($this.data("toggleClassname"));
    });

    $(".js-promo-section").click(function(e) {
        var $target = $(this).parent();
        $target.toggleClass($target.data("classactive"));
        $target.siblings().removeClass($target.data("classactive"));
    });

    //
    $('.js-truncated').each(function() {
        var el = $(this);
        var max_length = parseInt($(this).data('length'));
        var textClass = $(this).data('text-class');
        if (el.text().length < max_length) return;

        var excerpt = $.truncate(el.html(), {
            length: max_length,
            ellipsis: '...'
        });
        var truncated = $(excerpt);
        var original = $(textClass, el).hide();
        $(this).append(truncated);

        $('p:last-child', truncated).append(' <a class="b-link_theme_green" href="#more content">' + 'читать дальше' + "</a>");
        $('p:last-child', original).append(' <a class="b-link_theme_green" href="#less content">' + 'свернуть' + "</a>");
        truncated.find("a:last").click(function () {
            truncated.hide();
            original.show();
            return false;
        });
        original.find("a:last").click(function () {
            truncated.show();
            original.hide();
            return false;
        });
    });


    $(".js-collapse").click(function(e){
        e.preventDefault();
        var $this = $(this);
        $("#" + $this.data("targetId")).toggleClass($this.data("toggleClassname"));
        $("#" + $this.data("sourceId")).hide();
    });

    // Tabs
    $(".js-tabs_button").on("click", function () {
        var $list = $(this).next();
        $list.toggleClass($list.data("classactive"));
    });

    // Logout link
    $('.js-logout-link').on('click', function(){
        $('#' + $(this).data("form-id")).submit();
        return false;
    });

    $('.js-thread-action').on('click', function () {
        $('#' + $(this).data('form-id')).submit();
        return false;
    });

    $('.js-photo-input').on('change', function () {
        $('.js-photo-input-name').text($(this)[0].files[0].name);
        $('.js-photo-help-text').show();
    });

    $('.js-sort-select').on('change', function () {
        var qs = $(this).data("qs");
        if (qs) {
            qs += '&sort=' + $(this).val();
        } else {
            qs = '?sort=' + $(this).val();
        }
        window.location.search = qs;
    });
});



// WEBPACK FOOTER //
// ./shafa/js/global/main.js