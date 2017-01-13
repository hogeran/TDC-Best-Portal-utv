<?php /* Template Name: case-frontpage template */ ?>
<?php get_header(); ?>
	<div class="flex-boxes">
		<div class="flex-box flex-box-big">
			<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">


			<?php 
			$args = array( 
				'post_type' => 'case',
				'meta_key'		=> 'case_status',
				'meta_value'	=> 'Ny' );
			$query = new WP_Query( $args );
			if($query->have_posts()):
			?>
				<fieldset>
				<p>( Delorder saknas )</p>
				<h3>Komplettering från beställare behövs!!</h3>
				<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
					<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></h1>
				<?php endwhile; ?>
				<?php endif; ?>
				</fieldset>
			<?php endif; ?>



			<fieldset>
			<?php 
			$args = array( 
				'post_type' => 'case',
				'meta_key'		=> 'case_status',
				'meta_value'	=> 'DCO har mottagit beställning' );
			$query = new WP_Query( $args );
			?>
			<h3>Nya Beställningar</h3>
			<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
				<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a>: <?php the_field('casetyp'); ?> </h1>
			<?php endwhile; ?>
			<?php endif; ?>
			</fieldset>



			<fieldset>
			<?php 
			$args = array( 
				'post_type' => 'case');
			$query = new WP_Query( $args );
			?>
			<h3>Aktiva Beställningar</h3>
			<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
				<?php if (get_field('case_status') != 'Klar' AND get_field('case_status') != 'DCO har mottagit beställning' AND get_field('case_status') != 'Ny'){?>
					<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></h1>
				<?php }	?>
			<?php endwhile; ?>
			<?php endif; ?>
			</fieldset>



			<fieldset>
			<?php 
			$args = array( 
				'post_type' => 'case',
				'meta_key'		=> 'case_status',
				'meta_value'	=> 'Klar' );
			$query = new WP_Query( $args );
			?>
			<h3>Slutförda Beställningar</h3>
			<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
				<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></h1>
			<?php endwhile; ?>
			<?php endif; ?>
			</fieldset>

		</div>
		<div class="flex-box">
			<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Meny</h3>
			<button id="skapaNyBest">Ny Beställning</button>

		</div>
	</div>
<?php get_footer(); ?>