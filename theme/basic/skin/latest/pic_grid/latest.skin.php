<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 80;
$thumb_height = 80;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<h2 class="b_title"><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2>

<div class="pic-grid flexbox">
<?php
$i=0;
        $img_link_html = '';

        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
        
        if( $i === 0 ) {
            // 큰 썸네일
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 388, 194, false,true,'center', false,'80/0.5/3');

            if(isset($thumb['src']) && $thumb['src']) {
                $img = $thumb['src'];
            } else {
                $img = G5_IMG_URL.'/no_img.png';
                $thumb['alt'] = '이미지가 없습니다.';
            }
            echo '<div class="item-half zoom big">';

            $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
            $img_link_html = '<a href="'.$wr_href.'">'.run_replace('thumb_image_tag', $img_content, $thumb);

            //썸네일 출력
            echo $img_link_html;

            // 제품 설명 출력
            ?>
            <div class="text">
                <div class="cate"><?=$list[$i]['ca_name']?></div>
                <div class="subject"><?=$list[$i]['subject']?></div>
                <div class="subject2"><?=$list[$i]['wr_1']?></div>
                <div class="date"><?=date("Y년 m월 d일",strtotime($list[$i]['datetime']))?></div>
            </div>

            <!-- 아래의 a 태그는 37번째 줄의 a의 짝입니다. -->
            </a>
        <!-- 아래의 div 태그는 31번째 줄의 div의 짝입니다. -->
        </div>
        <?php } ?>


<div class="flexbox item-half">
    <?php for ($i=1; $i<$list_count; $i++) {

        $img_link_html = '';

        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);

        // 작은 썸네일
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false,true,'center', false,'80/0.5/3');
            
        if(isset($thumb['src']) && $thumb['src']) {
            $img = $thumb['src'];
        } else {
            $img = G5_IMG_URL.'/no_img.png';
            $thumb['alt'] = '이미지가 없습니다.';
        }
        echo '<div class="zoom item-half small">';
        $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >'; 
        // $img_link_html = '<a href="'.$wr_href.'" class="lt_img" >'.run_replace('thumb_image_tag', $img_content, $thumb);
        $img_link_html = '<a href="'.$wr_href.'">';

        //썸네일 링크 출력
        echo $img_link_html;?>
        <!-- 썸네일 이미지 출력 -->
        <div class="smb"><?=$img_content?></div>

        <!-- 제품 설명 출력 -->
        <div class="text2">
            <div class="cate"><?=$list[$i]['ca_name']?></div>
            <div class="subject"><?=$list[$i]['subject']?></div>
            <div class="subject2"><?=$list[$i]['wr_1']?></div>
        </div>

        </a>
        </div>

    <?php } ?>
</div>
<?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
<?php }  ?>
