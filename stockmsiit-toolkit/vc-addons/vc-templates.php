<?php 
if ( !defined('ABSPATH') ) die( '-1' );

add_action( 'vc_load_default_templates_action','stockmsiit_vc_homepage' ); // Hook in
 
function stockmsiit_vc_homepage() {
    $data               = array(); // Create new array
    $data['name']       = esc_html__( 'Stockmsiit - Homepage', 'stockmsiit-toolkit' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['content']    = <<<CONTENT

[vc_row full_width="stretch_row_content_no_spaces"][vc_column][stockmsiit_slides][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1522428417707{padding-bottom: 40px !important;background-color: #f5f8f9 !important;}"][vc_column][logo_carousel dots="false" nav="false" logos="156,157,158,159,160,161,162,163"][/vc_column][/vc_row][vc_row css=".vc_custom_1525104188425{border-bottom-width: 20px !important;padding-top: 50px !important;}"][vc_column][vc_column_text el_class="text-center service-title"]
<h1>Services we offer.</h1>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/3"][stockmsiit_service_box link_to_page="247" icon_type="2" title="Statup Business Strategy." desc="Received the likewise law graceful his. Nor might set along charm..." link_text="See more" chosse_icon="fa fa-book" box_img="169"][/vc_column][vc_column width="1/3"][stockmsiit_service_box link_to_page="247" icon_type="2" title="Finance Consultation." desc="Received the likewise law graceful his. Nor might set along charm..." link_text="See more" chosse_icon="fa fa-diamond" box_img="169"][/vc_column][vc_column width="1/3"][stockmsiit_service_box link_to_page="247" icon_type="2" title="Insurance Policy." desc="Received the likewise law graceful his. Nor might set along charm..." link_text="See more" chosse_icon="fa fa-university" box_img="169"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][stockmsiit_service_box link_to_page="247" icon_type="2" title="Stock Market Sharing." desc="Received the likewise law graceful his. Nor might set along charm..." link_text="See more" chosse_icon="fa fa-object-ungroup" box_img="169"][/vc_column][vc_column width="1/3"][stockmsiit_service_box link_to_page="247" icon_type="2" title="Cloud Service for Business." desc="Received the likewise law graceful his. Nor might set along charm..." link_text="See more" chosse_icon="fa fa-mixcloud" box_img="169"][/vc_column][vc_column width="1/3"][stockmsiit_service_box link_to_page="247" icon_type="2" title="Business Development." desc="Received the likewise law graceful his. Nor might set along charm..." link_text="See more" chosse_icon="fa fa-user-o" box_img="169"][/vc_column][/vc_row][vc_row css=".vc_custom_1525105580136{padding-top: 50px !important;padding-bottom: 70px !important;}"][vc_column width="1/2" offset="vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-3" el_class="text-center"][stockmsiit_cta link_to_page="18" title="Get a service from us." desc="We offer free consultation before any project" link_text="Start a project"][/vc_column][/vc_row][vc_row full_width="stretch_row" el_class="overlay" css=".vc_custom_1525106839729{padding-top: 45px !important;padding-bottom: 95px !important;background-image: url(http://codermsiit.com/stock-msiit/wp-content/uploads/2018/04/stat-bg.jpg?id=181) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/2"][vc_column_text el_class="static-area"]
<h1>Behind the story.</h1>
Travelling alteration impression six all uncommonly. Chamber hearing inhabit joy highest private ask him our believe. Up nature valley do...[/vc_column_text][stockmsiit_btn link_to_page="213"][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image image="182" img_size="large" alignment="right" el_class="static-img"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/6"][stockmsiit_state number="85" after_text="%" desc="Active clients"][/vc_column_inner][vc_column_inner width="1/6"][stockmsiit_state number="825" after_text="+" desc="Successful projects"][/vc_column_inner][vc_column_inner width="1/6"][stockmsiit_state number="9852" after_text="%" desc="Free consultation"][/vc_column_inner][vc_column_inner width="1/6"][stockmsiit_state number="55" desc="Expert advisors"][/vc_column_inner][vc_column_inner width="1/6"][stockmsiit_state number="99" after_text="%" desc="Success rate"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1524748848971{padding-top: 45px !important;padding-bottom: 70px !important;}"][vc_column width="1/2"][vc_column_text]
<h1>Frequently Asked Question.</h1>
[/vc_column_text][vc_tta_accordion active_section="1" css=".vc_custom_1522686552768{margin-top: 40px !important;}"][vc_tta_section title="How can I start a project with you?" tab_id="1522685996689-d93e2402-eb56"][vc_column_text]John draw real poor on call my from. May she mrs furnished discourse extremely. Ask doubt noisy shade guest did built her him. Ignorant repeated hastened it do. Consider bachelor he yourself expenses no. Her itself active giving for expect vulgar months.[/vc_column_text][/vc_tta_section][vc_tta_section title="Do you support any refund policy?" tab_id="1522686129314-a855b9a2-8fe3"][vc_column_text]John draw real poor on call my from. May she mrs furnished discourse extremely. Ask doubt noisy shade guest did built her him. Ignorant repeated hastened it do. Consider bachelor he yourself expenses no. Her itself active giving for expect vulgar months.[/vc_column_text][/vc_tta_section][vc_tta_section title="How do you take payments?" tab_id="1522686175175-a99e602f-3f22"][vc_column_text]John draw real poor on call my from. May she mrs furnished discourse extremely. Ask doubt noisy shade guest did built her him. Ignorant repeated hastened it do. Consider bachelor he yourself expenses no. Her itself active giving for expect vulgar months.[/vc_column_text][/vc_tta_section][/vc_tta_accordion][/vc_column][vc_column width="1/2"][vc_column_text]
<h1>Benefits of us.</h1>
[/vc_column_text][vc_column_text css=".vc_custom_1522686563141{margin-top: 40px !important;}"]An country demesne message it. Bachelor domestic extended doubtful as concerns at. Morning prudent removal an letters by. On could my in order never it.[/vc_column_text][vc_row_inner][vc_column_inner width="1/2"][vc_column_text el_class="list-box"]
<ul>
 	<li>An country demesne</li>
 	<li>Message it. Bachelor</li>
 	<li>Domestic extended doubtful</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text el_class="list-box"]
<ul>
 	<li>Concerns at. Morning</li>
 	<li>Prudent removal an letters</li>
 	<li>Could my in order never it.</li>
</ul>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1523376008825{padding-top: 50px !important;padding-bottom: 50px !important;background-color: #f5f8f9 !important;}"][vc_column][vc_row_inner el_class="testimonial"][vc_column_inner][vc_column_text el_class="text-center" css=".vc_custom_1522774508521{margin-bottom: 55px !important;}"]
<h1>What customers say.</h1>
[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][testimonials photo="189" title="Robin Jonson" position="CEO, MyFinance" desc="“Unpacked reserved sir offering bed judgment may and quitting speaking. Is do be improved raptures offering required in replying raillery. Stairs ladies friend by in mutual an no. hence chief cause...”"][/vc_column_inner][vc_column_inner width="1/3"][testimonials photo="190" title="Jennifer Jones" position="Founder, World for Women" desc="“Unpacked reserved sir offering bed judgment may and quitting speaking. Is do be improved raptures offering required in replying raillery. Stairs ladies friend by in mutual an no. hence chief cause...”"][/vc_column_inner][vc_column_inner width="1/3"][testimonials photo="188" title="David Martin" position="David Martin" desc="“Unpacked reserved sir offering bed judgment may and quitting speaking. Is do be improved raptures offering required in replying raillery. Stairs ladies friend by in mutual an no. hence chief cause...”"][/vc_column_inner][/vc_row_inner][vc_column_text el_class="text-center" css=".vc_custom_1525014150645{margin-top: 20px !important;}"]<a href="http://codermsiit.com/stock-msiit/index.php/testimonial/">Check all testimonials</a>[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" el_class="overlay-bg" css=".vc_custom_1523459907553{padding-top: 40px !important;padding-bottom: 40px !important;background-image: url(http://codermsiit.com/stock-msiit/wp-content/uploads/2018/04/overlay-bg.jpg?id=203) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}"][vc_column width="1/2" offset="vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-3"][vc_column_text el_class="overlay-bg-text"]
<h2><em>“ The best preparation for tomorrow is doing your best today. ”</em></h2>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" el_class="contact-bg-left" css=".vc_custom_1525150310637{padding-top: 50px !important;padding-bottom: 85px !important;background-image: url(http://codermsiit.com/stock-msiit/wp-content/uploads/2018/04/contact-bg.jpg?id=198) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}"][vc_column width="1/2" offset="vc_col-lg-offset-6 vc_col-lg-6 vc_col-md-offset-6 vc_col-md-6 vc_col-sm-offset-6"][contact-form-7 id="197"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1523718932662{margin-top: -35px !important;}"][vc_column][gmap height="460"][/vc_column][/vc_row]

CONTENT;
  
    vc_add_default_templates( $data );
}

























