/** ==============================================================================================================================
 * AJAX
 * ===============================================================================================================================
 */

jQuery(document).ready(function ($) {
    // AJAX LOADMORE
    // console.log('loading more sss', $('.js-blogs-data').attr('data-more'));
  
    var ppp = $('.js-blogs-data').attr('data-ppp') ? $('.js-blogs-data').attr('data-ppp') : 12; // Post per page
    var loadmore = $('.js-blogs-data').attr('data-more') ? $('.js-blogs-data').attr('data-more') : ppp; // Post per page
    var skel = $('.js-blogs-data').attr('data-skel'); 

    var tax = $('.js-blogs-data').attr('data-tax') ? $('.js-blogs-data').attr('data-tax') : 'cat';
    var taxid = $('.js-blogs-data').attr('data-taxid') ? $('.js-blogs-data').attr('data-taxid') : null;
    
    var max = $('.js-blogs-data').attr('data-max') ? $('.js-blogs-data').attr('data-max') : 0;
    var loaded = $('.js-blogs-data').attr('data-loaded') ? $('.js-blogs-data').attr('data-loaded') : null;

    $("#js-more-posts").on("click",function(e){ // When btn is pressed.
        e.preventDefault();
        load_posts();
    });

    var pageNumber = 1;
    function load_posts(){
        pageNumber++;
        var str = '&pageNumber=' + pageNumber 
        + '&ppp=' + ppp  
        + '&loadmore=' + loadmore 
        + '&tax=' + tax 
        + '&taxid=' + taxid 
        + '&action=loadarticle_ajax';

        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            beforeSend: function ( xhr ) {
              $("#js-more-posts svg").addClass('animate-spin');
              var skelDiv = ''
              
              for (let i = 0; i < loadmore; i++) {
                skelDiv += `<img class="skel animate-pulse" src="${skel}" alt=""></img>`;
              }
              // console.log(skelDiv, loadmore)
              $("#js-ajax-load").append(skelDiv);
            },
            success: function(data){
              var $data = $(data);
              calculate_posts($data.length);

              $("#js-more-posts svg").removeClass('animate-spin');
              $('.skel').remove()
              
              let loadedCurrent = $('.js-blogs-data').attr('data-loaded');
              //console.log(parseInt(loadedCurrent) < parseInt(max), 'iki' , parseInt(loadedCurrent), parseInt(max));
              if(parseInt(loadedCurrent) < parseInt(max)){
                $("#js-ajax-load").append($data);
              } else{
                //console.log('masuk hide');
                $("#js-ajax-load").append($data);
                // $(".state-loadmore-disabled").show();
                $(".state-loadmore").hide();
              }              
            },
            error : function(jqXHR, textStatus, errorThrown) {
              console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
  
        });
        return false;
    }

    function calculate_posts(dataLength) {
      const current = $('.js-blogs-data').attr('data-loaded');
      let sum = parseInt(current) + parseInt(dataLength);
      $('.js-blogs-data').attr('data-loaded', sum) ;
      $('.state-show-data').text(sum) ;
    }
  })
  