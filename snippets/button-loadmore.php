<?php if ($loaded < $max): ?>
<div class="state-loadmore ">
	<button  id="js-more-posts" class="px-6 bg-secondary text-lg text-main border-main border font-light rounded-full flex gap-2.5 items-center">
		<span class="animate-spin hidden"></span>
	  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0_706_524)">
				<path d="M9.99935 1.6665V4.99984M9.99935 14.9998V18.3332M4.10768 4.10817L6.46602 6.4665M13.5327 13.5332L15.891 15.8915M1.66602 9.99984H4.99935M14.9993 9.99984H18.3327M4.10768 15.8915L6.46602 13.5332M13.5327 6.4665L15.891 4.10817" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</g>
		</svg>
		<span>Load More</span>
	</button>
</div>
<?php endif ?>