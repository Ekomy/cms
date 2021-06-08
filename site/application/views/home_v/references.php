<section class="section clearfix">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-4">Why Choose <strong>Us</strong></h2>
                <div class="separator"></div>
                <p>The constitution of being balanced is to be a disciplined, ethical individual, respectful to all living things on earth and sensitive to the environment. By supporting our students' analytical and critical thinking, advanced reasoning and meta-cognition skills, they gain a good foundation in all fields and prepare them for domestic and international universities and life. Our goal is; Unlike colleges that only prepare students for exams, it is to raise generations who are successful in both their academic and private lives, who can take on their own responsibilities, who are self-confident and who are conscientious.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="clients-container">
                    <div class="clients">
                        <?php foreach($references as $reference) { ?>
                            <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
                               <a href="#">
                                   <img src="<?php echo get_picture("references_v", $reference->img_url, "80x80"); ?>"
                                   alt="<?php echo $reference->title; ?>">
                               </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="separator"></div>
            </div>
        </div>
    </div>
</section>