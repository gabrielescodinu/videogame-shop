<!-- get header -->
<?php get_header(); ?>

<!-- custom fields -->
<?php
  $observatory_date = get_field('observatory_date');
  $tag = get_field('tag');
  $observatory_files = get_field('observatory_files');
  $team_name = get_field('team_name');
  $member = get_field('member');

  $page_title = the_title();
  $observatory_name = get_the_title();
?>

<!-- hero banner -->
<div class="w-full text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-attachment: fixed">
    <div class="flex h-full">
        <div class="lg:w-1/2 w-full flex flex-col justify-center p-8 lg:px-24 4xl:px-96 py-32" style="background-image: linear-gradient(rgba(252, 115, 51, 0.5), rgba(252, 115, 51, 0.5))">
        <p data-aos="fade-right" data-aos-delay="200" class="text-4xl font-bold mt-28"><?php echo the_title(); ?></p>
        </div>
        <div class="w-1/2 hidden lg:block"></div>
    </div>
</div>

<!-- section 1 -->
<div data-aos="fade-up" class="lg:px-24 4xl:pl-96 p-8 py-24">
    <p class="text-lsc-lightgray"><span class="mr-16"><?php echo $observatory_date ?></span><span><?php echo $tag ?></span></p>
    <h2 class="text-lsc-orange font-bold mt-8"><?php echo the_title(); ?></h2>
    <p class="mt-8"><?php echo the_content(); ?></p>
</div>

<!-- team -->
<div data-aos="fade-up" class="p-8 lg:px-24 4xl:px-96 bg-lsc-gray">
  <h1 class="text-2xl font-bold text-lsc-orange"><?php echo $team_name ?></h1>
  <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 lg:gap-16 mt-8">
    <?php if( esc_html('member') ): ?>    
      <?php while( the_repeater_field('member') ): ?> 
          <div class="mb-8">
            <div class="h-40 w-40 shadow rounded-3xl" style="background-image: url('<?php echo the_sub_field('member_image'); ?>'); background-size: cover;"></div>
            <h2 class="text-lg mt-4 font-bold"><?php echo the_sub_field('member_name'); ?></h2>
            <p><?php echo the_sub_field('member_role'); ?></p>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>

<!-- section 2 -->
<div data-aos="fade-up" class="p-8 lg:px-24 4xl:px-96 bg-white py-24 lg:flex justify-between">
  <!-- part 1 -->
  <div class="lg:mr-24 lg:w-1/2">
    <p class="font-bold text-lsc-orange mb-8 text-3xl">News</p>
      <?php
          $args = array(
            'post_type' => 'news',
            'posts_per_page' => '-1',
            'order' => 'DESC',
            'orderby'=>'publish_date',
            'post_status'    => 'publish',
            'meta_query' => array(
              array(
                'key' => 'observatory_name',
                'value' => $observatory_name,
                'compare' => '='
              )
            ),
          );
          $loop = new WP_Query($args);
          if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();?>
              <div class="">
                  <h2 class="text-lg mt-4 font-bold"><?php echo get_the_title(); ?></h2>
                  <p><?php $content = substr(get_the_content(), 0, 100); echo $content ?></p>
                  <p class="my-4 font-bold"><a class="text-lsc-orange hover:text-lsc-lightgray" href="<?php echo get_permalink() ?>">READ MORE <i class="fa-solid fa-arrow-right"></i></a></p>
                  <hr>
              </div>
          <?php endwhile; else: ?>
      <?php endif; wp_reset_query(); ?>
  </div>
  <!-- part 2 -->
  <div class="lg:w-1/2">
    <p class="font-bold text-lsc-orange mb-8 text-3xl">Documenti</p>
      <?php if( get_field('observatory_files') ): ?>    
        <?php while( the_repeater_field('observatory_files') ): ?> 
            <div class="flex items-center mb-8 pb-8" style="border-bottom: 0.1px solid gray;">
                <a href="<?php echo the_sub_field('file_link'); ?>" target="_blank"><i class="fa-solid fa-download text-4xl mr-8 text-lsc-orange hover:text-lsc-lightgray"></i> </a>
                <p class="font-bold"><?php echo the_sub_field('file_name'); ?></p>
            </div>  
        <?php endwhile; ?>
      <?php endif; ?>
  </div>
</div>

<!-- get footer -->
<?php get_footer(); ?>