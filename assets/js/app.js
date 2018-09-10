(function($) {


  $(document).ready(function() {
    // Aos
    AOS.init();
    // Match height
    $('.three-box').matchHeight();
    $('.wrapper-front-news .single-post').matchHeight();
    $('.match-height-1 .person-content').matchHeight();
    $('.wrapper-front-news .single-post').matchHeight();
    $('.wrapper-contact-box .three-box').matchHeight({byRow: false});

    // Slidery
    var swiper = new Swiper('.news-container-post .swiper-container', {
      pagination: '.swiper-pagination',
      slidesPerView: 2,
      paginationClickable: true,
      spaceBetween: 0,
      loop: true,
      autoplay: 3500,
      autoplayDisableOnInteraction: false,
      breakpoints: {
        576: {
          slidesPerView: 1
        }
      }
    });
    var swiper2 = new Swiper('.slider-reference .swiper-container', {
      pagination: '.swiper-pagination',
      slidesPerView: 4,
      paginationClickable: true,
      spaceBetween: 0,
      loop: true,
      autoplay: 3500,
      autoplayDisableOnInteraction: false,
      spaceBetween: 40,
      breakpoints: {
        1024: {
          slidesPerView: 4
        },
        992: {
          slidesPerView: 3
        },
        768: {
          slidesPerView: 2
        },
        576: {
          slidesPerView: 1
        }
      }
    });

    // Windows scroll
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 155) {
        $(".scroll-menu").addClass("scroll-menu-fixed");
        $(".wrapper-job .search-content").addClass("search-fixed");
        $(".wrapper-job .container-search-job ").addClass("padding-fixed");

      } else {
        $(".scroll-menu").removeClass("scroll-menu-fixed");
        $(".wrapper-job .search-content").removeClass("search-fixed");
        $(".wrapper-job .container-search-job ").removeClass("padding-fixed");

      }
    });
    $('#toggle-app').click(function() {
      event.preventDefault();
      $(this).parent().parent().parent().parent().parent().find('.social-container').fadeToggle();
      // $(this).text(function(i, text) {
      //   return text === "Aplikuj" ? "Powrót" : "Aplikuj";
      // })
      $('#toggle-app').fadeToggle();
      $('.toggle-job').fadeToggle();
      $('.application-form').fadeToggle();

    });

    $('.toggle').click(function(e) {
      e.preventDefault(); // The flicker is a codepen thing
      $(this).toggleClass('toggle-on');
    });

    $('.czat-online .czat').click(function(event) {
      event.preventDefault();
      $('#tidio-chat').fadeToggle();
    });
    $('.contact-input .face').click(function(event) {
      event.preventDefault();
      $('#tidio-chat').fadeToggle();
    });
    $('.nav').navgoco({
      caretHtml: '',
      accordion: true,
      openClass: 'open',
      slide: {
        duration: 400,
        easing: 'swing'
      }
    });
    $('.drawer').drawer({
      class: {
        nav: 'drawer-nav',
          toggle: 'drawer-toggle',
          overlay: 'drawer-overlay',
          open: 'drawer-open',
          close: 'drawer-close',
          dropdown: 'drawer-dropdown'
      },
      iscroll: {
        // Configuring the iScroll
        // https://github.com/cubiq/iscroll#configuring-the-iscroll
        mouseWheel: true,
        preventDefault: false
      },
      showOverlay: true
    });
    $('.up-menu .search-click').click(function() {
      $('.up-menu #searchform input').slideToggle();
    });
    //  Front-page - filter AJAX
    var ajaxurl = ajax.template_url;
    $('#tag-sort li > a').on('click', function(e) {
      e.preventDefault();
      $(this).parent().parent().find('.active').toggleClass('active');
      $(this).parent().toggleClass('active');
      var that = $(this);
      var currentCategory = that.attr('id');
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'front_page_tags',
          tag: currentCategory
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          $("#ajax-content-post").html(response);
        }
      });

    })

    // categorie
    $('#list-category li > a').on('click', function(e) {
      e.preventDefault();
      $(this).parent().parent().find('.active').toggleClass('active');
      $(this).parent().toggleClass('active');
      var that = $(this);
      var categorylist = that.attr('id');
      var tagDate = $("#ajax-job-post").data('tag');
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'life_job_loop',
          catDate: categorylist,
          tag: tagDate
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          if (response == 0) {
            $("#ajax-posts-container").html('Przepraszamy, nie znaleźliśmy niczego pod danymi filtrami');
          } else {
            $("#ajax-posts-container").html(response);
            $("#ajax-job-post").data('category', categorylist);
            $('#ajax-job-post').data('page', 0);
          }

        }
      });

    })

    // tagi
    $('#tag-sort li > a').on('click', function(e) {
      e.preventDefault();
      $(this).parent().parent().find('.active').toggleClass('active');
      $(this).parent().toggleClass('active');
      var that = $(this);
      var tag = that.attr('id');
      var catDate = $("#ajax-job-post").data('category');
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'life_job_loop',
          catDate: catDate,
          tag: tag
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          if (response == 0) {
            $("#ajax-posts-container").html('Przepraszamy, nie znaleźliśmy niczego pod danymi filtrami');
          } else {
            $("#ajax-posts-container").html(response);
            $("#ajax-job-post").data('tag', tag);
            $('#ajax-job-post').data('page', 0);
          }

        }
      });
    })

    // Popularne / najnowszse - życie i praca w Polsce
    $('#popular-list li > a').on('click', function(e) {
      e.preventDefault();
      $(this).parent().parent().find('.active').toggleClass('active');
      $(this).parent().toggleClass('active');
      var that = $(this);
      var orderBy = that.attr('date-order-by');
      var orderDate = that.attr('date-order-date');
      $("#ajax-job-post").data('date-order-date', orderDate);
      $("#ajax-job-post").data('date-order-by', orderBy);
      var tagDate = $("#ajax-job-post").data('tag');
      var catDate = $("#ajax-job-post").data('category');
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'life_job_loop',
          orderBy: orderBy,
          orderDate: orderDate,
          catDate: catDate,
          tagDate: tagDate
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          if (response == 0) {
            $("#ajax-posts-container").html('Przepraszamy, nie znaleźliśmy niczego pod danymi filtrami');
          } else {
            $("#ajax-posts-container").html(response);
            $("#ajax-job-post").attr('date-order-date', orderDate);
            $("#ajax-job-post").attr('date-order-by', orderBy);
          }

        }
      });
    })

    // Przycisk czytaj więcej zatrudnienie cudzoziemców
    $('#load-more').on('click', function(e) {
      e.preventDefault();
      var postNumber = $("#ajax-post-job").data('post');
      var job_cat = $("#ajax-post-job").data('tag');
      postNumber += 6;
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'job_filter',
          load_more: postNumber,
          tag_job: job_cat
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          console.log(response);
          $("#ajax-post-job").data('post', postNumber);
          $("#ajax-post-job").append(response);
        }
      });
    })

    // Przycisk czytaj więcej Życie i praca w polsce
    $('#load-more-page').on('click', function(e) {
      e.preventDefault();
      var con = $('#ajax-job-post');
      var conPage = con.data('page')
      var conTag = con.data('tag');
      var conCat = con.data('category');
      var conOrderBy = con.attr('date-order-by');
      var conOrderDate = con.attr('date-order-date');
      var args = {
        page: conPage,
        tag: conTag,
        cat: conCat,
        orby: conOrderBy,
        ordate: conOrderDate
      };

      var nextPage = args.page += 6;

      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'life_job_loop',
          offset: nextPage,
          tag: args.tag,
          catDate: args.cat,
          orderBy: args.orby,
          orderDate: args.ordate
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          $('#ajax-posts-container').append(response);
          con.data('page', nextPage);
        }
      });
    })

    // Tagi zatrudnienie cudzoziemca
    $('#tag-job li > a').on('click', function(e) {
      e.preventDefault();
      var that = $(this);
      $(this).parent().parent().find('.active').toggleClass('active');
      $(this).parent().toggleClass('active');
      var that = $(this);
      var job_cat = that.attr('id');
      $("#ajax-post-job").data('tag', job_cat);
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'job_filter',
          tag_job: job_cat,
          load_more: 0
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          $("#ajax-post-job").data('tag', job_cat);
          $("#ajax-post-job").data('post', 0);
          $("#ajax-post-job").html(response);

        }
      });
    })

    // Aktualności tagi
    $('#tag-news li > a').on('click', function(e) {
      e.preventDefault();
      $(this).parent().parent().find('.active').toggleClass('active');
      $(this).parent().toggleClass('active');
      var that = $(this);
      var tag_news = that.attr('id');

      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'news_filter',
          tag_single: tag_news,
          offset: 0
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          $("#news-container").data('tag', tag_news);
          $("#news-container").data('offset', 0);
          $("#news-container").html(response);

        }
      });

    })
    // Aktualności czytaj więcej
    $('#load-more-page').on('click', function(e) {
      e.preventDefault();
      var numberPage = $("#news-container").data('offset');
      numberPage += 6;
      var tag_news = $("#news-container").data('tag');
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'news_filter',
          offset: numberPage,
          tag_single: tag_news
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          $("#news-container").data('offset', numberPage);
          $("#news-container").data('tag', tag_news);
          $("#news-container").append(response);
        }
      });

    })

    // Artykuły tagi
    $('#tag-post-article li > a').on('click', function(e) {
      e.preventDefault();
      $(this).parent().parent().find('.active').toggleClass('active');
      $(this).parent().toggleClass('active');
      var that = $(this);
      var tag_article = that.attr('id');
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'article',
          article_news: tag_article,
          offset_article: 0
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          $("#ajax-post-article").data('tag', tag_article);
          $("#ajax-post-article").data('post', 0);
          $("#ajax-post-article").html(response);
        }
      });

    })
    // Artykuły czytaj więcej
    $('#load-more-article').on('click', function(e) {
      e.preventDefault();
      var offset_art = $("#ajax-post-article").data('post');
      offset_art += 6;
      var tag_article = $("#ajax-post-article").data('tag');
      console.log(offset_art);
      $.ajax({
        type: 'post',
        url: ajax.url,
        data: {
          action: 'article',
          offset_article: offset_art,
          article_news: tag_article
        },
        error: function() {
          console.log('error');
        },
        success: function(response) {
          $("#ajax-post-article").data('post', offset_art);
          $("#ajax-post-article").data('tag', tag_article);
          $("#ajax-post-article").append(response);
        }
      });

    })



    var stats_counter = function() {
      if($('.counter').length > 0) {
        function increment($this, speed){
          var current = parseInt($this.html(), 10);
          $this.html(++current);
          if(current !== $this.data('to')){
            setTimeout(function(){increment($this, speed)}, speed);
          }
        }
        $('.counter').each(function(index) {
          increment($(this), parseInt($(this).data('speed')));
        });
      }
    }

  });
})(jQuery);
