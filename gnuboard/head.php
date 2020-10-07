<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php'); // 문서의 시작
include_once(G5_LIB_PATH.'/latest.lib.php'); // 최근게시물
include_once(G5_LIB_PATH.'/outlogin.lib.php');  // 로그인
include_once(G5_LIB_PATH.'/poll.lib.php'); //투표
include_once(G5_LIB_PATH.'/visit.lib.php'); // 방문자통계
include_once(G5_LIB_PATH.'/connect.lib.php'); // 현재접속자
include_once(G5_LIB_PATH.'/popular.lib.php');  // 인기게시판
?>

<!-- 상단 시작 { -->
    <header>
		<div class="container clearfix">
			<h1 class="logo">
				<a href="<?php echo G5_URL ?>">Logo</a>
			</h1>
			<nav>
				<ul class="clearfix">
					<li><a href="<?php echo G5_URL ?>">Home</a></li>
					<li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=gallery">Portfolio</a></li>
					<li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=company">about us</a></li>

					<?php if ($is_member) {  ?>
							<li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
							<li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
							<?php if ($is_admin) {  ?>
							<li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
							<?php }  ?>
							<?php } else {  ?>
							<li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
							<li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
							<?php }  ?>
				</ul>
			</nav>
		</div>
	</header>
	
	<div class="page_banner about">
		<h2 class="fancy-box gray main_tt">
		<!-- 두가지 경우-> 문서의 제목, 게시판의 제목 -->
		<?php if($board['bo_subject']){ 
                    echo $board['bo_subject'];
                } else { 
                    echo $g5['title'];
        } ?>
		</h2>
	</div>

<!-- 콘텐츠 시작 { -->	
	<div class="main_content subpage container">


