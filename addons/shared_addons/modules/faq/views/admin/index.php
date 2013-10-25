<style type="text/css">
.box .collapsed {
    border: medium none;
    display: none;
}
section.item.collapsed ~ section.title.files-title {
    border-radius: 5px 5px 5px 5px;
}
section.title li {
    display: inline;
}
section.title {
    cursor: pointer;
}
section.title li .button {
    display: inline-block;
    float: right;
    font-size: 13px;
    line-height: initial;
    margin: 0 10px 0 0;
    padding: 2px 6px;
}
section.title li:first-child {
    margin-right: 16px;
}
</style>


<script type="text/javascript">
$(function(){
	$('section.item:first-child').slideDown(200).removeClass('collapsed');
	
	// show and hide the sections
	$('.box .title').click(function(){
		window.scrollTo(0, 0);
		if ($(this).next('section.item').hasClass('collapsed')) {
			$('.box .item').slideUp(200).addClass('collapsed');
			$.cookie('nav_groups', $(this).parents('.box').attr('rel'), { expires: 1, path: window.location.pathname });
			$(this).next('section.collapsed').slideDown(200).removeClass('collapsed');
		}
	});
})
</script>



<?php if ($faqs != NULL): ?>
	<?php foreach ($faqs as $key=>$value){ ?>
		<div class="group-<?php echo $key; ?> box" rel="<?php echo $key; ?>">
			<div class="one_full">
				<section class="title">					
					<ul>
						<li>
							<h4><?php echo ucwords($key); ?></h4>
						</li>
						<li>
							<?php echo anchor('admin/faq/create/'.$key, 'Add', 'rel="'.$key.'" class="add ajax button"'); ?>
						</li>
					</ul>
				</section>
				
				<section class="item collapsed">
					<div class="content">
						<?php if($value!=NULL){ ?>
							<table>
								<thead>
									<tr>
										<th class="align-center">Title</th>
										<th class="align-center">Question</th>
										<th class="align-center">Answer</th>
										<th class="align-center">Action</th>
									</tr>
									<tbody>
										<?php foreach( $value as $faq ){ ?>
											<tr>
												<td class="align-center"><a href="admin/faq/edit/<?php echo $faq->id; ?>"><?php echo $faq->title; ?></a></td>
												<td class="align-center"><?php echo $faq->question; ?></td>
												<td class="align-center"><?php echo $faq->answer; ?></td>
												<td class="align-center"><a href="admin/faq/edit/<?php echo $faq->id; ?>">Edit</a> | <a href="admin/faq/delete/<?php echo $faq->id; ?>">Delete</a></td>
											</tr>
										<?php }; ?>
									</tbody>
								</thead>
							</table>
						<?php }else{ ?>
							<div class="no_data">No FAQ</div>
						<?php } ?>
					</div>
				</section>
			</div>
		</div>
	<?php } ?>
<?php else: ?>
	<div class="one_full">
		<section class="title">
			<h4><?php echo 'Frequently Asked Question' ?></h4>
		</section>
		
		<section class="item">
			<div class="content">
				<div class="no_data">No Records Found</div>
			</div>
		</section>
	</div>
<?php endif; ?>