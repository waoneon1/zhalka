<?php $section = get_field('bot_nav', 'option') ?>
<section id="contact-section" class="py-5 bg-gry font-light">
	<div class="vcontainer">
		<div class="rounded-2.5xl bg-white p-5 mb-2.5">
			<h4 class="text-4.5xl md:text-6.5xl pb-5 pt-2 md:py-5 px-4 mb-5 text-main max-w-xl">Ready to take part with us?</h4>
			<div class="md:pb-5">
				<a href="tel:<?php echo $section['ho_section']['no_tlp']['title'] ?>" class="flex items-center mb-2.5 inline-block" target="_blank">
					<svg class="w-10 h-10 md:w-16 md:h-16" viewBox="0 0 68 69" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g><path d="M19.834 49.0418L48.1673 20.7085M48.1673 20.7085H19.834M48.1673 20.7085V49.0418" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></g>
					</svg>
					<div class="text-2xl md:text-4.5xl px-2.5 text-main"><?php echo $section['ho_section']['no_tlp']['title'] ?></div>
				</a>
				<a href="mailto:<?php echo $section['ho_section']['no_tlp']['email'] ?>" class="flex items-center inline-block" target="_blank">
					<svg class="w-10 h-10 md:w-16 md:h-16" viewBox="0 0 68 69" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g><path d="M19.834 49.0418L48.1673 20.7085M48.1673 20.7085H19.834M48.1673 20.7085V49.0418" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></g>
					</svg>
					<div class="text-2xl md:text-4.5xl px-2.5 text-main">inquiries@zhalka.com</div>
				</a>
			</div>
		</div>
		<div class="md:flex font-light text-base md:text-xl px-2 md:px-8 py-5">
			<div class="md:mr-10 text-center md:text-left">Download our company profile to know more</div>
			<a class="flex justify-center mt-2.5 md:mt-0" href="<?php echo $section['ho_section']['company_profile'] ?>" target="_blank">
				<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M21 15.5V19.5C21 20.0304 20.7893 20.5391 20.4142 20.9142C20.0391 21.2893 19.5304 21.5 19 21.5H5C4.46957 21.5 3.96086 21.2893 3.58579 20.9142C3.21071 20.5391 3 20.0304 3 19.5V15.5M7 10.5L12 15.5M12 15.5L17 10.5M12 15.5V3.5" stroke="#444444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</a>
		</div>
	</div>
</section>
