<?php 

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-wrapper">

<section id="produkter">
<div class="banner" style="background-image:url(' <?php the_post_thumbnail_url( 'full' ); ?> ')">

<div class="overlay-title-banner">

<h1><?php the_title();?></h1>
</div>
	
</div>

<div class="container">

<div class="row">

<div class="col-md-9">
<div class="box-wrap">
<h3 class="title-border"><?php the_title(); ?></h3>
	<?php the_content(); ?>
	</div>
</div>

<div class="col-md-3">
	<div class="box-wrap">
	<h3 class="title-border">Kontakta en säljare idag</h3>


<?php $args = array(
	'post_type' => 'worker', 
	'posts_per_page' => 3 ,
	'tax_query' => array( 
		array(
			'taxonomy' => 'uppdrag',
			'field' => 'slug',
			'terms' => 'saljare'
			),
		),

	); ?>


<?php $the_query = new WP_Query( $args ); 

if ( $the_query->have_posts() ) { ?>

<div class="worker-wrap">

<?php while ( $the_query->have_posts() ) { ?>



	<?php $the_query->the_post(); ?>



	
	<div class="worker">



		<img src="<?php the_post_thumbnail_url();?>">
			<h3><?php the_title();?></h3>
			<?php the_field('info'); ?>


	</div>


	<?php }


	wp_reset_postdata();


	}else{

		//no posts

		} ?>

</div>
		<div class="clearfix"></div>

</div>

</div>

</div>
			
</section>

</div>

	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php 

get_footer();

?>