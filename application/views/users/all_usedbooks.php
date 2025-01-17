<br><div id="table-header">Buy Used Books
<!--=== for category name as title ===-->
<?php foreach($category as $ctg): ?>
<?php 
if(isset($_GET['ctg']))
{
	if($_GET['ctg']== $ctg->tag)
	{
		print '<i class="fas fa-angle-double-right" style="color: #ddd"></i> '.$ctg->category;
	}
} 
?>
<?php endforeach; ?>
</div><br>

<div class="row con-flex">
	<?php foreach($usedbooks as $usedbook):?>
	<div class="col-lg-2 col-md-3 col-sm-4">
		<div id="single-book">
			<div id="book-image">
				<?php print '<img src = "'.strip_tags($usedbook->book_image).'" alt = "">';?>
			</div>
			<!--=== Restricted user to buy their own book ===-->
			<?php if($this->session->userdata('id') != $usedbook->userId): ?>

			<?php print '<div id="addto-cart"><a href="'.base_url().'cart/add_to_cart/'.$usedbook->id.'"><i class="fas fa-shopping-cart"></i> Add to cart</a></div>'; ?>
			<?php endif; ?>
			
			<div class="book-text">
				<div id="book-name"><?= substr(htmlentities($usedbook->book_name),0,21) ?></div>
				<div id="author">By <i><?= htmlentities($usedbook->author) ?></i></div>
				<div id="price"><?= htmlentities($usedbook->price) ?>.TK</div>
				<div id="book-details"><?php print '<a href = "'.base_url().'users/book-view/'.$usedbook->id.'">View Details</a>'; ?></div>
				</div>
		</div>	
	</div>
	<?php endforeach;?>
</div><br>

<!--=== Pagination ===-->
<?php if(!isset($_GET['ctg'])):?>
<div class="paginataion section-padding">
<?= $this->pagination->create_links() ?>
</div>
<?php endif; ?>

 