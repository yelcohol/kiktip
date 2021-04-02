<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.bxslider.js"></script>', 10);
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="main_latest">
        <div class="main_latest_div">

            <div class="li01">
                <div class="li01_1">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <a href="<?=get_pretty_url($bo_table); ?>">공지사항</a>
                </div>

                <div class="li01_txt">
                    <div class="block">
                        <ul id="ticker">
                        <?php for ($i=0; $i<$list_count; $i++) {  ?>
                            <li><a href="<?=get_pretty_url($bo_table, $list[$i]['wr_id'])?>" title="<?=$list[$i]['subject'] ?>"><?=$list[$i]['subject'] ?></a></li>
                            <?php }  ?>
                        </ul>
                    </div>
                </div>
                <div class="li01_2 navi">
                    <i class="fa fa-chevron-left prev" aria-hidden="true" style="cursor:pointer"></i>
                    <i class="fa fa-chevron-right next" aria-hidden="true" style="cursor:pointer"></i>    
                </div>
            </div>
        </div>
    </div>

<script>
jQuery(function($)
{
    var ticker = function()
    {
        timer = setTimeout(function(){
            $('#ticker li:first').animate( {marginTop: '-20px'}, 1000, function()
            {
                $(this).detach().appendTo('ul#ticker').removeAttr('style');
            });
            ticker();
        }, 7000);
      };

      $(document).on('click','.prev',function(){
        $('#ticker li:last').hide().prependTo($('#ticker')).slideDown();
        clearTimeout(timer);
        ticker();
        if($('.pause').text() == 'Unpause'){
          tickerUnpause();
        };
      });


      $(document).on('click','.next',function(){
            $('#ticker li:first').animate( {marginTop: '-20px'}, 1000, function()
                    {
                        $(this).detach().appendTo('ul#ticker').removeAttr('style');
                    });
            clearTimeout(timer);
            ticker();
            
            if($('.pause').text() == 'Unpause'){
              tickerUnpause();
            };
          });


	var tickerUnpause = function()
	{
		$('.pause').text('Pause');
	};


    var tickerpause = function()
  {
    $('.pause').click(function(){
      $this = $(this);
      if($this.text() == 'Pause'){
        $this.text('Unpause');
        clearTimeout(timer);
      }
      else {
        tickerUnpause();
      }
    });
  };
  tickerpause();
	var tickerover = function(event)
	{
		$('#ticker').mouseover(function(){
			clearTimeout(timer);
		});
		$('#ticker').mouseout(function(){
			ticker();
		});
	};
	tickerover();
	ticker();
});
</script>