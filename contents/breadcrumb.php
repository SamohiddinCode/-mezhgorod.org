	<div class="navigator-helper" style="background: #f6f7f8;">
		<div class="container">
		
				<!-- .breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="/">Главная</a></li>

					<?php if (!empty($array_path) and $h1_title!=$title_404) {
						$link_page='';
						foreach($array_path as $index=>$element) {
							$linkadd = false;
							if(!empty($element)){
								if ($arr_ccc>=$index+2) {
									$linkadd = true;
								};
								if ($index==0) {
									echo (!$linkadd ? '<li class="active">'.(!empty($localaa) ? $localaa[4] : '404').'</li>' : '<li class="active">'.'<a href="/'.$link_page.$element.'/">'.(!empty($localaa) ? $localaa[4] : '404').'</a></li>');
								} elseif ($index==1) {
									echo (!$linkadd ? '<li class="active">'.(!empty($localbb) ? $localbb[2] : '404').'</li>' : '<li class="active">'.'<a href="/'.$link_page.$element.'/">'.(!empty($localbb) ? $localbb[3] : '404').'</a></li>');
								};
								$link_page .= $element.'/';
							};
						}
					};
					if ($h1_title==$title_404) {
						echo '<li class="active">404</li>';
					} ?>

				</ol>
				<!-- /.breadcrumb -->


		</div>
	</div>