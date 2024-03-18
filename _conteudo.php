<div class="container">
    
<!-- Loop dos registros -->    
<?php do{ ?>

<section>    
<div class="row">
    
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
<h2><?php echo($row_rs_curso["idCurso"]) ?> - <?php echo($row_rs_curso["titulo"]) ?></h2> 
<p><?php echo($row_rs_curso["descricao"]) ?></p>
	
	<a href="detalhes.php?idCurso=<?php echo($row_rs_curso["idCurso"]) ?>" title="Detalhes">
<button type="button" class="btn btn-outline-secondary">+ Detalhes</button> </a> 
  
</div> 

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
<br>
<a href="imagens/upload/<?php echo($row_rs_curso["img1"]) ?>" title="<?php echo($row_rs_curso["titulo"]) ?>" data-lightbox="example-1">    
<img src="imagens/upload/<?php echo($row_rs_curso["img1Thumb"]) ?>" alt="<?php echo($row_rs_curso["titulo"]) ?>" title="<?php echo($row_rs_curso["titulo"]) ?>" class="img-fluid">    
</a>
</div>    
    
</div> 
</section>
<hr>
<!-- FIM Loop dos registros -->    
<?php } while($row_rs_curso = mysqli_fetch_assoc($rs_curso)); ?>
    
    
    
</div>